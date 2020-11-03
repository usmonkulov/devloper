<?php

namespace frontend\controllers;

use Yii;
use frontend\models\BookProduct;
use yii\data\Pagination;

class BookProductController extends BehaviorsController
{

    public function actionView($id){
        $this->layout ='\mainBook';
        // Book view bilan chiqadi
        $bookProduct = BookProduct::findOne($id);
        if(empty($bookProduct->status))
            throw new \yii\web\HttpException(404, Yii::t('yii','Bunday kitob mavjud emas'));
        $this->setMeta($bookProduct->Name);

        // BookProduct viewdagi yangi kitoblar
        $query = BookProduct::find()->orderBy(['updated_at' => SORT_DESC])->where(['status'=> '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $bookProducts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('bookProduct','pages','bookProducts'));
    }

}
