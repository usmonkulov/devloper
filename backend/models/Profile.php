<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $register_id
 * @property string $avatar
 * @property string $first_name
 * @property string $second_name
 * @property string $middle_name
 * @property int $birthday
 * @property int $gender
 *
 * @property Register $register
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['register_id', 'first_name', 'second_name', 'middle_name', 'birthday', 'gender'], 'required'],
            [['register_id', 'birthday', 'gender'], 'integer'],
            [['avatar'], 'string', 'max' => 255],
            [['first_name', 'second_name', 'middle_name'], 'string', 'max' => 32],
            [['register_id'], 'exist', 'skipOnError' => true, 'targetClass' => Register::className(), 'targetAttribute' => ['register_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_id' => 'Register ID',
            'avatar' => 'Avatar',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'middle_name' => 'Middle Name',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(Register::className(), ['id' => 'register_id']);
    }
}
