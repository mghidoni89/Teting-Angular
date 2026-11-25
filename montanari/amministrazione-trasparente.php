<?php
$pageTitle = 'Amministrazione trasparente';
$pageDescription = 'Amministrazione trasparente della Scuola dell\'Infanzia Carlo Montanari: sovvenzioni ricevute da pubbliche amministrazioni, adempimenti DL Sostegni bis e bilancio consuntivo.';
$activePage = '';
require __DIR__ . '/includes/header.php';

$sovvenzioni = require __DIR__ . '/includes/sovvenzioni.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / Amministrazione trasparente</nav>
    <h1>Amministrazione trasparente</h1>
    <nav class="pills" aria-label="Sezioni della pagina">
      <a href="#sovvenzioni">Sovvenzioni ricevute</a>
      <a href="#sostegni-bis">DL Sostegni bis</a>
      <a href="#bilancio">Bilancio consuntivo</a>
    </nav>
  </div>
</section>

<section class="section" id="sovvenzioni">
  <div class="container">
    <h2 class="h-section">Sovvenzioni ricevute da pubbliche amministrazioni</h2>
    <p class="lead">Si comunica che, ai sensi della Legge n. 124/2017, comma 125-129 dell’art. 1, cosiddetta Legge annuale per il mercato e la concorrenza, la Associazione denominata <strong>SCUOLA DELL’INFANZIA CARLO MONTANARI</strong> con codice fiscale <strong>80031580238</strong> ha ricevuto le seguenti erogazioni pubbliche:</p>

    <div class="years">
      <?php foreach ($sovvenzioni as $anno => $righe): ?>
        <details class="year card"<?= $anno === array_key_first($sovvenzioni) ? ' open' : '' ?>>
          <summary><h3>Anno <?= e((string)$anno) ?></h3><span class="muted"><?= count($righe) ?> erogazioni</span></summary>
          <div class="table-wrap">
            <table class="data-table">
              <caption class="visually-hidden">Erogazioni pubbliche ricevute nell'anno <?= e((string)$anno) ?></caption>
              <thead>
                <tr><th scope="col">Ente</th><th scope="col" class="num">Importo</th><th scope="col">Data incasso</th><th scope="col">Causale</th></tr>
              </thead>
              <tbody>
                <?php foreach ($righe as [$ente, $importo, $data, $causale]): ?>
                  <tr><td><?= e($ente) ?></td><td class="num"><?= e($importo) ?></td><td><?= e($data) ?></td><td><?= e($causale) ?></td></tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" id="sostegni-bis">
  <div class="container">
    <h2 class="h-section">Adempimenti Decreto Legge Sostegni bis</h2>
    <p class="lead">ADEMPIMENTI DECRETO LEGGE SOSTEGNI BIS: “Misure urgenti connesse alla emergenza da Covid-19 per le imprese, il lavoro, i giovani, la salute e i servizi territoriali”.</p>
    <div class="doc-pages doc-pages--landscape">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <a href="assets/img/trasparenza/dl-sostegni-bis-<?= $i ?>.jpg" target="_blank" rel="noopener">
          <img src="assets/img/trasparenza/dl-sostegni-bis-<?= $i ?>.jpg" alt="DL Sostegni bis, contributi anti Covid: pagina <?= $i ?> di 3" width="1200" height="849" loading="lazy">
        </a>
      <?php endfor; ?>
    </div>
    <ul class="doc-list doc-list--single">
      <li><a href="assets/docs/dl-sostegni-bis-contributi-anti-covid.pdf" target="_blank" rel="noopener"><span>DL Sostegni bis. Contributi Anti Covid</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
    </ul>
  </div>
</section>

<section class="section" id="bilancio">
  <div class="container">
    <h2 class="h-section">Bilancio consuntivo</h2>
    <p class="lead">In questa sezione sono presenti i dati relativi alle entrate e alla spesa del bilancio consuntivo per l’anno 2020.</p>
    <div class="doc-pages doc-pages--portrait">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <a href="assets/img/trasparenza/bilancio-2020-<?= $i ?>.jpg" target="_blank" rel="noopener">
          <img src="assets/img/trasparenza/bilancio-2020-<?= $i ?>.jpg" alt="Bilancio consuntivo 2020: pagina <?= $i ?> di 3" width="1000" height="1414" loading="lazy">
        </a>
      <?php endfor; ?>
    </div>
    <ul class="doc-list doc-list--single">
      <li><a href="assets/docs/bilancio-consuntivo-2020.pdf" target="_blank" rel="noopener"><span>Bilancio consuntivo 2020</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
    </ul>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
