<?php

namespace frontend\models;
use frontend\components\LanguageModel;
use Yii;


class Category extends LanguageModel
{
    
    public static function tableName()
    {
        return 'category';
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }

}
