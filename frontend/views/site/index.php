<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\db\Query;

$this->title = 'MyRepo';
 
?>
<head>
    <link rel="stylesheet" href="../assets/index.css" >
</head>
<div class="container">
<div class="site-index">
    <div class="jumbotron">
        <center>
            <font face="Century Gothic" color="black" size="7">MyRepo</font>
            <img src="../assets/Icons/Repo.png" width="10%" height="10%">
        </center>
        <!--<font face="Monotype Corsiva" size="3">Take and Give!</font>
        <hr/>-->
       
        <div class="comments-create">
            <?= $this->render('cari', ['model' => $model]) ?>
        </div>
    <?php 
    if(isset($_SESSION['cari'])){ 
        $mencari = $_SESSION['cari'];
        unset($_SESSION['cari'])?>
        <div class="col-md-10 col-md-offset-1">
            <div class="">
                <ul class="event-list">
            <?php
            $file = (new Query())
                        ->from('files')
                        //->where(['file_categories_id'=>$data['id']])
                        ->andWhere(['like', 'title','%'.$mencari.'%', false])
                        ->orderBy(['created_at'=>SORT_DESC]);
                        foreach($file->each() as $data){ ?>
                            <li>
                                <time datetime="2014-07-20" style="background-color: rgb(197, 44, 102);">

                                    <span class="month" style="bottom:0">Music</span>
                                    <span class="year">2014</span>
                                    <span class="time">ALL DAY</span>
                                </time>
                                <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                <div class="info" style="padding-left:2%;">
                                    <?= Html::a($data['title'], ['files/view', 'id'=>$data['id']], ['class'=>'title', 'style'=>'margin-top:5%;']); ?>
                                    <p class="desc"><?= $data['filename']?></p>
                                    <p class="desc">Uploaded at : <?= $data['created_at']?></p>
                                </div>
                                <div class="social">
                                    <ul>
                                        <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                        <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                        <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php }
        else{  ?>
            <center>
        <div class="container" style="padding-top:8%">
            <font face="Century Gothic" size="4"><b>OR</b></font><br>
            <?php
            if(isset($_SESSION['id'])){ ?>
                <?= Html::a('<span class="glyphicon glyphicon-upload"></span><font size="3" face="Century Gothic" >  Upload</font>', ['files/create'], ['class' => 'btn btn-success', 'style'=>'margin-top:2%']); ?>
            <?php
            }
            else{ ?>
                <?= Html::a('<span class="glyphicon glyphicon-upload"></span><font size="3" face="Century Gothic" >  Upload</font>', ['site/login'], ['class' => 'btn btn-success', 'style'=>'margin-top:2%']); ?>
            <?php } ?>
        </div>
       </center>
       
        <div class="row row-centered" style="padding-top: 10%; padding-bottom: 10%;">
            <div class="col-md-2 col-centered">
                <?= Html::a('<img src="../assets/Icons/picture.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>Pictures</font>', ['files/index', 'id' => 1], ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-2 col-centered">
                <?= Html::a('<img src="../assets/Icons/video.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>Video</font>', ['files/index', 'id' => 2], ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-2 col-centered">
                <?= Html::a('<img src="../assets/Icons/music.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>Music</font>', ['files/index', 'id' => 3], ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-2 col-centered">
                <?= Html::a('<img src="../assets/Icons/docs.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>Document</font>', ['files/index', 'id' => 4], ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-2 col-centered">
                <?= Html::a('<img src="../assets/Icons/apps.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>Apps</font>', ['files/index', 'id' => 5], ['class' => 'btn btn-default']); ?>
            </div>
            <div class="col-md-2 col-centered">
                <a href="" class="btn btn-lg btn-default">
                    <img src="../assets/Icons/me.png" class="img-responsive" size="3 pt">
                    <font size="3" face="Century Gothic" ><br/>All Files</font>
                </a>
            </div>
        </div>


                    
                
                <div class="col-md-10 col-md-offset-1">
                    <div class="">
                        <ul class="event-list">
                           <?php
                        $file = (new Query())
                        ->from('files')
                        //->where(['file_categories_id'=>$data['id']])
                        ->limit(6)
                        ->orderBy(['created_at'=>SORT_DESC]);
                        foreach($file->each() as $data){ ?>
                            <li>
                                <time datetime="2014-07-20" style="background-color: rgb(197, 44, 102);">

                                    <span class="month" style="bottom:0">Music</span>
                                    <span class="year">2014</span>
                                    <span class="time">ALL DAY</span>
                                </time>
                                <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                <div class="info" style="padding-left:2%;">
                                    <?= Html::a($data['title'], ['files/view', 'id'=>$data['id']], ['class'=>'title', 'style'=>'margin-top:5%;']); ?>
                                    <p class="desc"><?= $data['filename']?></p>
                                    <p class="desc">Uploaded at : <?= $data['created_at']?></p>
                                </div>
                                <div class="social">
                                    <ul>
                                        <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                        <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                        <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </div>

        <?php } ?>
        </div>
        
	</div>
</div>
 

