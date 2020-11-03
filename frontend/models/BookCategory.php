<?php

namespace frontend\models;
use frontend\components\LanguageModel;
use Yii;

class BookCategory extends LanguageModel
{
    public static function tableName()
    {
        return 'book_category';
    }

    public function getBookProducts()
    {
        return $this->hasMany(BookProduct::className(), ['book_category_id' => 'id']);
    }
}
