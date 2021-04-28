<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Files */

$this->title = 'Update Files: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="files-update">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>
</div>
