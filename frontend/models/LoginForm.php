<?php

namespace frontend\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $status;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'default'],
            [['email', 'password'], 'required', 'on' => 'loginWithEmail'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()):
            $user = $this->getRegister();
            if (!$user || !$user->validatePassword($this->password)):
                $field = ($this->scenario === 'loginWithEmail') ? 'email' : 'username';
                $this->addError($attribute, Yii::t('yii', 'Wrong '), $field, Yii::t('yii', ' or password.'));
            endif;
        endif;
    }

    public function getRegister()
    {
        if ($this->_user === false):
            if($this->scenario === 'loginWithEmail'):
                $this->_user = Register::findByEmail($this->email);
            else:
                $this->_user = Register::findByUsername($this->username);
            endif;
        endif;
        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('yii', 'Profile name'),
            'email' => Yii::t('yii', 'Email'),
            'password' => Yii::t('yii', 'Password'),
            'rememberMe' => Yii::t('yii', 'RememberMe')
        ];
    }

    public function login()
    {
        if ($this->validate()):
            $this->status = ($user = $this->getRegister()) ? $user->status : Register::STATUS_NOT_ACTIVE;
            if ($this->status === Register::STATUS_ACTIVE):
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
}