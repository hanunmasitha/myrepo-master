<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="container container-fluid">
    <div class="row">
        <div class="col-md-4 site-login jumbotron" style="background-color: #e6f0ff">
            <font face="Century Gothic" size="6"><?= Html::encode($this->title) ?><img src="../../frontend/assets/Icons/key.png" width="100" height="100"></font>
            <br>
            <font face="Century Gothic" size="2">Please fill out the following fields to login:</font>
            <br>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
               If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
            </div>

            <div class="form-label-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-1">
                <img src="../../frontend/assets/Icons/Repo.png" width="400" height="400">
        </div>
            
    </div>
</div>

</center>
