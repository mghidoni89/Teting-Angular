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

    // Mittente delle email. Per decisione della scuola (26/11/2026) è lo stesso indirizzo
    // della segreteria, senza casella noreply. Se i messaggi finiscono nello spam o non
    // arrivano, valutare una casella del dominio (es. noreply@infanziamontanari.it).
    // La risposta va comunque al visitatore: il suo indirizzo è impostato come Reply-To.
    'mittente' => 'scmontanari@tiscali.it',
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
    'pagina_ritorno' => 'contatti.html',
];
