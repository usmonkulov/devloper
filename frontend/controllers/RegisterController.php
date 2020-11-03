<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PasswordChangeForm;
use frontend\models\ProfileForm;
use frontend\models\Register;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class RegisterController extends BehaviorsController
{

    public function actionChangePassword($id)
    {
        $this->setMeta(Yii::t('yii','Change password'));

        $model = $this->findPasswordChange($id);

        if ($model->load(Yii::$app->request->post()) and $model->validate()) {

            if ($model->new_password) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->new_password);
            }
            if($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('yii', 'Password changed successfully.'));
            return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', Yii::t('yii', 'An error occurred while changing the password')); 
            }
        }
        return $this->render('change-password', compact('model'));
    }

    protected function findPasswordChange($id)
    {
        if (($model = PasswordChangeForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
        }
    }
}
