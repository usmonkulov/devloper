<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResetPasswordForm */
/* @var $form ActiveForm */
?>
<style>
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #eceef2;
    border-radius: 5px;
</style>
<div class="site-resetPassword">
    <div class="container">
        <div class="row" style="margin-top:40px;">
            <div class="col-md-4 col-md-offset-4">

                <!-- START ALERTS AND CALLOUTS -->
                <?php if(Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
                <?php endif;?>     
                <!-- END ALERTS AND CALLOUTS -->

                <!-- START ALERTS AND CALLOUTS -->
                <?php if(Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
                <?php endif;?>     
                <!-- END ALERTS AND CALLOUTS -->
                
                <h3 style="color:dimgray; text-align: center"><?=$this->title?></h3>
                <hr class="colorgraph">
                <?php $form = ActiveForm::begin(
                    ['options' => ['class' => 'post-reply']
                ]) ?>
                <fieldset>

                   <?= $form->field($model, 'password',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-lock form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->passwordInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'New password')
                        ]
                    ) ?>

                    <?= Html::submitButton(Yii::t('yii', 'Reset Password'), ['class' => 'primary-button btn-block']) ?>

                    <hr class="colorgraph">
                   
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
