<?php
http_response_code(404);

$pageTitle = 'Pagina non trovata';
$pageDescription = 'La pagina che cerchi non esiste o è stata spostata.';
$activePage = '';
$noIndex = true;
require __DIR__ . '/includes/header.php';
?>

<section class="page-head error-page">
  <div class="container">
    <span class="eyebrow">Errore 404</span>
    <h1>Questa pagina non c'è</h1>
    <p class="lead">Forse l'indirizzo è sbagliato, oppure la pagina è stata spostata con il nuovo sito. Puoi ripartire da qui:</p>
    <div class="grid grid--4 error-page__links">
      <a class="quick bg-yellow" href="<?= $base ?>index.html"><?= icon('home') ?><h2>Home</h2><p>Torna alla pagina iniziale</p></a>
      <a class="quick bg-pink" href="<?= $base ?>iscrizioni.html"><?= icon('calendar') ?><h2>Iscrizioni</h2><p>Porte aperte, moduli e rette</p></a>
      <a class="quick bg-green" href="<?= $base ?>la-giornata.html"><?= icon('clock') ?><h2>La giornata</h2><p>Orari e routine</p></a>
      <a class="quick bg-blue" href="<?= $base ?>contatti.html"><?= icon('phone') ?><h2>Contatti</h2><p>Telefono, email e segreteria</p></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
