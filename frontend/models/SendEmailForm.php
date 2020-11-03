<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SendEmailForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => Register::className(),
                'filter' => [
                    'status' => Register::STATUS_ACTIVE
                ],
                'message' => Yii::t('yii', 'This email is not registered.'),
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => Yii::t('yii', 'Email'),

        ];
    }

    public function sendEmail()
    {
        /* @var $user User */
        $user = Register::findOne(
            [
                'status' => Register::STATUS_ACTIVE,
                'email' => $this->email
            ]
        );

        if($user):
            $user->generateSecretKey();
            if($user->save()):
                return Yii::$app->mailer->compose('resetPassword', ['user' => $user])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' ('.Yii::t('yii', 'sent by robot').')'])
                    ->setTo($this->email)
                    ->setSubject(Yii::t('yii', 'Password reset for'), Yii::$app->name)
                    ->send();
            endif;
        endif;

        return false;
    }

}