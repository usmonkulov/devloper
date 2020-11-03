<?php

namespace frontend\models;

use Yii;

class BookAuthor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'book_author';
    }

    public function getBookProducts()
    {
        return $this->hasMany(BookProduct::className(), ['book_author_id' => 'id']);
    }

    public function getFnf($language=null)
    {
        $title = json_decode($this->fnf,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
}
