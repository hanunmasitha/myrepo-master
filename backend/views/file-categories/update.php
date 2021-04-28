<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FileCategories */

$this->title = 'Update File Categories: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'File Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-categories-update">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
