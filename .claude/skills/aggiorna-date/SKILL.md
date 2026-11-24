---
name: aggiorna-date
description: Aggiorna nel sito della scuola le informazioni che cambiano ogni anno o dopo un evento - date delle porte aperte, anno scolastico delle iscrizioni, scadenza consegna moduli, rette, numero di bambini, calendario. Usare quando cambiano date, anno scolastico o costi, o quando un evento indicato nel sito è passato.
---

# Aggiornare date e dati stagionali

Le stesse informazioni compaiono in più punti: aggiornale **tutte insieme**, con i testi forniti dalla scuola. Non inventare date o importi: se mancano, chiedili.

## Dove si trovano

Cerca sempre con grep per non dimenticare nulla (i numeri di riga possono cambiare):

```bash
grep -rnE "novembre|gennaio|dicembre|febbraio|20[0-9]{2}-[0-9]{2}|€ [0-9]+|bambini" montanari --include=*.php
```

| Informazione | File e punto |
|---|---|
| Date e orari porte aperte | `index.php` (banner giallo "Iscrizioni aperte" e notizia "Porte aperte"), `iscrizioni.php` (riquadro "Prossime porte aperte") |
| Anno scolastico iscrizioni (es. 2027-28) | `includes/header.php` (bottone del menu), `index.php` (banner giallo), `iscrizioni.php` (titolo, descrizione meta, "Domanda di iscrizione"), `sitemap.xml` non serve |
| Scadenza consegna moduli | `iscrizioni.php` (passaggio 3 "Consegnali") |
| Rette | `iscrizioni.php` (riquadro "Rette attuali") |
| Numero bambini e sezioni | `index.php` (riquadro numeri), `la-scuola.php` (timeline "Oggi") |
| Calendario scolastico (es. 2026-27) | `la-giornata.php` ("Scarica il calendario"), `la-scuola.php` (documenti) |
| PTOF (es. 2025-2028) | `la-scuola.php` (documenti) |

## Regole

- **Porte aperte passate**: se una data è passata, toglila dai testi; se lo sono tutte, sostituisci con il testo nuovo fornito dalla scuola. Nella notizia in home (`.news`) aggiorna etichetta, titolo e testo; se non ci sono eventi in programma, chiedi alla scuola cosa mostrare (eventualmente nascondi la sezione "Ultime notizie").
- Controlla che i giorni della settimana indicati corrispondano davvero alle date (es. "sabato 16 gennaio 2027").
- Formato date: "28 novembre 2026", orari "10:00–12:30".
- Dopo le modifiche: controllo sintassi (`php -l`) e anteprima locale delle pagine toccate. Poi proponi `/pubblica`.
- Riepiloga all'utente ogni frase cambiata (prima → dopo).
