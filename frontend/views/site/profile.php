<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Profile Page';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">
    <font face="Oswald" size="6"><?= Html::encode($this->title); 
    $file_id = $model->id; ?></font>
    
    <font face="Century Gothic" size="3">     
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="background-color: grey;">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'fullname',
                        'username',
                        'foto',
                        'email:email',
                        'roles_id',
                    ],
                ]) ?>
                <?= Html::a('Change Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
    </div>
    </font>
    <div class="Upload-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <font face="Oswald" size="4">Uploaded File</font>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th>Download</th>
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
                          </tr>
                          <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


</div>
