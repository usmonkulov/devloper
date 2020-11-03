<?php

namespace frontend\controllers;

use Yii;
use frontend\models\BookAuthor;
use frontend\models\BookProduct;
use yii\data\Pagination;

class BookAuthorController extends BehaviorsController
{
    public function actionView($id){
      $this->layout ='\mainBook';
      // Shu Author bilan chiqadi
      $bookAuthor = BookAuthor::findOne($id);
      if(empty($bookAuthor->status))
          throw new \yii\web\HttpException(404, Yii::t('yii','Author not found'));
       // bookAuthor viewdagi sarlavha qismi
      $this->setMeta($bookAuthor->getFnf());

      // BookProductni bookAuthor bo'yicha saralash
      $query = BookProduct::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1','book_author_id' => $id]);
      $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>15, 'forcePageParam' => false, 'pageSizeParam' => false]);
      $bookProducts = $query->offset($pages->offset)->limit($pages->limit)->all();

      return $this->render('view', compact('pages','bookProducts'));
    }
}
