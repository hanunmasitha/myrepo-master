<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FilesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="files-search">
    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'title') ?>

        <?= $form->field($model, 'description') ?>

        <?= $form->field($model, 'size') ?>

        <?= $form->field($model, 'created_at') ?>

        <?php // echo $form->field($model, 'file_categories_id') ?>

        <?php // echo $form->field($model, 'upload_by_users_id') ?>

        <?php // echo $form->field($model, 'filename') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </font>

</div>
