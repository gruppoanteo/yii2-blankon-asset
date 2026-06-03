# Changelog

Tutte le modifiche notevoli a `anteo/yii2-blankon-asset`.

Il formato segue [Keep a Changelog](https://keepachangelog.com/it/1.1.0/)
e questo progetto aderisce a [SemVer](https://semver.org/lang/it/).

## [2.1.0] — 2026-06-03

### Added — layout caricato dal bundle + brand defaults tokenizzati
- **`admin/css/layout.css` ora è caricato dal `BlankonAsset`** (era commentato
  dalla versione 1.x). I consumer che mantenevano una copia locale del file
  possono ora rimuoverla (vedi nota di migrazione sotto).
- Nuovi tokens (`theme/_tokens.css`) per i layout default brand:
  - `--bk-font-family` (default `Ubuntu, Poppins, sans-serif`)
  - `--bk-sidebar-width` (default `220px`)
  - `--bk-header-height` (default `50px`)
  - `--bk-header-content-padding` (default `18px 20px`)
- `custom.css` ora usa `var(--bk-font-family)` sul `body`, così cambiare font
  significa scrivere un solo override CSS senza riscrivere la regola `body`.
- `layout.css`: 38 sostituzioni totali — sidebar width hardcoded (`220px` /
  `-220px`) tokenizzate a `var(--bk-sidebar-width)` / `calc(-1 * var(...))`;
  `#header { height }` a `var(--bk-header-height)`; `.header-content padding`
  a `var(--bk-header-content-padding)`.

### Migration note (1.x → 2.1.0)
Se nella vostra applicazione mantenete una copia statica di `layout.css`
(es. `backend/web/css/blankon_layout.css`) ricordatevi di:
1. **Rimuovere** il caricamento manuale (`registerCssFile`) di quella copia.
2. **Verificare** che gli override locali residuano in un file di brand
   (es. `blankon_custom.css`) e non duplichino regole già nel vendor.

Se NON modificate l'asset, il rendering è identico al 2.0.0 (i token light
hanno gli stessi valori dei colori hardcoded originali).

## [2.0.0] — 2026-06-03 — Opt-in light/dark theming via design tokens

### Added — sistema di theming light / dark (opt-in)
- **Design tokens** in `assets/admin/css/theme/_tokens.css` (CSS custom properties
  `--bk-*` per surface, text, border, panel, form, table, tabs, dropdown, modal,
  breadcrumb, accent, stati, ombre, scrollbar, logo).
- **Tema chiaro** `assets/admin/css/theme/light.css` — mappa i token ai colori
  storici di Blankon (rendering invariato sul light).
- **Tema scuro** `assets/admin/css/theme/dark.css` — palette neutra moderna
  (`#0F1419` → `#E6E8EB`) con copertura WCAG AA. Supporta `prefers-color-scheme`
  via selettore `html[data-theme="auto"]`.
- **Coverage** `assets/admin/css/theme/coverage.css` — applica i token al DOM
  Bootstrap/Blankon comune: body, header, sidebar (sx/dx), page-content, panel,
  table/GridView, form/input/Select2, button-default, tabs, dropdown, popover,
  modal, breadcrumb, alert, footer, list-group, well/jumbotron, code/pre.
- **`BlankonAsset::$darkMode`** flag opt-in (`false` default | `true` |
  `'light'` | `'dark'`). Quando attivo, il bundle registra `_tokens.css` +
  `light.css` + `dark.css` + `coverage.css` e il JS `theme-toggle.js`.
- **`BlankonAsset::$logoLight` / `$logoDark`** per esporre i loghi al CSS via
  `--bk-logo-url` (swap automatico al cambio tema).
- **`BlankonAsset::renderThemeBoot()`** helper che emette uno `<script>` da
  inserire all'inizio del `<head>`: setta `<html data-theme>` prima del paint,
  eliminando il FOUC del toggle classico al `DOMContentLoaded`.
- **`assets/admin/js/theme-toggle.js`** runtime con API `window.BkTheme`
  (`get`/`set`/`toggle`/`cycle`), persistenza localStorage + cookie, evento
  custom `bk:theme`, auto-bind di `[data-bk-theme-toggle]` e
  `[data-bk-theme-set="…"]`, reattività a `prefers-color-scheme`.

### Changed
- `BlankonAsset::init()` ora registra condizionalmente la nuova catena di asset
  quando `$darkMode !== false`. L'accent skin `themes/<color>.theme.css` resta
  ortogonale e continua a funzionare come prima.

### Compatibilità
- Retro-compatibile 1.x: se non si imposta `$darkMode`, il bundle si comporta
  esattamente come la 1.x. Nessuna rottura attesa per i progetti esistenti.

---

## [1.x] — storia precedente

Vedi `git log` per le modifiche pre-2.0.0.
