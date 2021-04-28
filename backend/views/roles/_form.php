<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roles-form">
	<font face="Century Gothic" size="3">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	    <div class="form-group">
	        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</font>

</div>
