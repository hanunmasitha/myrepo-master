<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Roles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign Up';
//$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V16</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../assets/login/images/save.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <font face="Century Gothic" size="3" style="color: white"> 
                    <div class="users-form">
                        <?php $form = ActiveForm::begin(); ?>
                        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                         <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                         <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'foto')->fileInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'login100-form-btn']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
            </div>
        </div>
    
        <div id="dropDownSelect1"></div>
        </font>
    </div>
    
<!--===============================================================================================-->
    <script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="../assets/login/js/main.js"></script>

</body>
</html>
