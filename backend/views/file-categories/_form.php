<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FileCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-categories-form">

	<font face="Century Gothic" size="3">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'image_asset')->fileInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</font>

</div>
