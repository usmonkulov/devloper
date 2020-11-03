<?php

namespace backend\controllers;

use Yii;
use backend\models\BookAuthor;
use backend\models\search\BookAuthorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookAuthorController implements the CRUD actions for BookAuthor model.
 */
class BookAuthorController extends Controller
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
     * Lists all BookAuthor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookAuthorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookAuthor model.
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
     * Creates a new BookAuthor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new BookAuthor();

        if ($model->load(Yii::$app->request->post())):
            
            $model->fnf = json_encode($model->translate_fnf,JSON_UNESCAPED_UNICODE);
            
            if($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            endif;
        endif;

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing BookAuthor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())):

            $model->fnf = json_encode($model->translate_fnf,JSON_UNESCAPED_UNICODE);

            if ($model->save()):
                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('update', [
                    'model' => $model,
                ]);
            endif;

        else:

            $model->translate_fnf = json_decode($model->fnf,true);

            return $this->render('update', [
                'model' => $model,
            ]);
        endif;
    }

    /**
     * Deletes an existing BookAuthor model.
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
     * Finds the BookAuthor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookAuthor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookAuthor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

     public function actionActivate($id){
        $activ = BookAuthor::findOne($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect('index');
    }
}
