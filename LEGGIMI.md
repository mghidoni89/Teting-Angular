# Kit di gestione del sito Scuola Carlo Montanari

Questa cartella contiene il sito e le istruzioni per gestirlo con **Claude Code**.

## Cosa serve sul computer

1. **Claude Code**: https://code.claude.com/docs (installazione e accesso).
2. **PHP 8** (per l'anteprima e per creare gli zip):
   - Mac: `brew install php`
   - Windows: scaricare da https://windows.php.net/download, aggiungere PHP al PATH e nel `php.ini` abilitare `extension=zip`.
   - Verifica: `php -v`

## Primo avvio

1. Estrai lo zip in una cartella di lavoro (es. `Documenti/scuola-montanari`).
2. Apri il terminale in quella cartella e avvia Claude Code:
   ```bash
   cd scuola-montanari
   claude
   ```
3. Claude legge da solo `CLAUDE.md` e conosce il progetto. Come primo messaggio puoi scrivere:
   > Leggi CLAUDE.md, avvia l'anteprima locale del sito e dimmi cosa manca per andare online.

Consigliato: tenere la cartella sotto versionamento (`git init`, oppure il repository GitHub del progetto) per avere lo storico delle modifiche.

## Comandi guidati (skill)

Scrivili in Claude Code così come sono:

| Comando | A cosa serve |
|---|---|
| `/pubblica` | Controlla il sito, crea lo zip di produzione o di staging e guida il caricamento e le verifiche |
| `/aggiorna-date` | Aggiorna porte aperte, anno scolastico, scadenze, rette, numeri |
| `/collega-documenti` | Aggiunge i PDF (PTOF, regolamento, calendario, menu, moduli) ai pulsanti "Scarica" |
| `/nuova-pagina` | Crea una nuova pagina (Servizi, Notizie, Privacy...) e la collega a menu, footer e sitemap |

Si può anche chiedere in parole semplici, es. "le porte aperte del 28 novembre sono passate, togli quella data".

## Cosa va sul server

Solo il **contenuto della cartella `montanari/`**, preso dallo zip creato con `/pubblica` (`dist/sito-montanari-produzione.zip` per il sito vero, `dist/sito-montanari-staging.zip` per il server di prova).
Mai caricare `CLAUDE.md`, `LEGGIMI.md`, `.claude/`, `strumenti/`, `dist/`.
