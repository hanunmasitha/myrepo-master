<?php
    use yii\helpers\Html;
    use yii\db\Query;
    
    $this->title = 'MyRepo';
    $id = $_GET['id'];
?>
<header>
    <link rel="stylesheet" href="../assets/index.css" >
    <style type="text/css">
    
    </style>
</header>
<div class="row" style="padding:5% 0;">
            <div class="col-lg-3">
                <ul class="list-group">
                  <li class="list-group-item"><?= Html::a('Photos', ['files', 'id' => 1], ['style' => 'text-decoration:none']); ?></li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Morbi leo risus</li>
                  <li class="list-group-item"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Porta ac consectetur ac</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>      

                  </li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="">
                    <ul class="event-list">
                        <?php                
                            $query = (new Query())
                                            ->from('files')
                                            ->where(['file_categories_id'=>$id]);
                            foreach($query->each() as $data){ ?>
                        <li>
                            <time datetime="2014-07-20" style="background-color: rgb(197, 44, 102);">

                                <span class="month" style="bottom:0">Music</span>
                                <span class="year">2014</span>
                                <span class="time">ALL DAY</span>
                            </time>
                            <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                            <div class="info" style="padding-left:2%;">
                                <?= Html::a($data['title'], ['files/view', 'id' => $data['id']], ['class'=>'title', 'style'=>'margin-top:5%;']); ?>
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
        </div>