/* Scuola dell'Infanzia Carlo Montanari — menu mobile, consenso cookie, mappa */
(function () {
  'use strict';

  /* ---------- Menu mobile ---------- */
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('menu-principale');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      nav.classList.toggle('is-open', !open);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        toggle.focus();
      }
    });
  }

  /* ---------- Consenso cookie ---------- */
  var KEY = 'cm-consenso-cookie';
  var banner = document.getElementById('cookie-banner');

  function getConsent() {
    try { return window.localStorage.getItem(KEY); } catch (e) { return null; }
  }
  function setConsent(value) {
    try { window.localStorage.setItem(KEY, value); } catch (e) { /* storage non disponibile */ }
  }

  function loadMaps() {
    document.querySelectorAll('.map[data-map-src]').forEach(function (box) {
      if (box.querySelector('iframe')) return;
      var iframe = document.createElement('iframe');
      iframe.src = box.getAttribute('data-map-src');
      iframe.title = 'Mappa: Via Roma 9, Lavagno (VR)';
      iframe.loading = 'lazy';
      iframe.referrerPolicy = 'no-referrer-when-downgrade';
      box.appendChild(iframe);
      var ph = box.querySelector('.map__placeholder');
      if (ph) ph.hidden = true;
    });
  }

  // Revoca del consenso: toglie la mappa già caricata e rimette il segnaposto
  function unloadMaps() {
    document.querySelectorAll('.map[data-map-src]').forEach(function (box) {
      var iframe = box.querySelector('iframe');
      if (iframe) iframe.remove();
      var ph = box.querySelector('.map__placeholder');
      if (ph) ph.hidden = false;
    });
  }

  var prefs = document.getElementById('cookie-preferenze');
  var customize = document.querySelector('[data-consent-customize]');
  var mapsBox = document.getElementById('consenso-maps');

  function showPrefs(open) {
    if (!prefs || !customize) return;
    prefs.hidden = !open;
    customize.setAttribute('aria-expanded', String(open));
    if (open && mapsBox) mapsBox.checked = getConsent() === 'yes';
  }

  function apply(value) {
    setConsent(value);
    if (banner) banner.hidden = true;
    showPrefs(false);
    if (value === 'yes') loadMaps(); else unloadMaps();
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-consent]');
    if (btn) { apply(btn.getAttribute('data-consent')); return; }
    if (e.target.closest('[data-consent-customize]')) { showPrefs(prefs.hidden); return; }
    var settings = e.target.closest('[data-cookie-settings]');
    if (settings && banner) { e.preventDefault(); banner.hidden = false; showPrefs(false); }
  });

  if (prefs) {
    prefs.addEventListener('submit', function (e) {
      e.preventDefault();
      apply(mapsBox && mapsBox.checked ? 'yes' : 'no');
    });
  }

  var current = getConsent();
  if (current === 'yes') loadMaps();
  else if (current !== 'no' && banner) banner.hidden = false;

  /* ---------- Modulo: timestamp per il controllo antispam ---------- */
  document.querySelectorAll('input[name="ts"]').forEach(function (input) {
    input.value = String(Math.floor(Date.now() / 1000));
  });
})();
