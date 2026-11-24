---
name: nuova-pagina
description: Crea una nuova pagina del sito della scuola (es. Servizi, Notizie, Privacy policy, Cookie policy, Amministrazione trasparente) con la stessa grafica, e la collega a menu, footer, sitemap e redirect dal vecchio sito. Usare quando si chiede di aggiungere una pagina.
---

# Creare una nuova pagina

Servono i **testi approvati dalla scuola**: se non ci sono, chiedili oppure prepara la struttura con segnaposti evidenti e dillo chiaramente. Prima di scrivere codice, proponi all'utente la struttura della pagina (sezioni e componenti) e attendi conferma.

## 1. File della pagina

Crea `montanari/<nome>.php` (nome minuscolo con trattini, es. `servizi.php`, `privacy.php`). Sarà raggiungibile come `<nome>.html` senza toccare `.htaccess`.

Schema di partenza (copia lo stile delle pagine interne esistenti, es. `la-scuola.php`):

```php
<?php
$pageTitle = 'Servizi';
$pageDescription = 'Frase di 140-160 caratteri che descrive la pagina per Google.';
$activePage = 'servizi';   // chiave del menu, oppure '' se la pagina non è nel menu
require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="Percorso"><a href="index.html">Home</a> / Servizi</nav>
    <h1>Servizi e laboratori</h1>
    <p class="lead">Testo introduttivo.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <!-- contenuto con i componenti di style.css (vedi CLAUDE.md) -->
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
```

Per pagine di solo testo (privacy, cookie, trasparenza) usa una `.card` con titoli `<h2>` e paragrafi; se serve aggiungi in `style.css` una classe per il testo lungo (es. `.prose` con margini tra paragrafi e liste puntate), invece di stili inline.

## 2. Collegamenti da aggiornare

1. **Menu** (se va nel menu): aggiungi la voce all'array `$menu` in `includes/header.php`, nell'ordine giusto, usando `$base . '<nome>.html'`. Ordine previsto dal design: La scuola, La giornata, Servizi, Iscrizioni, Notizie, Contatti. Su schermi stretti il menu deve restare su una riga: verifica a 1100px di larghezza.
2. **Footer**: in `includes/footer.php` aggiungi il link nella colonna giusta, oppure sostituisci il `href="#"` corrispondente (Privacy, Cookie, Amministrazione trasparente, Sovvenzioni, Bilancio, Accessibilità) con `<?= $base ?><nome>.html`. Ci sono due footer (completo e compatto): aggiorna entrambi dove il link compare.
3. **Link nelle altre pagine**: per Servizi in home si può aggiungere `<a class="link-arrow" href="servizi.html">Scopri di più <?= icon('arrow') ?></a>` nella `.section-head` di "Servizi e laboratori"; per Notizie, "Tutte le notizie" nella sezione "Ultime notizie". Privacy: il link "informativa privacy" nel modulo di `contatti.php` e il link nel banner cookie in `includes/footer.php`.
4. **Sitemap**: aggiungi una riga `<url>` in `montanari/sitemap.xml` con l'indirizzo `https://www.infanziamontanari.it/<nome>.html` (non per privacy/cookie).
5. **Vecchio sito**: in `includes/vecchio-sito.php` cambia la destinazione delle voci che oggi puntano a `index.html` e corrispondono alla nuova pagina (i commenti indicano cosa erano: servizi, privacy, trasparenza...).

## 3. Verifica

- `php -l montanari/<nome>.php`
- Anteprima: `php -S localhost:8080 -t montanari strumenti/router.php`, apri `/<nome>.html`, controlla menu attivo, breadcrumb, footer, versione mobile (390px) senza scroll orizzontale.
- Un solo `<h1>`, testi in italiano senza errori, nessun link a `.php`.
- Poi proponi `/pubblica`.
