<?php

use hal\fontawesome\FA;
use yii\helpers\Html;

?>

<li class="navbar-search">
    <!-- Just view on mobile screen-->
    <?= Html::a(FA::icon(FA::_SEARCH), '#', ['class' => 'trigger-search']) ?>
    <?= Html::beginForm(['/core/default/search'], 'get', [
        'class' => 'navbar-form'
    ]); ?>
        <div class="form-group has-feedback">
            <!-- should be typeahead -->
            <?= Html::textInput('q', Yii::$app->request->get('q', ''), [
                'placeholder' => 'Search for people, places and things', 
                'class' => 'form-control rounded'
            ]) ?>
            <?= Html::submitButton('', ['class' => 'btn btn-theme fa fa-search form-control-feedback rounded']) ?>
        </div>
    <?= Html::endForm(); ?>
</li>