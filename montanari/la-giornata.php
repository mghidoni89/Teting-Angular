<?php
$pageTitle = 'La giornata';
$pageDescription = 'Una giornata alla scuola dell\'infanzia Carlo Montanari: dal lunedì al venerdì dalle 7:30 alle 16:00, con tempo prolungato fino alle 17:30.';
$activePage = 'giornata';
require __DIR__ . '/includes/header.php';

$giornata = [
    ['7:30 – 9:00',   'Accoglienza', 'Arrivo, saluto e gioco libero per iniziare la giornata con calma'],
    ['9:00 – 10:00',  'Cerchio, cura e merenda', 'Momento di condivisione, routine di cura personale e merenda insieme'],
    ['10:00 – 11:15', 'Attività educative', 'Progetti, laboratori, spazi educativi, giardino e orto'],
    ['11:45 – 12:30', 'Pranzo', 'Preparato nella nostra cucina interna, vissuto come momento di convivialità'],
    ['12:45 – 13:00', 'Uscita intermedia', 'Per chi frequenta solo la mattina'],
    ['13:00 – 14:30', 'Riposo e attività pomeridiane', 'Riposo per i più piccoli; esperienze e piccoli gruppi per i medi e grandi'],
    ['15:45 – 16:00', 'Uscita', 'Ci si saluta fino a domani'],
];
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / La giornata</nav>
    <h1>Una giornata a scuola</h1>
    <p class="lead">Dal lunedì al venerdì, dalle 7:30 alle 16:00. Per chi ne ha bisogno c'è il tempo prolungato</p>
  </div>
</section>

<section class="section">
  <div class="container day-layout">
    <ol class="card schedule">
      <?php foreach ($giornata as [$orario, $titolo, $testo]): ?>
        <li>
          <span class="time"><?= e($orario) ?></span>
          <div>
            <h3><?= e($titolo) ?></h3>
            <p><?= e($testo) ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>

    <div class="aside-stack">
      <div class="aside-card aside-card--dark">
        <span class="eyebrow">Su richiesta</span>
        <h2>Tempo prolungato</h2>
        <p>Dalle 16:00 fino alle 17:30. Si attiva su richiesta in segreteria</p>
      </div>
      <div class="aside-card bg-yellow">
        <h2>Calendario dell'anno</h2>
        <p>Inizio e fine attività, vacanze e chiusure.</p>
        <a class="link-arrow" href="#">Scarica il calendario 2026-27 <?= icon('arrow') ?></a>
      </div>
      <div class="aside-card bg-green" id="menu">
        <h2>Menu stagionale</h2>
        <p>Tabelle dietetiche approvate ULSS e diete speciali su certificato.</p>
        <a class="link-arrow" href="#">Vedi il menu <?= icon('arrow') ?></a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
