<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ratings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ratings-form">

	<font face="Century Gothic" size="3">
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'files_id')->textInput() ?>

	    <?= $form->field($model, 'rating_by_users_id')->textInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
	</font>
</div>
