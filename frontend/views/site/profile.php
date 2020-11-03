<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */
/* @var $form ActiveForm */
?>
<style>
    .colorgraph {
    height: 5px;
    border-top: 0;
    background: #eceef2;
    border-radius: 5px;
</style>
<div class="site-profile">

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
                    ['options' => [
                        'class' => 'post-reply',
                        'enctype' => 'multipart/form-data'
                    ]
                ]) ?>
                <fieldset>
                    <div class="text-center">
                        <?php if($model->avatar):?>
                        <?= $form->field($model, 'avatar', ['template' => (!$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$model->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
                        <?php else:?>
                        <?= $form->field($model, 'avatar', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$model->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
                        <?php endif?>
                    </div>

                    <?= $form->field($model, 'first_name',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '<span>'.Yii::t('yii', 'First name').'</span>{input}
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'First name')
                        ]
                    ) ?>

                    <?= $form->field($model, 'second_name',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                            'template' => '<span>'.Yii::t('yii', 'Second name').'</span>{input}
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Second name')
                        ]
                    ) ?>

                    <?= $form->field($model, 'middle_name',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                           'template' => '<span>'.Yii::t('yii', 'Middle name').'</span>{input}
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Middle name')
                        ]
                    ) ?>

                    <?php
                    if($model->register)
                    echo $form->field($model->register, 'username',
                        ['options' => 
                            [
                                'tag' => 'div',
                                'class' => 'form-group has-feedback'
                            ],
                            'template' => '<span>'.Yii::t('yii', 'Username').'</span>{input}
                            {error}{hint}'
                        ]
                    )->textInput(
                        [
                            'class' => 'input',
                            'placeholder' => Yii::t('yii', 'Username')
                        ]
                    ) ?>

                    <p><b><?=Yii::t('yii', 'Email')?>: </b><?=$model->register->email?></p>
                    <p><b><?=Yii::t('yii', 'Phone')?>: </b><?=$model->register->phone?></p>
                    <p><b><?=Yii::t('yii', 'Date of creation')?>: </b><?=$model->register->created_at?></p>

                    <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'primary-button btn-block']) ?>

                    <hr class="colorgraph">
                    <div>
                        <a class="pull-left" href="<?=\yii\helpers\Url::to(['/site/index'])?>"><?=Yii::t('yii', 'Home')?>
                        <a class="pull-right" href="<?= \yii\helpers\Url::to(['register/change-password?id='.Yii::$app->user->identity->id])?>"> <?=Yii::t('yii','Change password')?> <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </fieldset>
                <?php ActiveForm::end(); ?>
            </div>
       </div>
    </div>

</div><!-- main-profile -->
