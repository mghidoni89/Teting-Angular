<?php
/**
 * Footer comune. $footerFull = true mostra il footer completo (home),
 * altrimenti la versione compatta delle pagine interne, come da design.
 */
$footerFull = $footerFull ?? false;
?>
</main>

<?php if ($footerFull): ?>
<footer class="site-footer">
  <div class="container site-footer__grid">
    <div>
      <p class="site-footer__brand">Carlo Montanari</p>
      <p>Scuola dell'Infanzia Paritaria<br>Federata FISM Verona</p>
      <p>Via Roma 9 · 37030 Lavagno (VR)<br>
        <a href="tel:+39045982353">045 982353</a> · <a href="mailto:scmontanari@tiscali.it">scmontanari@tiscali.it</a></p>
      <a class="site-footer__social" href="https://www.facebook.com/InfanziaMontanari" target="_blank" rel="noopener"><?= icon('facebook') ?> Seguici su Facebook</a>
    </div>
    <div>
      <p class="site-footer__title">La scuola</p>
      <ul>
        <li><a href="la-scuola.html">Chi siamo</a></li>
        <li><a href="la-giornata.html">La giornata</a></li>
        <li><a href="iscrizioni.html">Iscrizioni</a></li>
        <li><a href="contatti.html">Contatti</a></li>
      </ul>
    </div>
    <div>
      <p class="site-footer__title">Trasparenza</p>
      <ul>
        <li><a href="#">Amministrazione trasparente</a></li>
        <li><a href="#">Sovvenzioni ricevute</a></li>
        <li><a href="#">Bilancio</a></li>
      </ul>
    </div>
    <div>
      <p class="site-footer__title">Link utili</p>
      <ul>
        <li><a href="https://www.fismverona.it" target="_blank" rel="noopener">FISM Verona</a></li>
        <li><a href="https://www.comune.lavagno.vr.it" target="_blank" rel="noopener">Comune di Lavagno</a></li>
        <li><a href="https://www.mim.gov.it" target="_blank" rel="noopener">Ministero dell'Istruzione e del Merito</a></li>
      </ul>
    </div>
  </div>
  <div class="container site-footer__bottom">
    <span>© <?= date('Y') ?> Scuola dell'Infanzia Carlo Montanari · C.F. 80031580238 · P.IVA 01540610233</span>
    <span class="site-footer__legal">
      <a href="#">Privacy</a>
      <a href="#" data-cookie-settings>Cookie</a>
      <a href="#">Accessibilità</a>
    </span>
  </div>
</footer>
<?php else: ?>
<footer class="site-footer site-footer--compact">
  <div class="container site-footer__bottom">
    <span>Scuola dell'Infanzia Paritaria Carlo Montanari · Via Roma 9, Lavagno (VR) · <a href="tel:+39045982353">045 982353</a></span>
    <span class="site-footer__legal">
      <a href="#">Amministrazione trasparente</a>
      <a href="#">Privacy</a>
      <a href="#" data-cookie-settings>Cookie</a>
    </span>
  </div>
</footer>
<?php endif; ?>

<div class="cookie-banner" id="cookie-banner" role="dialog" aria-live="polite" aria-label="Preferenze cookie" hidden>
  <div class="cookie-banner__inner">
    <p>Usiamo solo cookie tecnici. Con il tuo consenso carichiamo anche la mappa di Google Maps, che può installare cookie di terze parti. <a href="#">Cookie policy</a></p>
    <div class="cookie-banner__actions">
      <button type="button" class="btn btn--ghost btn--small" data-consent="no">Solo necessari</button>
      <button type="button" class="btn btn--primary btn--small" data-consent="yes">Accetta</button>
    </div>
  </div>
</div>
</body>
</html>
