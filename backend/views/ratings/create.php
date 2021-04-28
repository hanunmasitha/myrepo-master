<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ratings */

$this->title = 'Create Ratings';
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ratings-create">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
