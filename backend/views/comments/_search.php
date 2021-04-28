<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-search">
    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'created_at') ?>

        <?= $form->field($model, 'files_id') ?>

        <?= $form->field($model, 'comment_by_users_id') ?>

        <?= $form->field($model, 'comment') ?>
    </font>

    <div class="form-group">
        <font face="Century Gothic" size="3">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </font>
    </div>

    <?php ActiveForm::end(); ?>

</div>
