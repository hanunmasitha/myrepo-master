<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-index">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <font face="Century Gothic" size="3">
             
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'description:ntext',
                'size',
                'created_at',
                //'file_categories_id',
                //'upload_by_users_id',
                //'filename:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?= Html::a('Create Files', ['create'], ['class' => 'btn btn-success']) ?>
    </font>
</div>
