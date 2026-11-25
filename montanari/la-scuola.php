<?php
$pageTitle = 'La scuola';
$pageDescription = 'Scuola dell\'infanzia paritaria di ispirazione cristiana, federata FISM: la storia, il metodo della regia educativa, gli organi della scuola e i documenti.';
$activePage = 'scuola';
require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / La scuola</nav>
    <h1>La nostra scuola</h1>
    <p class="lead">Una scuola dell'infanzia paritaria di ispirazione cristiana, federata FISM, che vuole essere «una comunità attiva e aperta al territorio e alle famiglie».</p>
    <nav class="pills" aria-label="Sezioni della pagina">
      <a href="#chi-siamo">Chi siamo</a>
      <a href="#metodo">Il metodo</a>
      <a href="#organi-documenti">Organi e documenti</a>
    </nav>
  </div>
</section>

<section class="section" id="chi-siamo">
  <div class="container split">
    <div>
      <span class="eyebrow">Chi siamo</span>
      <h2>Oltre cent'anni accanto alle famiglie di San Pietro</h2>
      <p>Una scuola di tutti e per tutti: accogliamo ogni bambino, nel rispetto dei tempi, delle caratteristiche e delle potenzialità di ciascuno.</p>
    </div>
    <ol class="timeline">
      <li>
        <h3>Primi del Novecento</h3>
        <p>Nasce la scuola a San Pietro di Lavagno, affidata alle Suore Orsoline</p>
      </li>
      <li>
        <h3>1988</h3>
        <p>La gestione passa a un Comitato di gestione composto da genitori, insieme alla parrocchia</p>
      </li>
      <li>
        <h3>Oggi</h3>
        <p>88 bambini in 4 sezioni eterogenee, con convenzione comunale e rete territoriale</p>
      </li>
    </ol>
  </div>
</section>

<section class="section" id="metodo">
  <div class="container">
    <span class="eyebrow">Il metodo</span>
    <h2 class="h-section">La regia educativa</h2>
    <p class="lead">L'insegnante non «fa lezione»: progetta il contesto, osserva, accompagna e rilancia, mentre il bambino esplora, sperimenta e costruisce significati.</p>
    <div class="grid grid--4" style="margin-top:36px">
      <div class="pastel-card bg-yellow">
        <h3>Spazi ed esperienze</h3>
        <p>Ambienti stimolanti e materiali accessibili per favorire autonomia, esplorazione, gioco e relazione</p>
      </div>
      <div class="pastel-card bg-pink">
        <h3>Osservazione</h3>
        <p>La progettazione parte dall'osservazione dei bambini e dei contesti, verificata e rilanciata in itinere</p>
      </div>
      <div class="pastel-card bg-green">
        <h3>Natura e gioco all'aperto</h3>
        <p>Giardino, orti e spazi esterni vissuti come ambienti educativi in ogni stagione</p>
      </div>
      <div class="pastel-card bg-blue">
        <h3>Sezioni miste</h3>
        <p>Bambini di età diverse insieme per favorire cooperazione e autonomia, con piccoli gruppi quando serve</p>
      </div>
    </div>
  </div>
</section>

<section class="section" id="organi-documenti">
  <div class="container grid grid--2">
    <div class="card">
      <h2>Organi della scuola</h2>
      <ul class="organs">
        <li><strong>Comitato di gestione</strong> – genitori, coordinatrice e rappresentanze previste</li>
        <li><strong>Collegio docenti</strong> – progettazione educativa e didattica</li>
        <li><strong>Consiglio di scuola</strong> – rappresentanti dei genitori e insegnanti</li>
        <li><strong>Assemblea dei genitori</strong> – momenti di confronto e partecipazione</li>
      </ul>
    </div>
    <div class="card" id="documenti">
      <h2>Documenti</h2>
      <ul class="doc-list">
        <li><a href="#"><span>PTOF 2025-2028</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
        <li><a href="#"><span>Regolamento interno</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
        <li><a href="assets/docs/calendario-attivita-2026-27.pdf" target="_blank" rel="noopener"><span>Calendario scolastico 2026-27</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
