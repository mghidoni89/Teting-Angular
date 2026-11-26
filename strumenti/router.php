<?php
/**
 * Router per l'anteprima locale con il server integrato di PHP.
 * Il server integrato ignora .htaccess: questo file riproduce le stesse regole
 * (indirizzi .html, redirect dai .php, pagina 404, file protetti).
 *
 * Uso, dalla cartella principale del progetto:
 *   php -S localhost:8080 -t montanari strumenti/router.php
 * poi aprire http://localhost:8080
 */

$root = realpath($_SERVER['DOCUMENT_ROOT']);
$uri  = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');

// Esegue una pagina PHP come farebbe Apache dopo la riscrittura.
$esegui = static function (string $script) use ($root): bool {
    $_SERVER['SCRIPT_NAME'] = $script;
    $_SERVER['PHP_SELF'] = $script;
    $_SERVER['SCRIPT_FILENAME'] = $root . $script;
    chdir(dirname($root . $script));
    require $root . $script;
    return true;
};

// File protetti (come in .htaccess)
if ($uri === '/config.php' || $uri === '/config.html' || str_starts_with($uri, '/includes/') || str_ends_with($uri, '.md')) {
    http_response_code(403);
    echo '403 Forbidden';
    return true;
}

// Redirect dal vecchio sito: legge il blocco VECCHIO-SITO di .htaccess (unica fonte)
$htaccess = @file_get_contents($root . '/.htaccess') ?: '';
if (preg_match('/# >>> VECCHIO-SITO(.*?)# <<< VECCHIO-SITO/s', $htaccess, $blocco)) {
    $path = ltrim($uri, '/');
    $query = $_SERVER['QUERY_STRING'] ?? '';
    $condizioni = [];
    foreach (preg_split('/\R/', $blocco[1]) as $riga) {
        $riga = trim($riga);
        if (preg_match('/^RewriteCond %\{QUERY_STRING\} (\S+)/', $riga, $m)) {
            $condizioni[] = $m[1];
            continue;
        }
        if (!preg_match('/^RewriteRule (\S+) (\S+)(?: \[([^\]]*)\])?/', $riga, $m)) {
            continue;
        }
        [, $pattern, $destinazione, $flag] = $m + [3 => ''];
        $nc = stripos($flag, 'NC') !== false ? 'i' : '';
        $ok = $destinazione !== '-' && preg_match('#' . str_replace('#', '\#', $pattern) . '#' . $nc, $path);
        foreach ($condizioni as $c) {
            $ok = $ok && preg_match('#' . str_replace('#', '\#', $c) . '#', $query);
        }
        $condizioni = [];
        if ($ok) {
            header('Location: ' . str_replace('%{ENV:CM_BASE}', '/', $destinazione), true, 301);
            return true;
        }
    }
}

// Cartella principale -> index.php
if ($uri === '/') {
    return $esegui('/index.php');
}

$file = $root . $uri;

// Vecchio indirizzo .php -> redirect 301 alla versione .html (tranne invia.php)
if (str_ends_with($uri, '.php') && is_file($file)) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $uri !== '/invia.php') {
        $qs = $_SERVER['QUERY_STRING'] ?? '';
        header('Location: ' . substr($uri, 0, -4) . '.html' . ($qs !== '' ? '?' . $qs : ''), true, 301);
        return true;
    }
    return false; // esegue il .php normalmente (es. invia.php in POST)
}

// File statici esistenti (CSS, JS, immagini, PDF...)
if (is_file($file)) {
    return false;
}

// Indirizzo .html -> pagina .php con lo stesso nome
if (str_ends_with($uri, '.html')) {
    $php = substr($uri, 0, -5) . '.php';
    if (is_file($root . $php)) {
        return $esegui($php);
    }
}

// Tutto il resto -> pagina 404 del sito
return $esegui('/404.php');
