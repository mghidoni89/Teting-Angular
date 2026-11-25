<?php
$pageTitle = 'Privacy policy';
$pageDescription = 'Informativa sul trattamento dei dati personali del sito della Scuola dell\'Infanzia Carlo Montanari, ai sensi degli articoli 13 e 14 del GDPR.';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / Privacy policy</nav>
    <h1>Privacy policy</h1>
    <p class="lead">Informativa sul trattamento dei dati personali ai sensi degli articoli 13 e 14 del Regolamento UE 2016/679 (GDPR)</p>
    <p class="legal-updated">Ultimo aggiornamento: 24 novembre 2026</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <article class="card prose">
      <?php readfile(__DIR__ . '/includes/testi/privacy-policy.html'); ?>
    </article>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
