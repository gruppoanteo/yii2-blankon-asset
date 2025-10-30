Yii2 Blankon Theme
==================

Blankon Assets Yii Framework 2.0 - Provided by Marco Curatitoli at HalService

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist anteo/yii2-blankon-asset "*"
```

or add

```
"anteo/yii2-blankon-asset": "*"
```


additional views:

- mdmsoft/yii2-admin [ONLY ~2.0 version]:
set in config:
```php
'components' => [
    'view' => [
        'theme' => [
            'pathMap' => [
                '@mdm/admin/views' => '@anteo/blankon/views/admin',
            ],
        ],
   ],
],

```
- anteo/yii2-radius:
set in config:
```php
'components' => [
    'view' => [
        'theme' => [
            'pathMap' => [
                '@anteo/radius/views' => '@anteo/blankon/views/radius',
            ],
        ],
    ],
],
```
