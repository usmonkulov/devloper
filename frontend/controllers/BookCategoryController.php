<?php

namespace frontend\controllers;

use Yii;
use frontend\models\BookCategory;
use frontend\models\BookProduct;
use yii\data\Pagination;

class BookCategoryController extends BehaviorsController
{

    public function actionIndex(){
        $this->layout ='\mainBook';
        $this->setMeta(Yii::t('yii','New Books'));

        // BookProduct indexdagi yangi kitoblar
        $query = BookProduct::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>15, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $bookProducts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('pages','bookProducts'));
    }

    public function actionView($id){
      $this->layout ='\mainBook';
      // Shu kategory bilan chiqadi
      $bookCategory = BookCategory::findOne($id);
      if(empty($bookCategory->status))
          throw new \yii\web\HttpException(404, Yii::t('yii','Category not found'));

       // bookCategory viewdagi sarlavha qismi
      $this->setMeta($bookCategory->getName());

      // BookProductni bookCategory bo'yicha saralash
      $query = BookProduct::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1','book_category_id' => $id]);
      $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>15, 'forcePageParam' => false, 'pageSizeParam' => false]);
      $bookProducts = $query->offset($pages->offset)->limit($pages->limit)->all();

      return $this->render('view', compact('pages','bookProducts'));
    }

    public function actionSearch()
    {
        $this->layout ='\mainBook';
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta($q);
        if(!$q)
            return $this->render('search');
        $query = BookProduct::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1'])->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>15, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $bookProducts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('pages','bookProducts','q'));
    }

}
