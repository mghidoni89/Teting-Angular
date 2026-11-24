<?php
/**
 * Configurazione del modulo contatti.
 *
 * Questo è l'unico file da modificare per cambiare dove arrivano
 * i messaggi del sito. Viene letto da invia.php.
 */

return [
    // Indirizzo che riceve i messaggi inviati dal modulo "Scrivi alla segreteria".
    'destinatario' => 'scmontanari@tiscali.it',

    // Mittente tecnico delle email. Deve essere un indirizzo del dominio del sito
    // (es. noreply@infanziamontanari.it), altrimenti molti provider scartano il messaggio.
    // La risposta va comunque al visitatore: il suo indirizzo è impostato come Reply-To.
    'mittente' => 'noreply@infanziamontanari.it',
    'mittente_nome' => 'Sito Scuola Carlo Montanari',

    // Prefisso dell'oggetto delle email ricevute.
    'oggetto' => '[Sito scuola] Nuovo messaggio',

    // Protezione antispam: secondi minimi tra apertura della pagina e invio.
    'secondi_minimi' => 3,

    // Lunghezza massima dei campi.
    'max_nome' => 120,
    'max_motivo' => 200,
    'max_messaggio' => 5000,

    // Pagina a cui tornare dopo l'invio.
    'pagina_ritorno' => 'contatti.php',
];
