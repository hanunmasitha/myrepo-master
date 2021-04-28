<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserDownloads */

$this->title = 'Update User Downloads: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-downloads-update">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
