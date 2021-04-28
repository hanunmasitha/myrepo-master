<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

	<font face="Century Gothic" size="3">
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model3, 'value')->radioList(array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5')); ?>

    <?= $form->field($model3, 'rating_by_users_id')->hiddenInput(['value'=>$_SESSION['id']])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	</font>

</div>
