<?php

namespace frontend\components;
use frontend\models\Category;
use yii\base\Widget;

class SubCategoryMoreWidget extends Widget{

	public function run(){
		$categories = Category::find()->where(['status' => '1'])->limit(10)->orderBy(['updated_at' => SORT_DESC])->all();
		return $this->render('sub-category-more', compact('categories'));
	}
}