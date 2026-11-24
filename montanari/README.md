# Sito Scuola dell'Infanzia Carlo Montanari

Sito in PHP semplice (nessun framework, nessun database). Basta un hosting con PHP 7.4 o superiore.

## Pagine

| File | Pagina |
|---|---|
| `index.php` | Home |
| `la-scuola.php` | La scuola (chi siamo, metodo, organi e documenti) |
| `la-giornata.php` | La giornata |
| `iscrizioni.php` | Iscrizioni |
| `contatti.php` | Contatti con modulo |
| `invia.php` | Invio del modulo contatti (non è una pagina da visitare) |

Header, footer, icone e mappa sono in `includes/` e sono condivisi da tutte le pagine.

## Modulo contatti

Tutte le impostazioni sono in **`config.php`**: indirizzo che riceve i messaggi, mittente, oggetto e limiti antispam.

- Il campo `mittente` deve essere un indirizzo del dominio su cui è pubblicato il sito (es. `noreply@infanziamontanari.it`), altrimenti molti provider scartano le email.
- L'invio usa la funzione `mail()` di PHP, attiva sulla maggior parte degli hosting condivisi.
- Protezioni: token anti-CSRF, campo trappola (honeypot) per i bot, tempo minimo di compilazione, pulizia dei campi contro l'inserimento di header.
- `config.php` e la cartella `includes/` sono bloccati dal browser tramite `.htaccess` (server Apache).

## Mappa e cookie

La mappa Google viene caricata solo dopo che il visitatore accetta il banner cookie (o clicca "Accetta e mostra la mappa"). La scelta resta memorizzata nel browser. Il link "Cookie" nel footer riapre il banner.

## Da completare

- Link ai PDF (PTOF, regolamento, calendario, menu, domanda di iscrizione, informativa privacy): ora sono `href="#"`.
- Footer: Amministrazione trasparente, Sovvenzioni ricevute, Bilancio, Privacy, Cookie policy, Accessibilità (ora `#`).
- Pagine Servizi e Notizie (rimandate a una fase successiva).
- Foto reali della scuola: quelle attuali vengono dal vecchio sito (`assets/img/`).

## Prova in locale

```bash
php -S localhost:8080 -t montanari
```

Poi apri http://localhost:8080.

I font (Fraunces e Nunito, licenza OFL) sono ospitati in `assets/fonts/`: nessuna chiamata a Google Fonts.
