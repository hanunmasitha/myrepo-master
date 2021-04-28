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
            <font face="Century Gothic" size="6"><?= Html::encode($this->title) ?><img src="../../frontend/assets/Icons/key.png" width="50" height="50"></font>
            <br>
            <font face="Century Gothic" size="2">Please fill out the following fields to login:</font>
            <br>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-label-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end();

            ?>
            
        </div>
        <div class="col-md-1">
                <img src="../../frontend/assets/login/images/save.jpg" class="responsive" width="800" height="400">
        </div>
            
    </div>
</div>

</center>
