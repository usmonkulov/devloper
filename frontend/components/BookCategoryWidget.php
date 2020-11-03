<?php

namespace frontend\components;
use frontend\models\BookCategory;
use yii\base\Widget;

class BookCategoryWidget extends Widget{

	public function run(){
		$bookCategorys = BookCategory::find()->where(['status' => '1'])->limit(8)->orderBy(['id' => SORT_DESC])->all();
		
		$bookCategoryies = BookCategory::find()->where(['status' => '1'])->offset(8)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('book-category', compact('bookCategorys','bookCategoryies'));
	}
}