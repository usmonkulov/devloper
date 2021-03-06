<?php

namespace backend\controllers;

use Yii;
use backend\models\BookCategory;
use backend\models\search\BookCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookCategoryController implements the CRUD actions for BookCategory model.
 */
class BookCategoryController extends Controller
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
     * Lists all BookCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookCategory model.
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
     * Creates a new BookCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new BookCategory();

        if ($model->load(Yii::$app->request->post())):
            
            $model->name = json_encode($model->translate_name,JSON_UNESCAPED_UNICODE);
            
            if($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            endif;
        endif;

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BookCategory model.
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

            if ($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('update', [
                    'model' => $model,
                ]);
            endif;

        else:

            $model->translate_name = json_decode($model->name,true);

            return $this->render('update', [
                'model' => $model,
            ]);
        endif;
    }

    /**
     * Deletes an existing BookCategory model.
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
     * Finds the BookCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivate($id){
        $activ = BookCategory::findOne($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect('index');
    }
}
