<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Roles */

$this->title = 'Create Roles';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create">

    <font face="Century Gothic" size="3">
     	<?= Html::encode($this->title) ?>
	    <?= $this->render('_form', [
        'model' => $model,]) ?>
    </font>

</div>
