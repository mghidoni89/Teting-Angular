<?php
/**
 * Inoltro dei vecchi indirizzi del sito WordPress (es. /?page_id=106, /?p=65)
 * alle nuove pagine, con redirect permanente (301).
 * Incluso all'inizio di index.php: i vecchi indirizzi passavano tutti dalla home.
 *
 * Quando nasceranno nuove pagine (Servizi, Notizie, Privacy, Amministrazione
 * trasparente...) basta cambiare qui la destinazione delle voci corrispondenti.
 */

$vecchiePagine = [
    // ?page_id=
    'page_id' => [
        106  => 'la-scuola.html',            // La scuola (PTOF)
        85   => 'la-scuola.html#documenti',  // Documenti
        83   => 'contatti.html',             // URP
        1514 => 'iscrizioni.html',           // Porte aperte
        87   => 'index.html',                // Privacy policy (pagina da creare)
        1437 => 'index.html',                // Amministrazione trasparente (pagina da creare)
    ],
    // ?p= (articoli)
    'p' => [
        1654 => 'iscrizioni.html', 1637 => 'iscrizioni.html', 1588 => 'iscrizioni.html',
        1509 => 'iscrizioni.html', 1364 => 'iscrizioni.html', 356  => 'iscrizioni.html', // Porte aperte
        54   => 'la-giornata.html',          // I nostri orari
        56   => 'contatti.html',             // Segreteria
        258  => 'la-scuola.html#metodo',     // Progettazione
        273  => 'la-scuola.html', 271 => 'la-scuola.html', 268 => 'la-scuola.html',
        263  => 'la-scuola.html', 51  => 'la-scuola.html',                               // Collaboratori dei laboratori
        // Servizi (cucina, giardino, nanne, grest, psicomotricità, inglese): per ora in home
        65 => 'index.html', 243 => 'index.html', 58 => 'index.html',
        62 => 'index.html', 255 => 'index.html', 310 => 'index.html',
        // Trasparenza (bilancio, sovvenzioni, DL sostegni bis): pagine da creare
        1481 => 'index.html', 361 => 'index.html', 1473 => 'index.html',
    ],
];

// Altri parametri tipici di WordPress senza una pagina corrispondente: vanno alla home.
$parametriWordPress = ['page_id', 'p', 'cat', 'tag', 'feed', 'm', 's', 'author', 'attachment_id'];

$destinazione = null;
foreach ($parametriWordPress as $param) {
    if (!isset($_GET[$param])) {
        continue;
    }
    $id = (int)$_GET[$param];
    $destinazione = $vecchiePagine[$param][$id] ?? 'index.html';
    break;
}

if ($destinazione !== null) {
    $baseVecchio = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/') . '/';
    header('Location: ' . $baseVecchio . ($destinazione === 'index.html' ? '' : $destinazione), true, 301);
    exit;
}
