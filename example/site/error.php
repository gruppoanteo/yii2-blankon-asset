<?php

use hal\blankon\ErrorAsset;
use yii\helpers\Html;

ErrorAsset::register($this);

$this->context->layout = 'simple';
$this->title = $name;
?>

<div class="error-wrapper">
    <h1>Error!</h1>
    <h2><?= nl2br(Html::encode($this->title)) ?></h2>
    <h5><?= nl2br(Html::encode($message)) ?></h5>
    <h5>The above error occurred while the Web server was processing your request.</h5>
    <h5>Please contact us if you think this is a server error. Thank you.</h5>
</div>