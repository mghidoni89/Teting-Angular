<?php
$pageTitle = 'Cookie policy';
$pageDescription = 'Cookie policy del sito della Scuola dell\'Infanzia Carlo Montanari: quali cookie usa il sito, Google Maps e come gestire il consenso.';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / Cookie policy</nav>
    <h1>Cookie policy</h1>
    <p class="legal-updated">Ultimo aggiornamento: 24 novembre 2026</p>
    <div class="btn-row" style="margin-top:24px">
      <button type="button" class="btn btn--outline btn--small" data-cookie-settings>Modifica le preferenze cookie</button>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <article class="card prose">
      <?php readfile(__DIR__ . '/includes/testi/cookie-policy.html'); ?>
    </article>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
