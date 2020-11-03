<?php

namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;
class RegForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'email', 'phone', 'password'],'required'],
            ['phone', 'string', 'min' => 9, 'max' => 13],
            ['phone', 'unique',
                'targetClass' => Register::className(),
                'message' => Yii::t('yii', 'This phone is already taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => Register::className(),
                'message' => Yii::t('yii', 'This profil is already taken.')],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => Register::className(),
                'message' => Yii::t('yii', 'This mail is already taken.')],
            ['status', 'default', 'value' => Register::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' =>[
                Register::STATUS_NOT_ACTIVE,
                Register::STATUS_ACTIVE
            ]],
            ['status', 'default', 'value' => Register::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('yii', 'Username'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'password' => Yii::t('yii', 'Password'),
        ];
    }

    public function reg()
    {
        $user = new Register();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($this->scenario === 'emailActivation')
            $user->generateSecretKey();
        return $user->save() ? $user : null;
    }

    public function sendActivationEmail($user)
    {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' ('.Yii::t('yii', 'sent by robot').').'])
            ->setTo($this->email)
            ->setSubject(Yii::t('yii', 'Activation for'), Yii::$app->name)
            ->send();
    }

}