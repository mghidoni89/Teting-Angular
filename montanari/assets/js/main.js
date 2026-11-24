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

  function apply(value) {
    setConsent(value);
    if (banner) banner.hidden = true;
    if (value === 'yes') loadMaps();
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-consent]');
    if (btn) { apply(btn.getAttribute('data-consent')); return; }
    var settings = e.target.closest('[data-cookie-settings]');
    if (settings && banner) { e.preventDefault(); banner.hidden = false; }
  });

  var current = getConsent();
  if (current === 'yes') loadMaps();
  else if (current !== 'no' && banner) banner.hidden = false;

  /* ---------- Modulo: timestamp per il controllo antispam ---------- */
  document.querySelectorAll('input[name="ts"]').forEach(function (input) {
    input.value = String(Math.floor(Date.now() / 1000));
  });
})();
