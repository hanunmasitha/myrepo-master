<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RatingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ratings-search">

    <font face="Century Gothic" size="3">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'value') ?>

        <?= $form->field($model, 'files_id') ?>

        <?= $form->field($model, 'rating_by_users_id') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </font>

</div>
