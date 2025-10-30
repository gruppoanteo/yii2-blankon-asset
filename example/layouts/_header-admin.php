<?php

use hal\fontawesome\FA;
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

<header id="header">

    <!-- Start header left -->
    <div class="header-left">
        <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
        <div class="navbar-minimize-mobile left">
            <i class="fa fa-bars"></i>
        </div>
        <!--/ End offcanvas left -->

        <!-- Start navbar header -->
        <div class="navbar-header">

            <!-- Start brand -->
            <?= Html::a(Html::img('@web/images/logo.png', ['alt' => 'brand logo', 'class' => 'logo']), Yii::$app->homeUrl, ['class' => 'navbar-brand']) ?>
            <!--/ End brand -->

        </div><!-- /.navbar-header -->
        <!--/ End navbar header -->

        <!-- Start offcanvas right: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
        <div class="navbar-minimize-mobile right">
            <i class="fa fa-cog"></i>
        </div>
        <!--/ End offcanvas right -->

        <div class="clearfix"></div>
    </div><!-- /.header-left -->
    <!--/ End header left -->

    <!-- Start header right -->
    <div class="header-right">
        
        <!-- Start navbar toolbar -->
        <div class="navbar navbar-toolbar navbar-success">

            <!-- Start left navigation -->
            <?= Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    [
                        'label' => FA::icon(FA::_BARS),
                        'url' => 'javascript:void(0);',
                        'linkOptions' => ['title' => 'Minimize sidebar'],
                        'options' => ['class' => 'navbar-minimize']
                    ],
                    // <!-- Start form search -->
                    $this->render('header-admin/_search')
                    //<!--/ End form search -->,
                ]
            ]) ?>
            <!--/ End left navigation -->

            <!-- Start right navigation -->
            <?= Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    $this->render('header-admin/_messages'), 
                    $this->render('header-admin/_notifications'), 
                    $this->render('header-admin/_profile'),
                    [
                        'label' => FA::icon(FA::_COG)->spin(),
                        'url' => 'javascript:void(0);',
                        'options' => ['class' => 'navbar-setting pull-right']
                    ]
                ]
            ]) ?>
            <!--/ End right navigation -->
            
        </div><!-- /.navbar-toolbar -->
        <!--/ End navbar toolbar -->
        
    </div><!-- /.header-right -->
    <!--/ End header left -->
    
</header> <!-- /#header -->