
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use backend\models\Comments;
use backend\models\Ratings;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model backend\models\Files */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-view">
    <?php
        $_SESSION['files_id'] = $model->id;
    ?>

    <font face="Oswald" size="6"><?= Html::encode($this->title) ?></font>

    <font face="Century Gothic" size="3">
        
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            'size',
            'created_at',
            'file_categories_id',
            'upload_by_users_id',
            'filename:ntext',
        ],
    ]) ?>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
     </font>
</div>
<br>
<div class="comment-section">
    <div class="container">
        <font face="Oswald" size="6">Rating</font>
        <font face="Century Gothic" size="3">
            <?php
            $query = (new Query())
                ->select('AVG(value)')
                ->from('ratings')
                ->where('files_id = :files_id', [':files_id' => $model->id]);
            foreach ($query->each() as $rows) { 
                echo $rows['AVG(value)'];
            } ?>
        </font>
    </div>
</div>
<div class="rating-create">
    <font face="Century Gothic" size="3">
    <?= $this->render('rating', [
        'model3' => $model3,
    ]) ?>
    </font>

<div class="comment-section">
    <div class="container">
        <!--<font face="Century Gothic" size="6">Comments</font>-->
        <table class="table table-borderless">
            <tbody>
                <tr>
                <?php
                    $query = (new Query())
                                ->select('*')
                                ->from('comments')
                                ->where('files_id = :files_id', [':files_id' => $model->id]);
                        foreach ($query->each() as $rows) {
                            $query1 = (new Query())
                                ->select('*')
                                ->from('users')
                                ->where('id = :id', [':id' => $rows['comment_by_users_id']]);
                            foreach ($query1->each() as $rows1) {
                                if($rows1['roles_id']==1){ ?>
                                <td><img src="<?php echo Yii::getAlias('@adminImgUrl')."/".$rows1['foto']; ?>" class="rounded-circle">  
                        <?php   }
                                else if($rows1['roles_id']==2){
                        ?>
                                <td><img src="<?php echo Yii::getAlias('@userImgUrl')."/".$rows1['foto']; ?>" class="rounded-circle">
                                <?php }?>
                                <br><?php echo $rows1['fullname'];?></td><?php }?>
                            
                    <td><?php echo $rows['comment']?></td>
                  </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="comments-create">
    <?= $this->render('coba', [
        'model2' => $model2,
    ]) ?>
</div>
