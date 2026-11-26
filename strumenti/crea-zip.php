<?php
/**
 * Crea gli zip da caricare sul server.
 *
 * Uso, dalla cartella principale del progetto:
 *   php strumenti/crea-zip.php             -> crea entrambi
 *   php strumenti/crea-zip.php produzione  -> solo produzione
 *   php strumenti/crea-zip.php staging     -> solo staging
 *
 * Risultato in dist/:
 *   sito-montanari-produzione.zip  per www.infanziamontanari.it (cartella principale)
 *   sito-montanari-staging.zip     per il server di prova: noindex su tutto,
 *                                  senza regole HTTPS/www, senza robots.txt e sitemap.xml
 *
 * Entrambi contengono la cartella "montanari/": va caricato il suo CONTENUTO.
 * Richiede l'estensione PHP "zip" (ZipArchive).
 */

if (!class_exists('ZipArchive')) {
    fwrite(STDERR, "Errore: manca l'estensione PHP zip (ZipArchive).\n"
        . "Su Windows: abilitare extension=zip nel php.ini. Su Mac (Homebrew) è già inclusa.\n");
    exit(1);
}

$progetto = dirname(__DIR__);
$sito = $progetto . '/montanari';
$dist = $progetto . '/dist';
$scelta = $argv[1] ?? 'tutti';

if (!is_dir($sito)) {
    fwrite(STDERR, "Errore: cartella montanari/ non trovata in $progetto\n");
    exit(1);
}
if (!is_dir($dist)) {
    mkdir($dist, 0755, true);
}

// Elenco dei file del sito (esclusi file di sistema)
function fileDelSito(string $sito): array
{
    $out = [];
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sito, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $f) {
        $rel = str_replace('\\', '/', substr($f->getPathname(), strlen($sito) + 1));
        if (preg_match('#(^|/)(\.DS_Store|Thumbs\.db|desktop\.ini)$#i', $rel)) {
            continue;
        }
        $out[$rel] = $f->getPathname();
    }
    ksort($out);
    return $out;
}

function htaccessStaging(string $htaccess): string
{
    $noindex = "# Server di prova: nessuna indicizzazione su Google, per ogni file.\n"
        . "# (In più ogni pagina ha <meta name=\"robots\" content=\"noindex\">.)\n"
        . "<IfModule mod_headers.c>\n"
        . "  Header always set X-Robots-Tag \"noindex, nofollow, noarchive\"\n"
        . "</IfModule>";
    $out = preg_replace('/# >>> NOINDEX.*?# <<< NOINDEX/s', $noindex, $htaccess, 1, $n1);
    $out = preg_replace('/[ \t]*# >>> SOLO-PRODUZIONE.*?# <<< SOLO-PRODUZIONE\n?/s', '', $out, 1, $n2);
    if ($n1 !== 1 || $n2 !== 1) {
        fwrite(STDERR, "Errore: in montanari/.htaccess mancano i marcatori NOINDEX o SOLO-PRODUZIONE.\n");
        exit(1);
    }
    return "# ===== VERSIONE STAGING: non usare in produzione =====\n" . $out;
}

function creaZip(string $dest, array $files, bool $staging): void
{
    @unlink($dest);
    $zip = new ZipArchive();
    if ($zip->open($dest, ZipArchive::CREATE) !== true) {
        fwrite(STDERR, "Errore: impossibile creare $dest\n");
        exit(1);
    }
    foreach ($files as $rel => $path) {
        if ($staging && in_array($rel, ['robots.txt', 'sitemap.xml'], true)) {
            continue;
        }
        if ($staging && $rel === '.htaccess') {
            $zip->addFromString('montanari/.htaccess', htaccessStaging(file_get_contents($path)));
            continue;
        }
        $zip->addFile($path, 'montanari/' . $rel);
    }
    $n = $zip->numFiles;
    $zip->close();
    printf("Creato %s (%d file, %s KB)\n", $dest, $n, number_format(filesize($dest) / 1024, 0, ',', '.'));
}

$files = fileDelSito($sito);
if (!isset($files['.htaccess'])) {
    fwrite(STDERR, "Errore: manca montanari/.htaccess\n");
    exit(1);
}

if ($scelta === 'tutti' || $scelta === 'produzione') {
    creaZip($dist . '/sito-montanari-produzione.zip', $files, false);
}
if ($scelta === 'tutti' || $scelta === 'staging') {
    creaZip($dist . '/sito-montanari-staging.zip', $files, true);
}
