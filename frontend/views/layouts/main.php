<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Modal;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta charset="<?= Yii::$app->charset ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">    
      <?= Html::csrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <link rel="shortcut icon" href="../../Repo.png" >
      <link rel="stylesheet" href="../assets/coba.css" >

      <?php $this->head() ?>
      <link rel="stylesheet" href="../assets/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   </head>
   <body>
    <?php $this->beginBody() ?>
      <div class="wrapper">
         <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  <img src="../../logo1.png" class="img-responsive" width="10%" height="10%">
               </div>
               <div class="menu">
                  <!--<ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Contact</a></li>
                  </ul>-->
                  <?php
                    NavBar::begin([
                        //'brandLabel' => '<img src="../../logo1.png" class="img-responsive" width="10%" height="10%">',
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar navbar-fixed-top',
                            'style' => ['position'=>'absolute', 'background-color'=>'transparent','height'=>'60px', 'font-family'=>'Century Gothic'],
                        ],
                    ]);
                    $menuItems = [['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Signup', 'url' => ['/users/create']];
                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = ['label' => 'Profile', 'url' => ['/users/view','id'=> 2]];
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
                        'options' => ['class' => 'navbar navbar-right'],
                        'items' => $menuItems,
                    ]);
                    NavBar::end();
                    ?>
               </div>
            </nav>
         </header>
        
      </div>
      <?php $this->endBody() ?>
   </body>

<div class="">
    
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <section id="footer">
        <div class="container">
            <div class="row text-left text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Files</h3>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h3>Files</h3>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
              </div>
        </div>
    </section>
</footer>

<script type="text/javascript">
 $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });
      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })
</script>
<?php $this->endPage() ?>
</html>


