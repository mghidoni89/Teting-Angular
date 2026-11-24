<?php
$pageTitle = 'Iscrizioni';
$pageDescription = 'Iscrizioni all\'anno scolastico 2027-28: porte aperte, come iscriversi in quattro passaggi, rette, moduli e domande frequenti.';
$activePage = 'iscrizioni';
require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="container">
    <div class="hero-yellow">
      <div>
        <nav class="breadcrumb" aria-label="Percorso"><a href="index.php">Home</a> / Iscrizioni</nav>
        <h1>Iscrizioni anno scolastico 2027-28</h1>
        <p class="lead">Tutto quello che serve per iscrivere il tuo bambino, in quattro passaggi</p>
      </div>
      <div class="openday">
        <span class="eyebrow">Prossime porte aperte</span>
        <h2>28 novembre 2026 e 16 gennaio 2027</h2>
        <p>ore 10:00 · Via Roma 9</p>
        <a class="btn btn--dark btn--small" href="contatti.php">Contatta la segreteria</a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="h-section" style="margin-bottom:32px">Come iscriversi</h2>
    <ol class="grid grid--4">
      <li class="step">
        <span class="step__num">1</span>
        <h3>Vieni alle porte aperte</h3>
        <p>Visita gli spazi, conosci l'offerta formativa e le insegnanti</p>
      </li>
      <li class="step">
        <span class="step__num">2</span>
        <h3>Scarica i moduli</h3>
        <p>Compilali con i dati del bambino e dei genitori</p>
      </li>
      <li class="step">
        <span class="step__num">3</span>
        <h3>Consegnali</h3>
        <p>In segreteria, lun–ven 9:00–12:00, entro il 21 gennaio</p>
      </li>
      <li class="step">
        <span class="step__num">4</span>
        <h3>Attendi la conferma</h3>
        <p>A email ricevuta, procedi col pagamento della quota di iscrizione</p>
      </li>
    </ol>
  </div>
</section>

<section class="section">
  <div class="container grid grid--2">
    <div class="card">
      <h2>Rette attuali</h2>
      <ul class="fees">
        <li><span>Quota di iscrizione</span><strong>€ 100</strong></li>
        <li><span>Retta mensile (pasti inclusi)</span><strong>€ 190</strong></li>
        <li><span>Tempo prolungato</span><strong>€ 60</strong></li>
      </ul>
    </div>
    <div class="card">
      <h2>Moduli da scaricare</h2>
      <ul class="doc-list">
        <li><a href="#"><span>Domanda di iscrizione 2027-28</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
        <li><a href="#"><span>Regolamento interno</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
        <li><a href="#"><span>Informativa privacy</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
      </ul>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="h-section" style="margin-bottom:32px">Domande frequenti</h2>
    <div class="faq">
      <details open>
        <summary>Da che età si può iscrivere il bambino?</summary>
        <div class="faq__answer">
          <p>Accogliamo i bambini che compiono tre anni entro il 31 dicembre dell'anno scolastico; eventuali anticipi entro il 30 aprile seguono la normativa e la disponibilità annuale</p>
        </div>
      </details>
      <details>
        <summary>Ci sono criteri di precedenza?</summary>
        <div class="faq__answer">
          <p>L'ammissione alla Scuola dell'Infanzia "Carlo Montanari" segue un ordine di priorità fino al raggiungimento del numero dei posti previsto:</p>
          <ol>
            <li>Bambini residenti a Lavagno che compiono 3 anni entro il 31 dicembre dell'anno scolastico di riferimento</li>
            <li>Bambini anticipatari residenti a Lavagno che compiono 3 anni tra gennaio e aprile dell'anno scolastico di riferimento (qualora restino posti disponibili; la conferma è subordinata al parere vincolante del Collegio Docenti)</li>
            <li>Bambini non residenti a Lavagno che compiono 3 anni entro il 31 dicembre dell'anno scolastico di riferimento (in caso di disponibilità residua)</li>
            <li>Bambini anticipatari non residenti che compiono 3 anni tra gennaio e aprile dell'anno scolastico di riferimento (in caso di ulteriore disponibilità; la conferma è subordinata al parere vincolante del Comitato di gestione e del Collegio Docenti)</li>
          </ol>
          <p>Precedenza interna (punti 1 e 2): all'interno di ciascuna di queste fasce ha priorità chi ha fratelli o sorelle iscritti e frequentanti la scuola.</p>
        </div>
      </details>
      <details>
        <summary>La scuola accoglie bambini con disabilità o bisogni educativi?</summary>
        <div class="faq__answer">
          <p>Sì, la scuola promuove l'inclusione e collabora con famiglia, servizi e specialisti per favorire la partecipazione di ogni bambino</p>
        </div>
      </details>
      <details>
        <summary>Posso iscrivermi anche durante l'anno?</summary>
        <div class="faq__answer">
          <p>È possibile verificare in segreteria l'eventuale disponibilità di posti in corso d'anno: l'ingresso viene concordato valutando la capienza delle sezioni e organizzando un ambientamento graduale e rispettoso dei tempi del bambino e della famiglia</p>
        </div>
      </details>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
