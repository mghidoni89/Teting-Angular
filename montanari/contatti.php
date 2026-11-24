<?php
session_start();

$pageTitle = 'Contatti';
$pageDescription = 'Contatti della Scuola dell\'Infanzia Carlo Montanari: telefono 045 982353, email scmontanari@tiscali.it, segreteria lun–ven 9–12, Via Roma 9, Lavagno (VR).';
$activePage = 'contatti';

// Token anti-CSRF per il modulo
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
// Esito dell'ultimo invio (impostato da invia.php)
$flash = $_SESSION['form_flash'] ?? null;
unset($_SESSION['form_flash']);
$old = $flash['old'] ?? [];

require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.php">Home</a> / Contatti</nav>
    <h1>Contatti</h1>
    <p class="lead">Chiamaci, scrivici o passa in segreteria: siamo felici di rispondere a ogni tua domanda.</p>

    <div class="grid grid--4 contact-cards" style="margin-top:36px">
      <a class="contact-card bg-pink" href="tel:+39045982353">
        <?= icon('phone') ?><span>Telefono</span><strong>045 982353</strong>
      </a>
      <a class="contact-card bg-yellow" href="mailto:scmontanari@tiscali.it">
        <?= icon('mail') ?><span>Email</span><strong>scmontanari@tiscali.it</strong>
      </a>
      <div class="contact-card bg-green">
        <?= icon('clock') ?><span>Segreteria</span><strong>Lun–ven 9–12</strong>
      </div>
      <div class="contact-card bg-blue">
        <?= icon('pin') ?><span>Indirizzo</span><strong>Via Roma 9, Lavagno (VR)</strong>
      </div>
    </div>
  </div>
</section>

<section class="section" id="modulo">
  <div class="container form-layout">
    <div class="card">
      <h2>Scrivi alla segreteria</h2>

      <?php if ($flash && $flash['ok']): ?>
        <p class="alert alert--ok" role="status" style="margin-bottom:20px">Grazie! Il tuo messaggio è stato inviato: ti risponderemo il prima possibile.</p>
      <?php elseif ($flash && !$flash['ok']): ?>
        <div class="alert alert--error" role="alert" style="margin-bottom:20px">
          Non è stato possibile inviare il messaggio.
          <?php if (!empty($flash['errors'])): ?>
            <ul><?php foreach ($flash['errors'] as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <form class="form" action="invia.php" method="post" novalidate>
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
        <input type="hidden" name="ts" value="<?= time() ?>">
        <div class="hp" aria-hidden="true">
          <label for="sito_web">Lascia vuoto questo campo</label>
          <input type="text" id="sito_web" name="sito_web" tabindex="-1" autocomplete="off">
        </div>

        <div class="form__row">
          <div class="field">
            <label for="nome">Nome e cognome</label>
            <input type="text" id="nome" name="nome" required maxlength="120" autocomplete="name" value="<?= e($old['nome'] ?? '') ?>">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required maxlength="254" autocomplete="email" value="<?= e($old['email'] ?? '') ?>">
          </div>
        </div>
        <div class="field">
          <label for="motivo">Motivo</label>
          <input type="text" id="motivo" name="motivo" required maxlength="200" value="<?= e($old['motivo'] ?? '') ?>">
        </div>
        <div class="field">
          <label for="messaggio">Messaggio</label>
          <textarea id="messaggio" name="messaggio" required maxlength="5000"><?= e($old['messaggio'] ?? '') ?></textarea>
        </div>
        <label class="check">
          <input type="checkbox" name="privacy" value="1" required>
          <span>Ho letto l'<a href="#">informativa privacy</a> e acconsento al trattamento dei dati per ricevere una risposta.</span>
        </label>
        <div>
          <button type="submit" class="btn btn--primary">Invia messaggio</button>
        </div>
      </form>
    </div>
    <?php require __DIR__ . '/includes/map.php'; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
