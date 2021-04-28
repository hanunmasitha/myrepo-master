<?php

namespace backend\controllers;

use Yii;
use backend\models\Files;
use backend\models\Users;
use backend\models\Comments;
use backend\models\FileCategories;
use backend\models\FileCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FileCategoriesController implements the CRUD actions for FileCategories model.
 */
class FileCategoriesController extends Controller
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
     * Lists all FileCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileCategories model.
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
     * Creates a new FileCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileCategories();

        if ($model->load(Yii::$app->request->post())) {
            $cateoriesname=$model->name;
            $image = UploadedFile::getInstance($model,'image_asset');
            $imgName="cate_".$cateoriesname.'.'.$image->getExtension();
            $image->saveAs(Yii::getAlias('@categoriesImgPath').'/'.$imgName);
            $model->image_asset=$imgName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FileCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $cateoriesname=$model->name;
            $image = UploadedFile::getInstance($model,'image_asset');
            $imgName="cate_".$cateoriesname.'.'.$image->getExtension();
            $image->saveAs(Yii::getAlias('@categoriesImgPath').'/'.$imgName);
            $model->image_asset=$imgName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FileCategories model.
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
     * Finds the FileCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FileCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileCategories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
        protected function deleteOther($id)
    {
        Comments::deleteAll('files_id = :id', [':id' => $id]);
        Ratings::deleteAll('files_id = :id', [':id' => $id]);
        Files::deleteAll('files_id = :id', [':id' => $id]);
    }
}
