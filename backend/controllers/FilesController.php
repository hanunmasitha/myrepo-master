<?php

namespace backend\controllers;

use Yii;
use backend\models\Files;
use backend\models\Users;
use backend\models\Comments;
use backend\models\Ratings;
use backend\models\FilesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use backend\controllers\SessionController;
/**
 * FilesController implements the CRUD actions for Files model.
 */
class FilesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Files models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Files model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //$omg = Yii::$app->request->post();
        //$model3= Comments::find()->where(['files_id'=>$id])->all();
        $model2 = new Comments();
        if ($model2->load(Yii::$app->request->post())) {
            $model2->created_at = date('Y-m-d H:i:s');
            $model2->files_id=$_SESSION['files_id'];
            $model2->comment_by_users_id = $_SESSION['id'];
            $model2->save();
            return $this->redirect(['view', 'id' => $model2 ->files_id,]);
        }
        
        $model3 = new Ratings();
        if ($model3->load(Yii::$app->request->post())) {
            //$model3->created_at = date('Y-m-d H:i:s');
            $model3->files_id=$_SESSION['files_id'];
            $model3->rating_by_users_id = $_SESSION['id'];
            $model3->save();
            return $this->redirect(['view', 'id' => $model2 ->files_id,]);
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model3'=> $model3,
            'model2'=> $model2,
        ]);
    }
    

    /**
     * Creates a new Files model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Files();
        //$session = Yii::$app->session;

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at=date('Y-m-d H:i:s');
            $model->save();
            
            $userId=$model->upload_by_users_id;
            $user = $this->findUser($userId);
            $user_name=$user->fullname;
            $judul=$model->title;
            $file = UploadedFile::getInstance($model,'filename');
            $siz=$file->getSize();
            if($siz > 1000){
                $siz = number_format($siz / 1000);
                $simpan = $siz.' Kb';
            }
            else if($siz > 1000000){
                $siz = number_format($siz / 1000);
                $simpan = $siz.' Mb';
            }
            $model->size=$simpan;
            $fileName='file_'.$judul.'_'.$user_name.'.'.$file->getExtension();
            $file->saveAs(Yii::getAlias('@filePath').'/'.$fileName);
            $model->filename=$fileName;
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Files model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->created_at=date('Y-m-d H:i:s');
            $model->save();
            
            $userId=$model->upload_by_users_id;
            $user = $this->findUser($userId);
            $user_name=$user->fullname;
            $judul=$model->title;
            $file = UploadedFile::getInstance($model,'filename');
            $fileName='file_'.$judul.'_'.$user_name.'.'.$file->getExtension();
            $file->saveAs(Yii::getAlias('@filePath').'/'.$fileName);
            $model->filename=$fileName;
            $model->save();
            
            //$model->size=$file->getSize();
            //$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Files model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->deleteOther($id);
        $this->findModel($id)->delete();
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Files model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Files::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findUser($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function deleteOther($id)
    {
        Comments::deleteAll('files_id = :id', [':id' => $id]);
        Ratings::deleteAll('files_id = :id', [':id' => $id]);
    }
    
}
