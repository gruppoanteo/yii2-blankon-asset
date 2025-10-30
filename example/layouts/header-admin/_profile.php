<?php

use cebe\gravatar\Gravatar;
use anteo\fontawesome\FA;
use yii\bootstrap\Dropdown;

$identity = Yii::$app->user->identity;
?>

<li class="dropdown navbar-profile">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="meta">
            <span class="avatar">
                <?= Gravatar::widget([
                    'email' => $identity->profile->gravatar_email,
                    'options' => [
                        'alt' => $identity->profile->fullname,
                        'class' => 'img-circle'
                    ],
                    'size' => 32
                ]) ?>
            </span>
            <span class="text hidden-xs hidden-sm text-muted"><?= $identity->username ?></span>
            <span class="caret"></span>
        </span>
    </a>
    <!-- Start dropdown menu -->
    <?= Dropdown::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'dropdown-menu animated bounceInDown'],
        'items' => [
            ['label' => 'Account', 'options' => ['class' => 'dropdown-header']],
            ['label' => FA::icon(FA::_USER) . 'View profile', 'url' => ['/core/user/profile']],
            ['label' => FA::icon(FA::_ENVELOPE_SQUARE) . 'Inbox <span class="label label-info pull-right">30</span>', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => FA::icon(FA::_SIGN_OUT) . 'Logout', 'url' => ['/core/default/logout'], 'linkOptions' => ['data-method' => 'post']]
        ]
    ]) ?>
</li><!-- /.dropdown navbar-profile -->