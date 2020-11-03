<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegForm */
/* @var $form ActiveForm */
?>
<style>
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #eceef2;
    border-radius: 5px;
</style>
<div class="site-reg">
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
                <p>
                    <?=Yii::t('yii', 'You need to register to leave comments and use other features of the site')?>.
                </p>
                <hr class="colorgraph">
                <?php $form = ActiveForm::begin(
                    ['options' => ['class' => 'post-reply']
                ]) ?>
                <fieldset>

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

                    <?= $form->field($model, 'phone',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-volume-control-phone form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Phone')
                        ]
                    ) ?>

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

                    <?= Html::submitButton(Yii::t('yii', 'Registration'), ['class' => 'primary-button btn-block']) ?>

                    <hr class="colorgraph">
                    <div>
                        <?=Yii::t('yii', 'Already registered')?>?

                        <a class="pull-right" href="<?=\yii\helpers\Url::to(['/site/login'])?>"><?=Yii::t('yii', 'Login')?> <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
       </div>
   </div>
</div>
