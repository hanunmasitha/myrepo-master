<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\FileCategories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Files */
/* @var $form yii\widgets\ActiveForm */

$categories=FileCategories::find()->all();

$listData=ArrayHelper::map($categories,'id','name');
?>

<div class="files-form">

    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'upload_by_users_id')->hiddenInput(['value'=>$_SESSION['id']])->label(false) ?>
    	
    	<?= $form->field($model, 'filename')->fileInput() ?>

        <?= $form->field($model, 'file_categories_id')->dropDownList(
    		 $listData,
            ['id'=>'name']) ?>
    	
    	

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </font>

</div>
