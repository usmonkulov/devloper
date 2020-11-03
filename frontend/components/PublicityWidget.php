<?php

namespace frontend\components;
use frontend\models\Publicity;
use yii\base\Widget;

class PublicityWidget extends Widget{

	public function run(){

        $publicitys = Publicity::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();

		return $this->render('publicityWidget', compact('publicitys'));
	}
}