<?php
/**
 * Gestore del modulo "Scrivi alla segreteria".
 * Legge le impostazioni da config.php, valida i dati e invia l'email.
 * Al termine torna sempre alla pagina contatti (pattern Post/Redirect/Get).
 */
session_start();
date_default_timezone_set('Europe/Rome');

$config = require __DIR__ . '/config.php';
$ritorno = $config['pagina_ritorno'] . '#modulo';

function torna(string $url, bool $ok, array $errors = [], array $old = []): void
{
    $_SESSION['form_flash'] = ['ok' => $ok, 'errors' => $errors, 'old' => $ok ? [] : $old];
    header('Location: ' . $url, true, 303);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: ' . $config['pagina_ritorno'], true, 303);
    exit;
}

// Pulizia: niente caratteri di controllo; nei campi a riga singola niente a capo.
$riga = static fn($v): string => trim(preg_replace('/[\x00-\x1F\x7F]+/u', ' ', (string)$v));
$testo = static fn($v): string => trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/u', '', str_replace("\r\n", "\n", (string)$v)));

$nome      = $riga($_POST['nome'] ?? '');
$email     = $riga($_POST['email'] ?? '');
$motivo    = $riga($_POST['motivo'] ?? '');
$messaggio = $testo($_POST['messaggio'] ?? '');
$privacy   = !empty($_POST['privacy']);
$old = compact('nome', 'email', 'motivo', 'messaggio');

// --- Controlli antispam: in caso di bot rispondiamo "ok" senza inviare nulla ---
$csrfOk = isset($_POST['csrf'], $_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string)$_POST['csrf']);
$honeypotPieno = trim((string)($_POST['sito_web'] ?? '')) !== '';
$ts = (int)($_POST['ts'] ?? 0);
$troppoVeloce = $ts <= 0 || (time() - $ts) < (int)$config['secondi_minimi'];

if ($honeypotPieno || $troppoVeloce) {
    torna($ritorno, true);
}
if (!$csrfOk) {
    torna($ritorno, false, ['La sessione è scaduta: ricarica la pagina e riprova.'], $old);
}

// --- Validazione ---
$errors = [];
$len = static fn(string $s): int => function_exists('mb_strlen') ? mb_strlen($s, 'UTF-8') : strlen($s);

if ($nome === '' || $len($nome) > $config['max_nome']) {
    $errors[] = 'Inserisci nome e cognome.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Inserisci un indirizzo email valido.';
}
if ($motivo === '' || $len($motivo) > $config['max_motivo']) {
    $errors[] = 'Indica il motivo del messaggio.';
}
if ($messaggio === '' || $len($messaggio) > $config['max_messaggio']) {
    $errors[] = 'Scrivi il messaggio (massimo ' . $config['max_messaggio'] . ' caratteri).';
}
if (!$privacy) {
    $errors[] = 'Per inviare il messaggio è necessario accettare l\'informativa privacy.';
}
if ($errors) {
    torna($ritorno, false, $errors, $old);
}

// --- Composizione e invio ---
$oggetto = $config['oggetto'] . ': ' . $motivo;
$corpo = "Nuovo messaggio dal sito della scuola\n"
       . "-------------------------------------\n\n"
       . "Nome e cognome: {$nome}\n"
       . "Email: {$email}\n"
       . "Motivo: {$motivo}\n\n"
       . "Messaggio:\n{$messaggio}\n\n"
       . "-------------------------------------\n"
       . 'Inviato il ' . date('d/m/Y \a\l\l\e H:i') . " · consenso privacy: sì\n"
       . 'Per rispondere basta usare "Rispondi": la risposta arriverà a ' . $email . "\n";

$encode = static fn(string $s): string => '=?UTF-8?B?' . base64_encode($s) . '?=';
$headers = [
    'From' => $encode($config['mittente_nome']) . ' <' . $config['mittente'] . '>',
    'Reply-To' => $encode($nome) . ' <' . $email . '>',
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/plain; charset=UTF-8',
    'Content-Transfer-Encoding' => '8bit',
];

$inviato = @mail(
    $config['destinatario'],
    $encode($oggetto),
    $corpo,
    $headers,
    '-f' . $config['mittente']
);

if (!$inviato) {
    torna($ritorno, false, ['Errore del server di posta. Riprova più tardi oppure scrivi a ' . $config['destinatario'] . '.'], $old);
}

// Nuovo token dopo un invio riuscito
$_SESSION['csrf'] = bin2hex(random_bytes(32));
torna($ritorno, true);
