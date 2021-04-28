<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserDownloads */

$this->title = 'Create User Downloads';
$this->params['breadcrumbs'][] = ['label' => 'User Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-downloads-create">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</font>

</div>
