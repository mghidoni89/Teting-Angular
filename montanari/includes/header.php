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
$menu = [
    'scuola'     => ['La scuola', 'la-scuola.html'],
    'giornata'   => ['La giornata', 'la-giornata.html'],
    'iscrizioni' => ['Iscrizioni', 'iscrizioni.html'],
    'contatti'   => ['Contatti', 'contatti.html'],
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
  <link rel="preload" href="assets/fonts/fraunces.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="assets/fonts/nunito.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <script src="assets/js/main.js" defer></script>
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
    <a class="brand" href="index.html" aria-label="Scuola dell'Infanzia Carlo Montanari, vai alla home">
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
      <a class="btn btn--primary btn--small main-nav__cta" href="iscrizioni.html">Iscrizioni 2027-28</a>
    </nav>
  </div>
</header>

<main id="contenuto">
