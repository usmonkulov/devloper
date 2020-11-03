<?php

namespace frontend\models;
use frontend\components\LanguageModel;
use Yii;

class BookProduct extends LanguageModel
{
    public static function tableName()
    {
        return 'book_product';
    }

    public function getBookOrderItems()
    {
        return $this->hasMany(BookOrderItems::className(), ['book_product_id' => 'id']);
    }

    public function getBookCategory()
    {
        return $this->hasOne(BookCategory::className(), ['id' => 'book_category_id']);
    }

    public function getBookAuthor()
    {
        return $this->hasOne(BookAuthor::className(), ['id' => 'book_author_id']);
    }
}
