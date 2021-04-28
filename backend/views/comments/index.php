<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <font class="Oswald" size="6"><?= Html::encode($this->title) ?></font>
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
                'comment_by_users_id',
                'comment:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </font>
</div>
