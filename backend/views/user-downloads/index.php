<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserDownloadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Downloads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-downloads-index">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <font face="Century Gothic" size="3">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'created_at',
                'files_id',
                'download_by_users_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?= Html::a('Create User Downloads', ['create'], ['class' => 'btn btn-success']) ?>
  
    </font>
</div>
