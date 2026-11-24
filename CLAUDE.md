# Sito Scuola dell'Infanzia Carlo Montanari

Sito istituzionale della **Scuola dell'Infanzia Paritaria Carlo Montanari**, federata FISM, Via Roma 9, 37030 San Pietro di Lavagno (VR).
Dominio di produzione: **https://www.infanziamontanari.it** (sostituisce un vecchio WordPress).

Rispondi in italiano. Chi ti scrive gestisce il sito per conto della scuola: spiega le cose in modo semplice e chiedi conferma prima di pubblicare, cancellare o cambiare dove arrivano le email.

## Struttura del progetto

```
CLAUDE.md                 queste istruzioni (NON va sul server)
.claude/skills/           procedure guidate per le operazioni ricorrenti (NON va sul server)
strumenti/router.php      anteprima locale con le stesse regole di .htaccess
strumenti/crea-zip.php    crea gli zip di produzione e staging in dist/
dist/                     zip generati (NON va nel versionamento)
montanari/                IL SITO: è il contenuto di questa cartella che va sul server
  index.php               Home
  la-scuola.php           La scuola (chi siamo, metodo, organi, documenti)
  la-giornata.php         La giornata (orari, prolungato, calendario, menu)
  iscrizioni.php          Iscrizioni (porte aperte, passaggi, rette, moduli, FAQ)
  contatti.php            Contatti + modulo
  invia.php               riceve il modulo e invia l'email (non è una pagina)
  404.php                 pagina di errore
  config.php              impostazioni del modulo contatti (destinatario, mittente...)
  .htaccess               indirizzi .html, 404, HTTPS/www, noindex staging, protezioni
  robots.txt, sitemap.xml per Google (validi solo in produzione)
  includes/header.php     <head>, barra superiore, menu (array $menu)
  includes/footer.php     footer completo (home) o compatto (pagine interne)
  includes/icons.php      icone SVG: icon('nome')
  includes/map.php        riquadro mappa Google (si carica dopo il consenso cookie)
  includes/vecchio-sito.php  redirect 301 dai vecchi indirizzi WordPress (?page_id=, ?p=)
  assets/css/style.css    tutto lo stile
  assets/js/main.js       menu mobile, banner cookie, mappa
  assets/fonts/           Fraunces (titoli) e Nunito (testi), ospitati in locale
  assets/img/             immagini
```

È PHP semplice: nessun framework, nessun database, nessun build. Ogni pagina imposta `$pageTitle`, `$pageDescription`, `$activePage` (e `$footerFull = true` solo in home), poi include `includes/header.php` e alla fine `includes/footer.php`.

## Regole importanti

- **I testi sono approvati dalla scuola.** Non inventare né riscrivere contenuti: usa i testi forniti. Se manca un'informazione, lascia un segnaposto evidente (es. `[data da confermare]`) e segnalalo.
- **Indirizzi in .html.** Nel browser le pagine si chiamano `nome.html` ma i file sono `nome.php` (ci pensa `.htaccess`). Nei link interni usa SEMPRE `.html` (es. `href="iscrizioni.html"`). Unica eccezione: `action="invia.php"` del modulo.
- **Header e footer** usano `$base` davanti ai link (`<?= $base ?>contatti.html`) perché devono funzionare anche dalla 404 in qualsiasi sottocartella. Nelle pagine normali i link relativi semplici vanno bene.
- **`.htaccess`** contiene i marcatori `# >>> NOINDEX` / `# <<< NOINDEX` e `# >>> SOLO-PRODUZIONE` / `# <<< SOLO-PRODUZIONE`: servono a `strumenti/crea-zip.php` per generare la versione di staging. Non toglierli.
- **Non cambiare** il destinatario delle email in `config.php`, né le regole HTTPS/www, senza conferma esplicita.
- **Nessun servizio esterno** senza consenso: niente Google Fonts, analytics o script di terzi. L'unico servizio esterno è la mappa di Google, caricata solo dopo il consenso nel banner cookie. Se se ne aggiunge uno, va gestito allo stesso modo e citato nella cookie policy.
- **Testi accessibili**: un solo `<h1>` per pagina, `alt` sulle immagini con contenuto, `alt=""` su quelle decorative, contrasti adeguati.
- **Foto di bambini**: pubblicarle solo se la scuola conferma di avere la liberatoria dei genitori.

## Stile grafico (in `assets/css/style.css`)

Colori (variabili CSS): sfondo crema `--bg #fef7ed`, testo `--ink #292631`, accento terracotta `--accent #b3462f`, giallo `--yellow #f3c95d`, pastelli `--yellow-soft`, `--pink-soft`, `--green-soft`, `--blue-soft`.
Titoli in Fraunces, testi in Nunito. Angoli arrotondati (20–32px), card bianche con ombra leggera.

Componenti pronti da riusare (guarda le pagine esistenti per l'HTML):
`.section` + `.container` (sezione) · `.eyebrow` (etichetta sopra il titolo) · `.h-section` · `.lead` ·
`.btn` con `.btn--primary` / `--outline` / `--dark` / `--light` / `--yellow` / `--ghost` (+ `--small`) ·
`.grid .grid--2/3/4` · `.card` · `.quick` (card colorata con link) · `.service` · `.pastel-card` ·
`.panel-dark` · `.cta-yellow` · `.news` · `.page-head` + `.breadcrumb` + `.pills` · `.split` + `.timeline` ·
`.schedule` · `.aside-card` · `.hero-yellow` + `.openday` · `.step` · `.fees` · `.doc-list` · `.faq` (con `<details>`) ·
classi colore `bg-yellow` / `bg-pink` / `bg-green` / `bg-blue`.

## Comandi

Anteprima locale (serve PHP 8 installato), dalla cartella principale del progetto:

```bash
php -S localhost:8080 -t montanari strumenti/router.php
```

Poi apri http://localhost:8080. Il router riproduce le regole di `.htaccess` (indirizzi .html, 404). Il modulo contatti in locale non invia email (manca il server di posta): è normale.

Controllo sintassi di tutti i file PHP:

```bash
for f in montanari/*.php montanari/includes/*.php strumenti/*.php; do php -l "$f"; done
```

Creare gli zip da caricare:

```bash
php strumenti/crea-zip.php
```

Genera `dist/sito-montanari-produzione.zip` e `dist/sito-montanari-staging.zip`.

## Pubblicazione

- **Produzione**: contenuto di `montanari/` (dallo zip di produzione) nella cartella principale del dominio www.infanziamontanari.it.
- **Staging (server di prova)**: zip di staging, in una sottocartella del server di prova (es. `/staging/montanari/`). Blocca Google su tutto.
- Caricare sempre anche `.htaccess`: inizia con il punto e molti client FTP lo nascondono.
- Mai caricare sul server `CLAUDE.md`, `.claude/`, `strumenti/`, `dist/`.
- Dopo ogni pubblicazione verifica: home, una pagina interna, un indirizzo inesistente (deve dare la 404 del sito), un vecchio indirizzo `.php` (deve portare al `.html`).

Le procedure passo passo sono negli skill: `/pubblica`, `/nuova-pagina`, `/aggiorna-date`, `/collega-documenti`.

## Stato attuale e cose da completare

Pagine online: Home, La scuola, La giornata, Iscrizioni, Contatti. Rimandate a una fase successiva: **Servizi** e **Notizie** (tolte dal menu).

Da completare (dipende dai materiali della scuola):

- PDF da collegare (ora `href="#"`): PTOF 2025-2028, Regolamento interno, Calendario 2026-27, Menu stagionale, Domanda di iscrizione 2027-28, Informativa privacy → skill `/collega-documenti`.
- Pagine legali (link del footer ora `#`): Privacy policy, Cookie policy, Amministrazione trasparente, Sovvenzioni ricevute, Bilancio, Accessibilità.
- Foto reali della scuola: `assets/img/hero-bimbi.jpg` (home) e `assets/img/porte-aperte.jpg` (notizia) sono foto di repertorio del vecchio sito.
- Mittente email: in `config.php` `mittente` deve essere una casella del dominio (es. noreply@infanziamontanari.it), da verificare con un invio reale dopo la pubblicazione.
- Date delle porte aperte: 28 novembre 2026 e 16 gennaio 2027 → dopo ogni data aggiornare con `/aggiorna-date`.

La checklist condivisa con la scuola è nel documento "Nuovo sito Scuola Carlo Montanari – cosa manca per andare online".

## Contatti della scuola (dati pubblici usati nel sito)

Telefono 045 982353 · Email scmontanari@tiscali.it · Segreteria lun–ven 9:00–12:00 · C.F. 80031580238 · P.IVA 01540610233 · Facebook facebook.com/InfanziaMontanari
