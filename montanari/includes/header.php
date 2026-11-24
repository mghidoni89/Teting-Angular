<?php
/**
 * Header comune. Prima di includerlo, ogni pagina imposta:
 *   $pageTitle        titolo della pagina (stringa)
 *   $pageDescription  descrizione per i motori di ricerca
 *   $activePage       chiave della voce di menu attiva (home, scuola, giornata, iscrizioni, contatti)
 */
require_once __DIR__ . '/icons.php';

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$activePage = $activePage ?? '';

// Percorso della cartella del sito (es. "/" in produzione, "/staging/montanari/" sul server di prova).
// Serve per link e risorse che devono funzionare anche dalla pagina 404 a qualsiasi profondità.
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/') . '/';

// Indirizzo assoluto della pagina e del sito, per l'anteprima sui social.
$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
$siteUrl = ($https ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'www.infanziamontanari.it') . $base;
$pageFile = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php', '.php');
$pageUrl = $siteUrl . ($pageFile === 'index' ? '' : $pageFile . '.html');
// Fuori dal dominio della scuola (es. server di prova) le pagine non vanno indicizzate.
$isProduction = (bool)preg_match('/(^|\.)infanziamontanari\.it$/i', $_SERVER['HTTP_HOST'] ?? '');
$ogImage = $siteUrl . 'assets/img/' . ($ogImageFile ?? 'hero-bimbi.jpg');
$menu = [
    'scuola'     => ['La scuola', $base . 'la-scuola.html'],
    'giornata'   => ['La giornata', $base . 'la-giornata.html'],
    'iscrizioni' => ['Iscrizioni', $base . 'iscrizioni.html'],
    'contatti'   => ['Contatti', $base . 'contatti.html'],
];
$fullTitle = ($activePage === 'home' ? '' : $pageTitle . ' · ') . 'Scuola dell\'Infanzia Carlo Montanari · Lavagno (VR)';
?>
<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($fullTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription ?? '') ?>">
  <meta name="theme-color" content="#fef7ed">
  <?php if (!empty($noIndex) || !$isProduction): ?><meta name="robots" content="noindex, nofollow"><?php endif; ?>
  <meta property="og:type" content="website">
  <meta property="og:locale" content="it_IT">
  <meta property="og:site_name" content="Scuola dell'Infanzia Carlo Montanari">
  <meta property="og:title" content="<?= e($fullTitle) ?>">
  <meta property="og:description" content="<?= e($pageDescription ?? '') ?>">
  <meta property="og:url" content="<?= e($pageUrl) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="preload" href="<?= $base ?>assets/fonts/fraunces.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $base ?>assets/fonts/nunito.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= $base ?>assets/css/style.css">
  <link rel="icon" href="<?= $base ?>assets/img/favicon.svg" type="image/svg+xml">
  <script src="<?= $base ?>assets/js/main.js" defer></script>
</head>
<body>
<a class="skip-link" href="#contenuto">Vai al contenuto</a>

<div class="topbar">
  <div class="container topbar__inner">
    <span>Via Roma 9 · San Pietro di Lavagno (VR)</span>
    <span class="topbar__right">
      <span class="topbar__hours">Segreteria lun–ven 9:00–12:00</span>
      <a href="tel:+39045982353" class="topbar__phone">045 982353</a>
    </span>
  </div>
</div>

<header class="site-header">
  <div class="container site-header__inner">
    <a class="brand" href="<?= $base ?>index.html" aria-label="Scuola dell'Infanzia Carlo Montanari, vai alla home">
      <span class="brand__mark"><?= icon('home') ?></span>
      <span class="brand__text">
        <span class="brand__kicker">Scuola dell'infanzia</span>
        <span class="brand__name">Carlo Montanari</span>
      </span>
    </a>

    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-principale">
      <?= icon('menu', 'icon icon--open') ?><?= icon('close', 'icon icon--close') ?>
      <span class="visually-hidden">Menu</span>
    </button>

    <nav class="main-nav" id="menu-principale" aria-label="Menu principale">
      <ul>
        <?php foreach ($menu as $key => [$label, $href]): ?>
          <li><a href="<?= $href ?>"<?= $activePage === $key ? ' aria-current="page"' : '' ?>><?= e($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
      <a class="btn btn--primary btn--small main-nav__cta" href="<?= $base ?>iscrizioni.html">Iscrizioni 2027-28</a>
    </nav>
  </div>
</header>

<main id="contenuto">
