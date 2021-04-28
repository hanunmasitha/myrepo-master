<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Files */

$this->title = 'Create Files';
//$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="files-create">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
