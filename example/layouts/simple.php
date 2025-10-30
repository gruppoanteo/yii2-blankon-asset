<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <!--/ END META SECTION -->

        <!-- START @FONT STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
        <!--/ END FONT STYLES -->

        <?php $this->head();  ?>
        
    </head>
    <!--/ END HEAD -->

     <!-- START @BODY -->
    <body class="">
    <?php $this->beginBody() ?>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @PAGE CONTENT -->
        <?php echo $content ; ?>
        <!--/ END PAGE CONTENT -->
    <?php $this->endBody() ?>

    </body>
    <!--/ END BODY -->

</html>
<?php $this->endPage() ?>
