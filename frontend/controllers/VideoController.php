<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Video;
use yii\web\Controller;
use yii\data\Pagination;

class VideoController extends BehaviorsController
{

    public function actionIndex(){

        $this->setMeta(Yii::t('yii','Video'));

        // Video index dagi birinchisi bittalik 
        $videos1 = Video::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->orderBy(['id' => SORT_DESC])->all();

        // Video index dagi ikkinchisi ikkitalik
        $videos2 = Video::find()->where(['status' => '1'])->limit(2)->orderBy(['id' => SORT_DESC])->offset(1)->orderBy(['id' => SORT_DESC])->all();

        // Video index dagi uchinchisi to'rttalik
        $videos4 = Video::find()->where(['status' => '1'])->limit(4)->orderBy(['id' => SORT_DESC])->offset(3)->orderBy(['id' => SORT_DESC])->all();

        // Video index o'ngdagi to'rtta eng ko'p ko'rilganlar
        $videoview = Video::find()->limit(4)->orderBy(['view' => SORT_DESC])->all();

        return $this->render('index', compact('videos1','videos2','videos4','videoview'));
    }

    public function actionView($id)
    {
        // Video view dagi birinchisi bittalik 
        $videos1 = Video::findOne($id);
        if(empty($videos1->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'No such video available'));
        
        $this->setMeta($videos1->getTitle());

        // Video view dagi ikkinchisi ikkitalik
         $videos2 = Video::find()->where(['status' => '1'])->limit(2)->orderBy(['id' => SORT_DESC])->offset(1)->orderBy(['id' => SORT_DESC])->all();

         // Video view dagi uchinchisi to'rttalik
         $videos4 = Video::find()->where(['status' => '1'])->limit(4)->orderBy(['id' => SORT_DESC])->offset(3)->orderBy(['id' => SORT_DESC])->all();

        // Video view o'ngdagi to'rtta eng ko'p ko'rilganlar
        $videoview = Video::find()->limit(4)->orderBy(['view' => SORT_DESC])->all();

        // Video viewni sanaydi va ko'p ko'rilganda yuqoriga chiqib qolaveradi
        Video::updateAllCounters(['view'=>1],['id'=>$id]);

        return $this->render('view', compact('videos1','videos2','videos4','videoview'));
    }

    public function actionMore(){

        $this->setMeta(Yii::t('yii','All videos'));

        $query = Video::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1']);
        
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $videos = $query->offset($pages->offset)->limit($pages->limit)->all();

        // Video more o'ngdagi to'rtta eng ko'p ko'rilganlar
        $videoview = Video::find()->limit(4)->orderBy(['view' => SORT_DESC])->all();

        return $this->render('more', compact('videos','pages','videoview'));
    }

    public function actionMoreView($id)
    {
        // Video more-view dagi birinchisi bittalik 
        $videos1 = Video::findOne($id);
        if(empty($videos1->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'No such video available'));
        
        $this->setMeta($videos1->getTitle());

        $query = Video::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1']);
        
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $videos = $query->offset($pages->offset)->limit($pages->limit)->all();

        // Video more-view o'ngdagi to'rtta eng ko'p ko'rilganlar
        $videoview = Video::find()->limit(4)->orderBy(['view' => SORT_DESC])->all();

        // Video more-view ni sanaydi va ko'p ko'rilganda yuqoriga chiqib qolaveradi
        Video::updateAllCounters(['view'=>1],['id'=>$id]);

        return $this->render('more-view', compact('videos1','videos2','videos','pages','videoview'));
    }

}
