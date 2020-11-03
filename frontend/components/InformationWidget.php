<?php

namespace frontend\components;
use frontend\models\Information;
use yii\base\Widget;

class InformationWidget extends Widget{

	public function run(){

		$informations = Information::find()->limit(1)->orderBy(['id' => SORT_DESC])->all();
		
		return $this->render('information', compact('informations'));
	}
}