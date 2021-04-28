<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Roles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */
/* @var $form yii\widgets\ActiveForm */

$role=Roles::find()->all();

$listData=ArrayHelper::map($role,'id','name');
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
<div class="users-form">

    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin(['id'=>'form-signup']); ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'foto')->fileInput() ?>

        <?= $form->field($model, 'roles_id')->dropDownList($listData,['id'=>'name']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'login100-form-btn']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </font>

</div>
