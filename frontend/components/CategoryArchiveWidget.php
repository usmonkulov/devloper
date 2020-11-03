<?php

namespace frontend\components;
use frontend\models\Category;
use yii\base\Widget;

class CategoryArchiveWidget extends Widget{

	public function run(){
		$categories_archive = Category::find()->where(['status' => '1'])->limit(3)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('category-archive-widget', compact('categories_archive'));
	}
}