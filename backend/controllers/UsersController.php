<?php

namespace backend\controllers;

use Yii;
use backend\models\Users;
use backend\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Query;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Users();
        if ($model->load(Yii::$app->request->post()) ) {
            $query = (new Query())
                ->select('COUNT(id)')
                ->from('users')
                ->where('username = :username', [':username' => $model->fullname]);
                foreach ($query->each() as $rows) {
				if($rows['COUNT(id)']>0){					
					$roleid=$model->roles_id;
					$userId=$model->username;

					$model->save();
					$image = UploadedFile::getInstance($model,'foto');
					
						if($roleid==1){
							$imgName="adm_".$userId.'.'.$image->getExtension();
							$image->saveAs(Yii::getAlias('@adminImgPath').'/'.$imgName);
						}
						else if($roleid==4){
							$imgName='usr_'.'.'.$image->getExtension();
							$image->saveAs(Yii::getAlias('@userImgPath').'/'.$imgName);
						}   
					
					//$imgName="a";
					$model->foto=$imgName;
					$model->save();
					$model->password= sha1($model->password);
					$model->save();
					return $this->redirect(['view', 'id' => $model->id]);
				}
			}
        }

       
        return $this->render('create', [
            'model' => $model,
        ]);
        
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $roleid=$model->roles_id;
            $userId=$model->username;
            $image = UploadedFile::getInstance($model,'foto');
            if($image == NULL){
                if($roleid==1){
                    $imgName="adm_download.png";
                }
                else if($roleid==2){
                    $imgName='usr_download.png';
                }
            }
            else{
                if($roleid==1){
                    $imgName="adm_".$userId.'.'.$image->getExtension();
                    $image->saveAs(Yii::getAlias('@adminImgPath').'/'.$imgName);
                }
                else if($roleid==2){
                    $imgName='usr_'.'.'.$image->getExtension();
                    $image->saveAs(Yii::getAlias('@userImgPath').'/'.$imgName);
                }   
            }
            $model->foto=$imgName;
            $model->save();
            $model->password= sha1($model->password);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
