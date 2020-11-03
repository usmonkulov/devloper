<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;

class ResetPasswordForm extends Model
{
    public $password;
    private $_user;

    public function rules()
    {
        return [
            ['password', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('yii', 'New password'),
        ];
    }

    public function __construct($key, $config = [])
    {
        if(empty($key) || !is_string($key))
            throw new InvalidParamException(Yii::t('yii', 'The key cannot be empty.'));
        $this->_user = Register::findBySecretKey($key);
        if(!$this->_user)
            throw new InvalidParamException(Yii::t('yii', 'Wrong key.'));
        parent::__construct($config);
    }

    public function resetPassword()
    {
        /* @var $user Register */
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removeSecretKey();
        return $user->save();
    }

}