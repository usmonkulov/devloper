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
                    <?= $form->field($model, 'first_name',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-male form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Last name, First name, Patronymic')
                        ]
                    ) ?>

                    <div class="form-group">
                        <?= $form->field($model, 'gender',
                            ['options' => 
                                [
                                    'tag' => 'div',
                                    'class' => 'radio'
                                ],
                                'template' => '<span>'.Yii::t('yii', 'Gender').'</span>{input}{error}{hint}'
                            ]
                        )->radioList(
                            [ 
                                '1' => Yii::t('yii','Male'), 
                                '10' => Yii::t('yii','Female') 
                            ]
                        ) ?>
                    </div>
                    <?= $form->field($model, 'region_id',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                            'template' => '{input}<span class="form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->dropDownList(
                        $model->getRegionList(), 
                        [
                            'class' => 'input',
                            'prompt' => Yii::t('yii','Select a region'),
                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('site/city?id=').'"+$(this).val(),function(data){$("#regform-city_id").html(data);});'
                        ]
                    ) ?>

                    <?= $form->field($model, 'city_id',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                            'template' => '{input}<span class="form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->dropDownList(
                        $model->getCityList(),
                        [
                            'class' => 'input',
                            'prompt' => Yii::t('yii','Select District or City')
                        ]
                    ) ?>

                    <?= $form->field($model, 'address',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '{input}<span style="padding-top:10px" class="fa fa-map-marker form-control-feedback"></span>
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Address')
                        ]
                    ) ?>

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
                            'placeholder' => Yii::t('yii', 'Profile name')
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
