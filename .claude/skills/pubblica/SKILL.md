---
name: pubblica
description: Prepara il sito della scuola per la pubblicazione su produzione o staging - controlla i file, crea gli zip e guida il caricamento e le verifiche. Usare quando si chiede di pubblicare, mettere online, aggiornare il server o preparare uno zip.
---

# Pubblicare il sito

Chiedi (se non è già chiaro) se si pubblica su **produzione** (www.infanziamontanari.it) o su **staging** (server di prova).

## 1. Controlli prima dello zip

1. Sintassi PHP:
   ```bash
   for f in montanari/*.php montanari/includes/*.php strumenti/*.php; do php -l "$f"; done
   ```
2. Link interni: nessun link a pagine `.php` (tranne `invia.php`):
   ```bash
   grep -rnE 'href="[^"#:]*\.php' montanari --include=*.php
   ```
   Deve restituire nulla.
3. Segnaposti rimasti: cerca `[data`, `[titolo`, `href="#"` e riporta all'utente l'elenco (i link `#` dei PDF e delle pagine legali sono noti; segnala solo le novità).
4. Date passate: se le porte aperte indicate nel sito sono già passate rispetto a oggi, avvisa e proponi `/aggiorna-date` prima di pubblicare.
5. Avvia l'anteprima e controlla che le pagine rispondano:
   ```bash
   php -S localhost:8080 -t montanari strumenti/router.php
   ```
   Verifica con curl: `/`, `/la-scuola.html`, `/la-giornata.html`, `/iscrizioni.html`, `/contatti.html` → 200; `/pagina-che-non-esiste` → 404; `/contatti.php` → 301. Poi ferma il server.

## 2. Creare lo zip

```bash
php strumenti/crea-zip.php produzione   # oppure: staging
```

Lo zip finisce in `dist/`. Contiene la cartella `montanari/`: va caricato il suo **contenuto**.

## 3. Istruzioni di caricamento da dare all'utente

- **Produzione**: prima della prima pubblicazione, fare un backup completo del vecchio sito WordPress (file + database). Caricare il contenuto di `montanari/` nella cartella principale del dominio. Il certificato HTTPS deve essere già attivo: se non lo è, prima di caricare commenta in `montanari/.htaccess` le 4 righe della regola HTTPS (blocco SOLO-PRODUZIONE) e rigenera lo zip.
- **Staging**: caricare nella sottocartella di prova, sovrascrivendo.
- In entrambi i casi controllare che `.htaccess` sia stato caricato (file nascosto in molti client FTP).
- Non caricare mai `CLAUDE.md`, `.claude/`, `strumenti/`, `dist/`.

## 4. Verifiche dopo il caricamento

Chiedi all'utente l'indirizzo e, se puoi raggiungerlo, verifica tu con curl; altrimenti dagli l'elenco:

- Home e pagine interne si aprono, con grafica e font corretti.
- `.../contatti.php` porta a `.../contatti.html`.
- Un indirizzo inventato mostra la pagina 404 del sito.
- Staging: l'header `X-Robots-Tag: noindex` è presente (`curl -sI URL | grep -i robots`).
- Produzione: `http://infanziamontanari.it` porta a `https://www.infanziamontanari.it`; un vecchio indirizzo come `/?page_id=106` porta a `la-scuola.html`; NON deve esserci `noindex`.
- Produzione, solo la prima volta: inviare un messaggio di prova dal modulo contatti e verificare che arrivi in segreteria (anche nello spam). Se non arriva, controllare `mittente` in `config.php` con l'hosting.
