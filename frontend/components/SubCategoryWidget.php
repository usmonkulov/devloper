<?php

namespace frontend\components;
use frontend\models\Category;
use yii\base\Widget;

class SubCategoryWidget extends Widget{

	public function run(){
		$categories = Category::find()->where(['status' => '1'])->limit(6)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('sub-category', compact('categories'));
	}
}