<?php

namespace frontend\components;
use frontend\models\Category;
use yii\base\Widget;

class CategoryWidget extends Widget{

	public function run(){

		$categories = Category::find()->where(['status' => '1'])->limit(4)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('category', compact('categories'));
	}
}