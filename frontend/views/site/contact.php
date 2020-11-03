<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

use yii\widgets\Breadcrumbs;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <?php try 
                        {
                          echo Breadcrumbs::widget(
                            [
                              'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("/")],
                              'tag' => 'ol',
                              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                              'options' => ['class' => 'page-header-breadcrumb'],
                              'encodeLabels' => false
                            ]
                          );
                        } catch ( Exception $e ) 

                        {
                          echo $e->getMessage();
                        } 
                        ?>
                    <h1><?=$this->title?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-row">
                            <?php foreach ($informations as $information):?>
                            <h3><?=$information->getTitle()?></h3>
                            <p><?=$information->getContent()?></p>
                            <ul class="list-style">
                                <li><p><strong><?=Yii::t('yii','Email')?>:</strong> <a href="#"><?=$information->email?></a></p></li>
                                <li><p><strong><?=Yii::t('yii','Phone')?>:</strong> <?=$information->phone?></p></li>
                                <li><p><strong><?=Yii::t('yii','Address')?>:</strong> <?=$information->getAddress()?></p></li>
                            </ul>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="section-row">
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
                            <h3><?=Yii::t('yii','Send A Message')?></h3>
                           <?php $form = ActiveForm::begin(); ?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <?= $form->field($model, 'email',
                                            ['options' => 
                                                [
                                                    'tag' => 'div',
                                                    'class' => 'form-group'
                                                ],
                                            'template' => '<span>'.Yii::t('yii', 'Email').'</span>{input}
                                                {error}{hint}'
                                            ])->textInput(
                                            [
                                                'class' => 'input',
                                            ]
                                        ) ?>
                                    </div>
                                    <div class="col-md-7">
                                        <?= $form->field($model, 'subject',
                                            ['options' => 
                                                [
                                                    'tag' => 'div',
                                                    'class' => 'form-group'
                                                ],
                                            'template' => '<span>'.Yii::t('yii', 'Subject').'</span>{input}
                                                {error}{hint}'
                                            ])->textInput(
                                            [
                                                'class' => 'input',
                                            ]
                                        ) ?>
                                    </div>
                                    <div class="col-md-12">

                                        <?= $form->field($model, 'message',
                                            ['options' => 
                                                [
                                                    'tag' => 'div',
                                                    'class' => 'form-group'
                                                ],
                                            'template' => '<span>'.Yii::t('yii', 'Message').'</span>{input}
                                                {error}{hint}'
                                            ])->textarea(
                                            [
                                                'class' => 'input',
                                            ]
                                        ) ?>
                                        <?= $form->field($model, 'verifyCode',
                                            ['options' => 
                                                [
                                                    'tag' => 'div',
                                                    'class' => 'form-group'
                                                ],
                                            'template' => '<span>'.Yii::t('yii', 'Verification Code').'</span>{input}
                                                {error}{hint}'
                                            ])->widget(Captcha::className(), 
                                            [
                                            'options' => ['class' => 'input'],
                                            'template' => '
                                            <div class="row">
                                                <div class="col-lg-6">{input}</div>
                                                <div class="col-lg-3">{image}</div>
                                            </div>',
                                            ]
                                        ) ?>
                                       
                                         <?= Html::submitButton(Yii::t('yii','Submit'), ['class' => 'primary-button']) ?>
                                    </div>
                                </div>
                              <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

</div>
