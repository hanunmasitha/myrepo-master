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
<div class="users-form">
    <?php 
        if(isset($_SESSION['gagal'])){
        unset($_SESSION['gagal']);?>
        <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
              <strong>SignUP GAGAL!</strong> Username sudah dipakai.
        </div>
    <?php }?>
    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'foto')->fileInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'roles_id')->dropDownList(
    		 $listData,
            ['id'=>'name']) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </font>

</div>
