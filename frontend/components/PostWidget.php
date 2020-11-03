<?php

namespace frontend\components;
use frontend\models\Post;
use yii\base\Widget;

class PostWidget extends Widget{

	public function run(){
		$posts = Post::find()->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->limit(3)->all();
		return $this->render('post', compact('posts'));
	}
}