<?php

namespace frontend\components;
use frontend\models\SocialNetworks;
use yii\base\Widget;

class NetworkViewWidget extends Widget{

	public function run(){
		$networks = SocialNetworks::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->limit(4)->all();
		return $this->render('network-view', compact('networks'));
	}
}