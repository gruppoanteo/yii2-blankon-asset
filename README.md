## Yii2 Blankon Asset

Blankon theme assets and UI helpers for Yii Framework 2.0. This package bundles the Blankon admin styles/scripts and provides ready-to-use Yii2 AssetBundles plus a few helper widgets and example layouts. Provided by Marco Curatitoli at HalService. Mantained by Pietro Bardone (p3pp01) at Anteo Impresa Sociale.

### Features
- **Asset bundles**: `BlankonAsset` (core), `PluginAsset`, `LoginAsset`, `ErrorAsset`, `TimelineAsset`, `MarketingAsset`, `IssueTrackerAsset`, `IE9Asset`.
- **Theme support**: switch Blankon color theme via `BlankonAsset::$theme` (e.g. `default`, etc.).
- **Widgets**: convenient wrappers such as `anteo\blankon\widgets\Alert` and `anteo\blankon\widgets\GridView` with sensible defaults.
- **Examples**: sample layouts and views under `example/` and `views/` to jump-start integration.

## Installation

Install via Composer:

```bash
composer require anteo/yii2-blankon-asset
```

This package requires Yii2 and depends on several Bower assets. Relevant dependencies are declared in `composer.json` and will be installed automatically (e.g., `yiisoft/yii2`, `yiisoft/yii2-bootstrap`, `anteo/yii2-fontawesome`, `bower-asset/animate.css`, `jquery.cookie`, `jquery.nicescroll`, `jquery.easing`, `html5shiv`, `respond`).

## Usage

### Register the core assets
Register `BlankonAsset` in a layout or a view:

```php
use anteo\blankon\BlankonAsset;

/* @var $this yii\web\View */

$asset = BlankonAsset::register($this);
```

This loads core Blankon CSS (`components.css`, `plugins.css`, `yii-custom.css`), the selected theme CSS, `custom.css`, and JS (`appsmod.js`).

### Select a theme
`BlankonAsset` exposes a `$theme` property that appends `admin/css/themes/{theme}.theme.css`.

```php
$asset = BlankonAsset::register($this);
$asset->theme = 'default'; // change to any available theme name under assets/admin/css/themes/
```

### Enable demo scripts (optional)
If you want to include the demo script (`admin/js/demomod.js`):

```php
$asset = BlankonAsset::register($this);
$asset->demo = true;
```

### Plugin assets
`PluginAsset` provides common front-end plugins sourced from Bower (e.g., `animate.css`, `jquery.nicescroll`, `jquery.cookie`, `jquery.easing`) and includes `IE9Asset` for legacy support.

You typically do not need to register this manually because `BlankonAsset` depends on it:

```php
// Implicit via BlankonAsset dependencies
```

### Page-specific assets
Use specialized bundles when needed:
- `LoginAsset`: adds `admin/css/pages/sign.css` (depends on `BlankonAsset`).
- `ErrorAsset`: adds `admin/css/pages/error-page.css` (depends on `BlankonAsset`).
- `TimelineAsset`: adds `admin/css/pages/timeline.css` (depends on `BlankonAsset`).
- `MarketingAsset`: adds `admin/css/pages/dashboard-marketing-campaign.css` (depends on `BlankonAsset`).
- `IssueTrackerAsset`: adds `admin/css/pages/project-issue-tracker.css` (depends on `BlankonAsset`).

Register as usual when your view requires them:

```php
use anteo\blankon\LoginAsset;
LoginAsset::register($this);
```

## Widgets

### Alert
Widget that renders Yii session flashes using `kartik\alert\Alert` with Blankon-friendly defaults.

```php
use anteo\blankon\widgets\Alert;

// In your layout/view
echo Alert::widget([
    // 'delay' => 4000,
    // 'closeButton' => ['class' => 'close'],
]);
```

Flash messages can be set as normal:

```php
\Yii::$app->session->setFlash('success', 'Saved successfully');
```

### GridView
Extends `yii\grid\GridView` adding Blankon table classes and optional responsiveness.

```php
use anteo\blankon\widgets\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [/* ... */],
    'responsive' => true, // adds .table-responsive wrapper class
]);
```

## Example layouts and views

See `example/layouts` and `example/site` for minimal integration examples, and `views/` for additional admin/radius sample pages and partials that demonstrate list, form, and layout patterns.

## Assets source structure

- `assets/` contains the publishable resources used by the bundles (CSS/JS/images).
- `src/` includes the original sources (LESS/SASS/JS) and documentation styles/scripts, if you need to customize or rebuild.

## Suggested packages

- `mdmsoft/yii2-admin` (~2.0): RBAC administration.
- `anteo/yii2-radius-module`: Radius module integration.

## License

BSD 3-Clause. See the `license` field in `composer.json`.

## Support

Issues and contributions are welcome. Author: `p3pp01` Pietro Bardone (pietro.bardone@gruppoanteo.it).


