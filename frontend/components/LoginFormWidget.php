<?php
 
namespace frontend\components;
 
use Yii;
use yii\base\Widget;
use frontend\models\LoginForm;
 
class LoginFormWidget extends Widget {
    public function run() {
 
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('loginFormWidget', [
                'model' => $model,
            ]);
        } else {
            return ;
        }
    }
 
}