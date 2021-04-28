<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="../../Repo.png" >
    <?php $this->head() ?>
    <style type="text/css">
        body {
            background: #ffffff;
        }
        .content {
            margin-bottom: 30px;
            width: 100%;
            background: #fbfbfb;
            border-radius: 5px;
            padding: 10px;
        }
        .content:hover {
            background: #f5f5f5;
        }
        .content-title a {
            font-size: 18px;
            font-color: #333;
            width: 100%;
            border-bottom:1px dotted #ccc;
        }
        .content-detail {
            font-size: 10px;
            width: 100%;
            color: blue;
            margin-bottom: 10px;
        }
        .content-fill {
            width: 100%;
            font-size: 12px;
        }
        .my-navbar{
            background-color: #0099e6;
            font-family: "Century Gothic";
            font-size: 15px;
            color: #ffffff;
        }
        .my-navbar .navbar-brand {
            color: white;
            font-family: Platonica;
        }
        .my-navbar .navbar-brand:hover,
        .my-navbar .navbar-brand:focus {
            color: black;
        }
        .my-navbar .navbar-nav > li > a {
            color: white;
        }
        .my-navbar .navbar-nav > li > a:hover,
        .my-navbar .navbar-nav > li > a:focus {
            color: #002db3;
            background:#ccd9ff;
        }
        .my-navbar .navbar-nav > .active > a, 
        .my-navbar .navbar-nav > .active > a:hover, 
        .my-navbar .navbar-nav > .active > a:focus {
            color: black;
            background:#ccd9ff;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'MyRepo (Admin) ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'], ['class' => 'glyphicon glyphicon-home']],
        
    ];
    if(isset($_SESSION['id'])){
        $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'], ['class' => 'glyphicon glyphicon-home']],
        [
            'label' => 'User',
            'items' => [
                 ['label' => 'List User', 'url' => ['/users/index']],
                 ['label' => 'User Roles', 'url' => ['/roles/index']],
        ]],
        [
            'label' => 'File',
            'items' => [
                 ['label' => 'List File', 'url' => ['/files/index']],
                 ['label' => 'File Categories', 'url' => ['/file-categories/index']],
        ]],
        [
            'label' => 'Other',
            'items' => [
                 ['label' => 'Download', 'url' => ['/user-downloads/index']],
                 ['label' => 'Comments', 'url' => ['/comments/index']],
                 ['label' => 'Rating', 'url' => ['/ratings/index']],
        ]], 
    ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <?php
                    
            Modal::begin([
                    'header' => '<h4>Destination</h4>',
                    'id'     => 'model',
                    'size'   => 'model-lg',
            ]);
            
            echo "<div id='modelContent'></div>";
            
            Modal::end();
        ?>
            
</div>

<footer class="footer">
    <div class="container">
        <!--<p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>-->
        <center><font face="Century Gothic">&copy MyRepo ~ WebProject 2018</font></center> 
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
