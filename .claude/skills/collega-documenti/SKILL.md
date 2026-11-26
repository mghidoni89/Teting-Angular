---
name: collega-documenti
description: Aggiunge al sito della scuola i PDF da scaricare (PTOF, regolamento, calendario, menu, domanda di iscrizione, informativa privacy, bilanci) e li collega ai pulsanti "Scarica". Usare quando la scuola fornisce o aggiorna un documento.
---

# Collegare i documenti PDF

## Dove vanno i file

Metti i PDF in `montanari/assets/docs/` (creala se non esiste) con nomi semplici, minuscoli, senza spazi né accenti, con l'anno:

- `ptof-2025-2028.pdf`
- `regolamento-interno-2026-27.pdf`
- `calendario-scolastico-2026-27.pdf`
- `menu-stagionale-2026-27.pdf`
- `domanda-iscrizione-2027-28.pdf`
- `informativa-privacy.pdf`

Se il file fornito ha un altro nome, copialo rinominandolo (non modificare l'originale).

## Dove sono i link (ora `href="#"`)

```bash
grep -rn 'href="#"' montanari --include=*.php
```

| Documento | Pagine |
|---|---|
| PTOF | `la-scuola.php` (Documenti) |
| Regolamento interno | `la-scuola.php` (Documenti), `iscrizioni.php` (Moduli) |
| Calendario scolastico | `la-scuola.php` (Documenti), `la-giornata.php` ("Scarica il calendario") |
| Menu stagionale | `la-scuola.php` (Documenti), `la-giornata.php` ("Vedi il menu") |
| Domanda di iscrizione | `iscrizioni.php` (Moduli) |
| Informativa privacy | `iscrizioni.php` (Moduli), `contatti.php` (casella di consenso: "informativa privacy") |

## Come collegare

Nella `.doc-list` sostituisci `href="#"` con il percorso e apri il PDF in una nuova scheda:

```html
<li><a href="assets/docs/ptof-2025-2028.pdf" target="_blank" rel="noopener"><span>PTOF 2025-2028</span><span><?= icon('download') ?>PDF · Scarica</span></a></li>
```

Per i link testuali (`.link-arrow`, informativa nel modulo) stessa cosa: `href="assets/docs/....pdf" target="_blank" rel="noopener"`.

## Regole

- Aggiorna anche il testo del link se l'anno del documento cambia (es. "Calendario scolastico 2027-28").
- Peso: se un PDF supera ~5 MB, segnalalo e suggerisci di comprimerlo.
- Quando sostituisci un documento con una versione nuova, elimina il PDF vecchio da `assets/docs/` solo dopo conferma.
- I link dei documenti legali del footer (Privacy, Cookie, Trasparenza) possono puntare a un PDF allo stesso modo, oppure a una pagina: in quel caso usa `/nuova-pagina`.
- Alla fine: controllo sintassi, verifica in anteprima che ogni link apra il file giusto, poi proponi `/pubblica`.
