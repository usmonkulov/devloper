<?php

namespace frontend\models;
use Yii;
use yii\helpers\ArrayHelper;
class PasswordChangeForm extends \yii\db\ActiveRecord
{

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 10;

    public static function tableName()
    {
        return 'register';
    }

    public $new_password;
    public $new_password_repeat;

    public function rules()
    {
        return [
            ['new_password', 'required'],
            ['new_password', 'string', 'min' => 6],
            
            ['new_password_repeat', 'required'],
            ['new_password_repeat', 'string', 'min' => 6],
            ['new_password_repeat', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'new_password' => Yii::t('yii', 'New password'),
            'new_password_repeat' => Yii::t('yii', 'Repeat the new password'),
        ];
    }
}