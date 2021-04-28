<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <font face="Century Gothic" size="3"><?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname',
            'username',
            'email:email',
            'roles_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?></font>
    <font face="Century Gothic" size="4">
       
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
           
    </font>
</div>
