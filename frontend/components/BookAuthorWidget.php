<?php

namespace frontend\components;
use frontend\models\BookAuthor;
use yii\base\Widget;

class BookAuthorWidget extends Widget{

	public function run(){
		$bookAuthors = BookAuthor::find()->where(['status' => '1'])->limit(8)->orderBy(['id' => SORT_DESC])->all();
		
		$bookAuthorsis = BookAuthor::find()->where(['status' => '1'])->offset(8)->orderBy(['id' => SORT_DESC])->all();
		return $this->render('book-author', compact('bookAuthors','bookAuthorsis'));
	}
}