<?php

namespace frontend\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/* @property string $username */

class AccountActivation extends Model
{
    /* @var $user \frontend\models\Register */
    private $_user;

    public function __construct($key, $config = [])
    {
        if(empty($key) || !is_string($key))
            throw new InvalidParamException(Yii::t('yii', 'The key cannot be empty!'));
        $this->_user = Register::findBySecretKey($key);
        if(!$this->_user)
            throw new InvalidParamException(Yii::t('yii', 'Wrong key!'));
        parent::__construct($config);
    }

    public function activateAccount()
    {
        $user = $this->_user;
        $user->status = Register::STATUS_ACTIVE;
        $user->removeSecretKey();
        return $user->save();
    }

    public function getUsername()
    {
        $user = $this->_user;
        return $user->username;
    }

}