<?php

use anteo\blankon\LoginAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

LoginAsset::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

$this->title = 'SIGN IN | BLANKON - Fullpack Admin Theme';
?>

<div id="sign-wrapper" style="min-height: 885px;">
    
    <!-- Brand -->
    <div class="brand">
        <?= Html::img('@web/images/logo_login.png', ['alt' => 'brand logo', 'class' => 'logo']) ?> 
    </div>
    <!--/ Brand -->

    <!-- Login form -->
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'sign-in form-horizontal shadow rounded no-overflow'],
        'method' => 'post',
        'fieldConfig' => [
            'options' => [
                'class' => 'form-group input-group-lg rounded no-overflow'
            ]
        ]
    ]); ?>
    
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Member Area</span>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-header -->
        <div class="sign-body">
            <?= $form->field($model, 'username')->textInput(['class' => 'form-control input-sm', 'placeholder' => 'Username or email'])->label(false) ?>
            
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control input-sm', 'placeholder' => 'Password'])->label(false) ?>
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <?= $form->field($model, 'rememberMe', [
                'options' => ['class' => 'form-group'],
                'template' => "<div class=\"ckbox ckbox-theme\">{input}\n{label}\n{hint}\n{error}</div>"
            ])->checkbox([], false) ?>
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <?php  ActiveForm::end(); ?>
    <!--/ Login form -->

</div><!-- /#sign-wrapper -->