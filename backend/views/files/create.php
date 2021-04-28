<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Files */

$this->title = 'Create Files';
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-create">

    <font face="Oswald" size="3"><?= Html::encode($this->title) ?></font>
    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
