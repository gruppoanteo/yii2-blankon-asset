/* ============================================================================
 * Blankon — Theme Toggle (light / dark / auto)
 * ----------------------------------------------------------------------------
 * Lo stato è gestito su <html data-theme="light|dark|auto">. La preferenza è
 * persistita su localStorage (chiave `theme`) e su cookie (per il bootstrap
 * inline lato server in eventuali render full-page non-Yii).
 *
 * API esposta:
 *   BkTheme.get()                 -> 'light' | 'dark' | 'auto'
 *   BkTheme.set('dark')           imposta + persiste
 *   BkTheme.toggle()              cicla light <-> dark (ignora 'auto')
 *   BkTheme.cycle()               cicla light -> dark -> auto -> light
 *   document evento 'bk:theme'    detail = { theme }
 *
 * Click handlers (auto-bind):
 *   [data-bk-theme-toggle]        toggle light/dark
 *   [data-bk-theme-set="dark"]    set diretto
 * ========================================================================== */
(function (window, document) {
    'use strict';

    var STORAGE_KEY = 'theme';
    var COOKIE_DAYS = 365;
    var VALID = ['light', 'dark', 'auto'];

    function read() {
        var v = null;
        try { v = localStorage.getItem(STORAGE_KEY); } catch (e) {}
        if (!v) {
            var m = document.cookie.match(new RegExp('(?:^|; )' + STORAGE_KEY + '=([^;]*)'));
            if (m) v = decodeURIComponent(m[1]);
        }
        return VALID.indexOf(v) >= 0 ? v : 'light';
    }

    function write(v) {
        try { localStorage.setItem(STORAGE_KEY, v); } catch (e) {}
        var exp = new Date(Date.now() + COOKIE_DAYS * 864e5).toUTCString();
        document.cookie = STORAGE_KEY + '=' + encodeURIComponent(v) +
            '; expires=' + exp + '; path=/; SameSite=Lax';
    }

    function apply(v) {
        document.documentElement.setAttribute('data-theme', v);
        document.dispatchEvent(new CustomEvent('bk:theme', { detail: { theme: v } }));
    }

    var BkTheme = {
        get: read,
        set: function (v) {
            if (VALID.indexOf(v) < 0) return;
            write(v);
            apply(v);
        },
        toggle: function () {
            var current = read();
            this.set(current === 'dark' ? 'light' : 'dark');
        },
        cycle: function () {
            var current = read();
            var next = current === 'light' ? 'dark' : current === 'dark' ? 'auto' : 'light';
            this.set(next);
        }
    };

    // Bootstrap: se data-theme non è già settato dallo snippet inline, settalo ora
    if (!document.documentElement.getAttribute('data-theme')) {
        apply(read());
    }

    // Reagisci ai cambi di prefers-color-scheme quando siamo in 'auto'
    if (window.matchMedia) {
        try {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function () {
                if (read() === 'auto') apply('auto');
            });
        } catch (e) { /* Safari <14 */ }
    }

    // Auto-bind dei controlli
    function bind() {
        document.addEventListener('click', function (e) {
            var t = e.target.closest && e.target.closest('[data-bk-theme-toggle],[data-bk-theme-set]');
            if (!t) return;
            e.preventDefault();
            if (t.hasAttribute('data-bk-theme-set')) {
                BkTheme.set(t.getAttribute('data-bk-theme-set'));
            } else {
                BkTheme.toggle();
            }
        });
    }

    // Swap del logo: ogni <img data-bk-logo-light="..." data-bk-logo-dark="...">
    // viene aggiornato al cambio tema (e al bootstrap). Approccio JS è più
    // robusto del CSS `content: url(...)` che non funziona su tutti i browser.
    function effectiveTheme() {
        var t = read();
        if (t !== 'auto') return t;
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    function swapLogos() {
        var imgs = document.querySelectorAll('img[data-bk-logo-light]');
        var eff = effectiveTheme();
        for (var i = 0; i < imgs.length; i++) {
            var img = imgs[i];
            var src = eff === 'dark' ? img.getAttribute('data-bk-logo-dark') : img.getAttribute('data-bk-logo-light');
            if (src && img.getAttribute('src') !== src) img.setAttribute('src', src);
        }
    }
    document.addEventListener('bk:theme', swapLogos);
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', swapLogos);
    } else {
        swapLogos();
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bind);
    } else {
        bind();
    }

    window.BkTheme = BkTheme;
})(window, document);
