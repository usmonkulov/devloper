<?php

namespace frontend\components;
use frontend\models\MainLogo;
use yii\base\Widget;

class MainLogoWidget extends Widget{

	public function run(){

		$logos = MainLogo::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('main-logo', compact('logos'));
	}
}