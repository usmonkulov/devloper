<?php

namespace backend\controllers;

use Yii;
use backend\models\BookProduct;
use backend\models\search\BookProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookProductController implements the CRUD actions for BookProduct model.
 */
class BookProductController extends Controller
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
     * Lists all BookProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookProduct model.
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
     * Creates a new BookProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new BookProduct();

         if ($model->load(Yii::$app->request->post())) {

                $model->name = json_encode($model->translate_name,JSON_UNESCAPED_UNICODE);
                $model->keywords = json_encode($model->translate_keywords,JSON_UNESCAPED_UNICODE);
                $model->description = json_encode($model->translate_description,JSON_UNESCAPED_UNICODE);
                $model->content = json_encode($model->translate_content,JSON_UNESCAPED_UNICODE);
                       
                if($file = UploadedFile::getInstance($model,'img')){
                    $model->img = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
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
     * Updates an existing BookProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())):

            $model->name = json_encode($model->translate_name,JSON_UNESCAPED_UNICODE);
            $model->keywords = json_encode($model->translate_keywords,JSON_UNESCAPED_UNICODE);
            $model->description = json_encode($model->translate_description,JSON_UNESCAPED_UNICODE);
            $model->content = json_encode($model->translate_content,JSON_UNESCAPED_UNICODE);

            if($file = UploadedFile::getInstance($model,'img')){
                $model->img = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
                if(file_exists($model->getOldAttribute('img')))
                    unlink($model->getOldAttribute('img'));
            }else{
                $model->img = $model->getOldAttribute('img');
            }

            if ($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('update', [
                    'model' => $model,
                ]);
            endif;

        else:

            $model->translate_name = json_decode($model->name,true);
            $model->translate_keywords = json_decode($model->keywords,true);
            $model->translate_description = json_decode($model->description,true);
            $model->translate_content = json_decode($model->content,true);

            return $this->render('update', [
                'model' => $model,
            ]);
        endif;
    }


    /**
     * Deletes an existing BookProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
                      

        if(file_exists($model->img)) {
            unlink($model->img);
        } 

        $model->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the BookProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookProduct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivate($id){
        $activ = BookProduct::findOne($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect('index');
    }
}
