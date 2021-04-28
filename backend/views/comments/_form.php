<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <font face="Century">
    	<?= $form->field($model, 'files_id')->textInput() ?>

	    <?= $form->field($model, 'comment_by_users_id')->hiddenInput(['value'=>$_SESSION['id']])->label(false) ?>
	    
		<?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

	    <div class="form-group">
	        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	    </div>
	    
	</font>

    <?php ActiveForm::end(); ?>

</div>
