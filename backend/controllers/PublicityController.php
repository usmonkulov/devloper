<?php

namespace backend\controllers;

use Yii;
use backend\models\Publicity;
use backend\models\search\PublicitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PublicityController implements the CRUD actions for Publicity model.
 */
class PublicityController extends Controller
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
     * Lists all Publicity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publicity model.
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
     * Creates a new Publicity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publicity();

         if ($model->load(Yii::$app->request->post())) {

                $model->title = json_encode($model->translate_title,JSON_UNESCAPED_UNICODE);
                       
                if($file = UploadedFile::getInstance($model,'image')){
                    $model->image = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
                }

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publicity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())):

            $model->title = json_encode($model->translate_title,JSON_UNESCAPED_UNICODE);

            if($file = UploadedFile::getInstance($model,'image')){
                $model->image = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
                if(file_exists($model->getOldAttribute('image')))
                    unlink($model->getOldAttribute('image'));
            }else{
                $model->image = $model->getOldAttribute('image');
            }

            if ($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('update', [
                    'model' => $model,
                ]);
            endif;

        else:

            $model->translate_title = json_decode($model->title,true);

            return $this->render('update', [
                'model' => $model,
            ]);
        endif;
    }

    /**
     * Deletes an existing Publicity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionDelete($id)
    {
        $model = $this->findModel($id);
                      
        if(file_exists($model->image)) {
            unlink($model->image);
        } 

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publicity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publicity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publicity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivate($id){
        $activ = Publicity::findOne($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect('index');
    }
}
