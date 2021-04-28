<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Profile Update';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    <font face="Oswald" size="5" color="maroon"><?= Html::encode($this->title) ?></font>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
