<?php
/** Riquadro mappa: l'iframe di Google Maps viene inserito da main.js solo dopo il consenso ai cookie. */
?>
<div class="map" data-map-src="https://maps.google.com/maps?q=Via+Roma+9,+37030+Lavagno+VR&amp;z=16&amp;output=embed">
  <div class="map__placeholder">
    <?= icon('pin', 'icon map__icon') ?>
    <p class="map__title">Mappa Google</p>
    <p>Si carica solo dopo che il visitatore accetta i cookie.</p>
    <button type="button" class="btn btn--ghost btn--small" data-consent="yes">Accetta e mostra la mappa</button>
  </div>
</div>
