<?php

namespace frontend\components;
use frontend\models\PublicityImage;
use yii\base\Widget;

class PublicityImageWidget extends Widget{

	public function run(){

        $publicityImage = PublicityImage::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();

		return $this->render('publicityImageWidget', compact('publicityImage'));
	}
}