<?php
// Vecchi indirizzi del sito WordPress (/?page_id=..., /?p=...): inoltro alle nuove pagine
require __DIR__ . '/includes/vecchio-sito.php';

$pageTitle = 'Home';
$pageDescription = 'Scuola dell\'infanzia paritaria FISM a San Pietro di Lavagno (VR): dal 1900 un ambiente familiare con cucina interna, un grande giardino e progetti per ogni bambino.';
$activePage = 'home';
$footerFull = true;
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container">
    <div class="hero__grid">
      <div>
        <span class="badge">Scuola paritaria FISM · Lavagno (VR)</span>
        <h1>Crescere insieme, esplorando il mondo ogni giorno</h1>
        <p class="lead">Dal 1900 siamo il punto di riferimento per le famiglie di San Pietro di Lavagno: un ambiente familiare con cucina interna, un grande giardino e progetti pensati per valorizzare l'unicità di ogni bambino.</p>
        <div class="btn-row">
          <a class="btn btn--primary" href="contatti.html">Contatta la segreteria</a>
          <a class="btn btn--outline" href="la-scuola.html">Scopri la scuola</a>
        </div>
      </div>
      <div class="hero__media">
        <div class="hero__blob">
          <img src="assets/img/hero-bimbi.jpg" alt="Due bambini camminano mano nella mano su un ponticello di legno" width="1100" height="733" fetchpriority="high">
        </div>
        <span class="hero__sun" aria-hidden="true"></span>
        <span class="hero__leaf" aria-hidden="true"></span>
      </div>
    </div>

    <ul class="stats">
      <li><p class="stat__num">86</p><p class="stat__label">bambini accolti</p></li>
      <li><p class="stat__num">4</p><p class="stat__label">sezioni eterogenee</p></li>
      <li><p class="stat__num">7:30</p><p class="stat__label">apertura anticipata</p></li>
      <li><p class="stat__num">100%</p><p class="stat__label">cucina interna</p></li>
    </ul>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Per le famiglie</span>
        <h2 class="h-section">Trova subito quello che cerchi</h2>
      </div>
    </div>
    <div class="grid grid--4">
      <a class="quick bg-yellow" href="la-giornata.html">
        <?= icon('clock') ?>
        <h3>Orari e routine</h3>
        <p>Entrata, uscite, pranzo, nanna e prolungato</p>
      </a>
      <a class="quick bg-pink" href="iscrizioni.html">
        <?= icon('calendar') ?>
        <h3>Iscrizioni e rette</h3>
        <p>Porte aperte, moduli, costi e info utili</p>
      </a>
      <a class="quick bg-green" href="la-giornata.html#menu">
        <?= icon('pot') ?>
        <h3>Menu e cucina</h3>
        <p>Pasti cucinati a scuola, menu stagionale</p>
      </a>
      <a class="quick bg-blue" href="la-scuola.html#documenti">
        <?= icon('file') ?>
        <h3>Documenti</h3>
        <p>PTOF, regolamento, calendario scolastico</p>
      </a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Cosa offriamo</span>
        <h2 class="h-section">Servizi e laboratori</h2>
      </div>
    </div>
    <div class="grid grid--3">
      <article class="card service">
        <span class="service__icon bg-pink"><?= icon('bowl') ?></span>
        <h3>Cucina interna</h3>
        <p>La nostra cuoca prepara i pasti secondo le tabelle ULSS, con menù personalizzati per allergie e intolleranze</p>
      </article>
      <article class="card service">
        <span class="service__icon bg-green"><?= icon('tree') ?></span>
        <h3>Il giardino</h3>
        <p>Un'ampia area esterna dove muoversi in libertà, condividere giochi e fare esperienze all'aria aperta tutto l'anno</p>
      </article>
      <article class="card service">
        <span class="service__icon bg-blue"><?= icon('moon') ?></span>
        <h3>Lo spazio delle nanne</h3>
        <p>Dopo pranzo i più piccoli riposano in una stanza tranquilla e accogliente, pensata su misura per il loro relax</p>
      </article>
      <article class="card service">
        <span class="service__icon bg-yellow"><?= icon('chat') ?></span>
        <h3>Laboratori con esperti</h3>
        <p>Percorsi con specialisti, come inglese e musicoterapia, per stimolare la curiosità e l'espressività dei bambini</p>
      </article>
      <article class="card service">
        <span class="service__icon bg-pink"><?= icon('person') ?></span>
        <h3>Psicomotricità</h3>
        <p>Attività motorie guidate in cui il corpo diventa il primo strumento per conoscere se stessi, gli altri e lo spazio</p>
      </article>
      <article class="card service">
        <span class="service__icon bg-green"><?= icon('sun') ?></span>
        <h3>Grest estivo</h3>
        <p>Nel mese di luglio la scuola resta aperta con giochi, laboratori creativi e tante attività all'aperto</p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="panel-dark">
      <div>
        <span class="eyebrow">Il nostro metodo</span>
        <h2>La regia educativa: il bambino al centro, l'insegnante accanto</h2>
        <p>Ambienti stimolanti e materiali accessibili, dove i bambini scelgono attività ed esperienze in autonomia, mentre le insegnanti osservano, accompagnano e progettano partendo dagli interessi di ciascuno.</p>
        <a class="btn btn--yellow btn--small" href="la-giornata.html">Scopri la giornata tipo</a>
      </div>
      <ol class="steps-dark">
        <li><span>01</span> Spazi ed esperienze: arte, lettura e gioco</li>
        <li><span>02</span> Osservazione e documentazione</li>
        <li><span>03</span> Natura e apprendimento all'aperto</li>
      </ol>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-yellow">
      <div>
        <span class="eyebrow">Anno scolastico 2027-28</span>
        <h2>Iscrizioni aperte a gennaio</h2>
        <p>Vieni a conoscerci alle porte aperte: 28 novembre 2026 e 16 gennaio 2027 dalle ore 10:00 alle ore 12:30</p>
      </div>
      <div class="btn-row">
        <a class="btn btn--dark btn--small" href="iscrizioni.html">Come iscriversi</a>
        <a class="btn btn--light btn--small" href="contatti.html">Contatta la segreteria</a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Dalla scuola</span>
        <h2 class="h-section">Ultime notizie</h2>
      </div>
    </div>
    <a class="news" href="iscrizioni.html">
      <div class="news__img">
        <img src="assets/img/porte-aperte.jpg" alt="" width="800" height="533" loading="lazy">
      </div>
      <div class="news__body">
        <p class="news__meta">Eventi · 28 novembre 2026 e 16 gennaio 2027</p>
        <h3>Porte aperte: vieni a conoscere la scuola</h3>
        <p>Sabato 28 novembre 2026 e sabato 16 gennaio 2027, dalle 10:00 alle 12:30: una mattina per visitare gli spazi, conoscere l'offerta formativa e incontrare le insegnanti.</p>
        <span class="link-arrow">Come iscriversi <?= icon('arrow') ?></span>
      </div>
    </a>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="visit">
      <div class="card">
        <h2>Dove siamo</h2>
        <ul class="contact-list">
          <li><?= icon('pin') ?> Via Roma 9, 37030 Lavagno (VR)</li>
          <li><?= icon('phone') ?> <a href="tel:+39045982353">045 982353</a></li>
          <li><?= icon('mail') ?> <a href="mailto:scmontanari@tiscali.it">scmontanari@tiscali.it</a></li>
          <li><?= icon('clock') ?> Segreteria: lunedì–venerdì, 9:00–12:00</li>
        </ul>
        <a class="btn btn--primary btn--small" href="contatti.html#modulo">Scrivici</a>
      </div>
      <?php require __DIR__ . '/includes/map.php'; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
