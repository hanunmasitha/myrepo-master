<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */

$this->title = 'Update Roles: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-update">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3"><?= $this->render('_form', [
        'model' => $model,
    ]) ?></font>

</div>
