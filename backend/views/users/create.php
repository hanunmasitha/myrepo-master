<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Create Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
