<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Update Users: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <br>
    <font face="Century Gothic" size="3"><?= $this->render('_form', [
        'model' => $model,
    ]) ?></font>

</div>
