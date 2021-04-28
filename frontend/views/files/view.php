
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Comments;
use frontend\models\Ratings;
use frontend\models\UserDownloads;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model backend\models\Files */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$id = $_GET['id'];
$_SESSION['files_id']= $id;
    
    $query = (new Query())
                    ->from('files')
                    ->where(['id'=>$id]);
    foreach($query->each() as $files){
    	$files_user = $files['upload_by_users_id'];
    }
    $query1 = (new Query())
                    ->from('users')
                    ->where(['id'=>$files['upload_by_users_id']]);
            foreach($query1->each() as $users){
            } 
    $this->title = 'MyRepo';
?>
<header>
    
    <link rel="stylesheet" href="../assets/detail.css" >
    <link rel="stylesheet" href="../assets/index.css" >
    <style type="text/css">
        
    </style>
</header>
<div class="files-body">
        <div class="file-detail">
               <div class="container">
                          <div class="col-sm-2">
                             <img src="../assets/Icons/music.png" width="180px;">
                         </div>
                         <div class="col-sm-4 col-sm-offset-1" style="margin-top:4.5%">
                             <font face="Century Gothic" color="white" size="6"><?= $files['title'] ?></font><br/>
                             <font face="Century Gothic" color="white" size="2"><?= $files['filename'] ?></font><br/>
                             <font face="Century Gothic" color="white" size="2">Uploaded by : <?= $users['fullname'] ?></font><br/>
                             <font face="Century Gothic" color="white" size="2">Uploaded at : <?= $files['created_at'] ?></font><br/>
                             <font face="Century Gothic" color="white" size="2">Size : <?= $files['size'] ?></font><br/>
                             <?php
                             if(isset($_SESSION['id'])){
                             	if($_SESSION['id'] == $files_user){ ?>
                             	<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
						        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
						            'class' => 'btn btn-danger',
						            'data' => [
						                'confirm' => 'Are you sure you want to delete this item?',
						                'method' => 'post',
						            ],
						        ]) ?>
                            <?php }
                             	
                         } ?>
                                  
                         </div>
                          <div class="col-sm-2">
                            <div class="rating-block" style="color:white; margin-top:40%;">
                                <h4>Average user rating</h4>
                                <?php
                									$query = (new Query())
                										->select('AVG(value)')
                										->from('ratings')
                										->where('files_id = :files_id', [':files_id' => $model->id]);
                									foreach ($query->each() as $rows) { 
                										if(!isset($rows['AVG(value)'])){
                										?>
                										<h2 class="bold padding-bottom-7" style="margin-top:-5%;"]; ?><small style="color:white;">Belum ada rating</small></h2> 
                									<?php } else { ?>
                										<h2 class="bold padding-bottom-7" style="margin-top:-5%;"><?php echo $rows['AVG(value)']; ?><small style="color:white;">/ 5</small></h2> 
                										
                									<?php }} ?>                      
                              <div class="download-create">
                              <?= Html::a('Download', ['download', 'id'=>$model->id], ['class'=>'btn btn-primary', 'style'=>'margin-bottom : 20%;']) 
                                  ?>
                              </div>
                            </div>
                        </div>	
                        <div class="col-sm-2">
                        	<div class="rating-block" style="color:white; margin-top:40%;">
                        	<?php
        										if(isset($_SESSION['id'])){
        										?>
        											<div class="rating-create">
        											    <?= $this->render('rating', [
        											        'model3' => $model3,
        											    ]) ?>
        											</div>
        										<?php } ?>
									       </div>
                      </div>
              </div>
        </div>
        <div class="comment">
            <div class="container">
        		<h3>Comments : </h3>
        	</div>
        </div>
                <?php
                    $query = (new Query())
                                ->select('*')
                                ->from('comments')
                                ->where('files_id = :files_id', [':files_id' => $id]);
                        foreach ($query->each() as $rows) { ?>
        <div class="comment">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        
                    </div><!-- /col-sm-12 -->
                </div><!-- /row -->
                        	<div class="row">
                            <?php
                            $query1 = (new Query())
                                ->select('*')
                                ->from('users')
                                ->where('id = :id', [':id' => $rows['comment_by_users_id']]);
                            foreach ($query1->each() as $rows1) { ?>
                            	<div class="col-sm-1">
				                    <div class="thumbnail">
				                 	<?php
                                	if($rows1['roles_id']==1){ ?>
                           				<img src="<?php echo Yii::getAlias('@adminImgUrl')."/".$rows1['foto']; ?>" class="rounded-circle">
                        			<?php }
                                	else if($rows1['roles_id']==4){
                        			?>
                              			<img src="<?php echo Yii::getAlias('@userImgUrl')."/".$rows1['foto']; ?>" class="rounded-circle">
                                	<?php }?>
                                	</div><!-- /thumbnail -->
				                </div>
                                <div class="col-sm-7">
			                        <div class="panel panel-warning">
			                            <div class="panel-heading">
			                                <strong><?php echo $rows1['fullname'] ?></strong> <span class="text-muted"><?= $rows['created_at']?></span>
			                                </div>
			                            <div class="panel-body">
			                                <font face="Century Gothic" color="black" size="2"><?php echo $rows['comment']?></font><br/>
			                            </div><!-- /panel-body -->
			                        </div><!-- /panel panel-default -->
			                    </div><!-- /col-sm-5 -->
			                </div><!-- /row -->
			                
			            </div><!-- /container -->
			        </div>
                    <?php }?>
                <?php
                }
                ?>
                
                    
                    
                            
        <div class="container" >
            
								
                  <?php 
										if(isset($_SESSION['id'])){
										?>
											<div class="comments-create">
											    <?= $this->render('coba', ['model2' => $model2]) ?>
											</div>
									<?php } ?>
									
							
        </div>
</div>

	

	