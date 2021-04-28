<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FileCategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'File Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-categories-index">

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
            'image_asset',

            ['class' => 'yii\grid\ActionColumn'],
        ],]); ?>
        <?= Html::a('Create File Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </font>
</div>
