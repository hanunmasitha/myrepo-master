<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ratings */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ratings-view">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
        
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'value',
                'files_id',
                'rating_by_users_id',
            ],
        ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    
    </font>

</div>
