<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-index">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <font face="Century Gothic" size="3">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </font>
     <font face="Century Gothic" size="4">
        <?= Html::a('Create Roles', ['create'], ['class' => 'btn btn-success']) ?>
    </font>

</div>
