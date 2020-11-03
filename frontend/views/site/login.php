<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\helpers\Url;
$this->registerJsFile('/js/nuqta.js', ['depends' => 'yii\web\YiiAsset']);

/* @var $this yii\web\View */
/* @var $model frontend\models\LoginForm */
/* @var $form ActiveForm */
?>
<style>
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #eceef2;
    border-radius: 5px;
</style>
<div class="site-login">
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
                <?php if(Yii::$app->session->hasFlash('warning') ): ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo Yii::$app->session->getFlash('warning'); ?>
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
                <?php if($model->scenario === 'loginWithEmail'): ?>

                    <?= $form->field($model, 'email',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-envelope form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Email')
                        ]
                    ) ?>
                <?php else: ?>
                    <?= $form->field($model, 'username',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-user form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Username')
                        ]
                    ) ?>
                <?php endif; ?>
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
                            'placeholder' => Yii::t('yii', 'Password')
                        ]
                    ) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <?= Html::submitButton(Yii::t('yii', 'Login'), ['class' => 'primary-button btn-block']) ?>

                    <hr class="colorgraph">
                    <div>
                        <a href="<?=\yii\helpers\Url::to(['/site/send-email'])?>"><?=Yii::t('yii', 'Forgot password')?>?
                        <a class="pull-right" href="<?=\yii\helpers\Url::to(['/site/reg'])?>"><?=Yii::t('yii', 'Registration')?> <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
       </div>
    </div>
</div>
