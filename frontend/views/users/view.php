<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */

$this->title = 'Profile Page';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-view" >

    <div class="container">
    <font face="Oswald" size="6"><?= Html::encode($this->title); 
    //$id = $model->id; ?>
        <hr>
    </font>
    
        <div class="row">
            <div class="col-lg-5">
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-5">
                    <?php
                    $query = (new Query())
                        ->select('*')
                        ->from('users')
                        ->where('id = :id', [':id' => $model->id]);
                    foreach ($query->each() as $rows) { ?>
                    <img src="<?php echo Yii::getAlias('@userImgUrl')."/".$rows['foto']; ?>" class="img-circle" width="150px" height="150px">
                    <?php } ?>
                    <?php
                    $query = (new Query())
                        ->select('*')
                        ->from('users')
                        ->where('id = :id', [':id' => $model->id]);
                    foreach ($query->each() as $rows) { ?>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <div class="col-md-6">
                                        <tr>
                                        <th>Fullname</th>
                                            <td><?php echo $rows['fullname']?></td>
                                            <br>
                                        </tr>
                                        <tr>
                                        <th>Username</th>
                                            <td><?php echo $rows['username']?></td>
                                            <br>
                                        </tr>
                                        <tr>
                                        <th>Email</th>
                                            <td><?php echo $rows['email']?></td>
                                            <br>
                                        </tr>
                                    </div>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-2"><?= Html::a('Change Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="Upload-section">
                    <font face="Oswald" size="5">Uploaded File</font>
                    <font face="Century Gothic" size="3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>File Size</th>
                                <th>Download</th>
                                <th>Upload Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $query = (new Query())
                                            ->select('*')
                                            ->from('files')
                                            ->where('upload_by_users_id = :file_id', [':file_id' => $model->id]);
                                    foreach ($query->each() as $rows) { ?>
                                            <td> <?php echo $rows['title']?> </td>
                                            <td> <?php echo $rows['size']?> byte</td>
                                            <?php 
                                                $query2 = (new Query())
                                                    ->select('COUNT(id)')
                                                    ->from('user_downloads')
                                                    ->where('files_id = :file_id', [':file_id' => $rows['id']]);
                                                foreach ($query2->each() as $rows2) { ?>
                                                    <td> <?php echo $rows2['COUNT(id)']?> </td>
                                                <?php } ?>  
                                            <td> <?php echo $rows['created_at']?></td>
                                            <td><?= Html::a('<span class="glyphicon glyphicon-upload"></span><font size="3" face="Century Gothic" >  Show</font>', ['files/view','id'=> $rows['id']], ['class' => 'btn btn-success', 'style'=>'margin-top:2%']); ?></td>
                              </tr>
                              <?php }?>
                        </tbody>
                    </table>

                </font>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <font face="Century Gothic" size="3">
            
            </font>
            <div class="row">
                <br/>
            </div>
            <br/>
        </div>
     
    </font>
    


</div>
