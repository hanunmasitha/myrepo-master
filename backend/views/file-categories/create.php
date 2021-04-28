<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FileCategories */

$this->title = 'Create File Categories';
$this->params['breadcrumbs'][] = ['label' => 'File Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-categories-create">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
