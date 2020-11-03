<?php

use yii\helpers\Html;
use frontend\components\SubCategoryWidget;
use frontend\components\NetworkWidget;
use frontend\components\NetworkViewWidget;
use frontend\components\SubCategoryMoreWidget;
use yii\bootstrap\ActiveForm;

?>
<div class="post-view">

<!-- Page Header -->
    <div id="post-header" class="page-header">
        <?php if($posts->image):?>
            <div class="background-img" style="background-image: url('<?=Yii::getAlias('@web/')?><?=$posts->image?>')">
            </div>
        <?php else:?>
            <div class="background-img" style="background-image: url('<?=Yii::getAlias('@web/placeHolder/placeHolder_header_view.png')?>')">
            </div>
        <?php endif?>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <?php $category = $posts->category;?>
                        <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>"><?=$category->getTitle()?></a>
                        <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                    </div>
                    <h1><?=$posts->getTitle()?></h1>
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
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3><?=$posts->getDescription()?></h3>
                        <?=$posts->getContent()?>
                    </div>
                    <div class="post-shares sticky-shares">
                        <?= NetworkViewWidget::widget()?> 
                    </div>
                </div>

                <!-- ad -->
                <?php foreach ($publicityImage as $publicityImag):?>
                <div class="section-row text-center">
                    <a href="<?=$publicityImag->url?>" style="display: inline-block;margin: auto;">
                        <?php if($publicityImag->image):?>
                            <?= Html::img("@web/{$publicityImag->image}", ['class' => 'img-responsive','alt' =>$publicityImag->title])?>
                        <?php else:?>
                            <?= Html::img("@web/placeHolder/ad-2.jpg",['class' => 'img-responsive','alt' =>$publicityImag->title])?>
                        <?php endif?> 
                    </a>
                </div>
                <?php endforeach?>
                <!-- ad -->
                
                <!-- author -->
                <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="/img/author.png" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>John Doe</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <ul class="author-social">
                                    <?= NetworkWidget::widget()?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /author -->

                <!-- comments -->
                <?php if( !empty($comments) ): ?>
                <div class="section-row">
                    <div class="section-title">
                        <h2><?= count($comments);?> <?=Yii::t('yii','Comments')?></h2>
                    </div>
                    <?php foreach ($comments as $comment):?>
                    <?php $register = $comment->register;?>
                    <?php $profiles = $register->profiles;?>

                    <hr>
                    <div class="post-comments">
                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <?php if($profiles->image):?>
                                    <?= Html::img("@web/{$profiles->image}", ['class' => 'media-object','alt' =>$profiles->username])?>
                                <?php else:?>
                                    <?= Html::img("@web/placeHolder/author.png",['class' => 'media-object','alt' =>$profiles->username])?>
                                <?php endif?> 
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4><?=$profiles->first_name?></h4>
                                    <span class="time"><?=$comment->created_at?></span>
                                </div>
                                <p><?=$comment->message?></p>
                            </div>
                        </div>
                        <!-- /comment -->
                    </div>
                    <?php endforeach?>
                </div>
                <?php endif; ?>
                <!-- /comments -->

                <!-- reply -->
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

                    <div class="section-title">
                        <h2><?=Yii::t('yii', 'Leave a reply')?></h2>
                        <p><?=Yii::t('yii', 'your email address will not be published. required fields are marked')?> *</p>
                    </div>
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'post-reply']]); ?>
                        <div class="row">

                            <div class="col-md-6">
                                <?= $form->field($model, 'name',
                                    ['options' => 
                                        [
                                            'tag' => 'div',
                                            'class' => 'form-group'
                                        ],
                                    'template' => '<span>'.Yii::t('yii', 'Name').' *'.'</span>{input}
                                        {error}{hint}'
                                    ])->textInput(
                                    [
                                        'class' => 'input',
                                    ]
                                ) ?>
                            </div>
            
                            <div class="col-md-6">
                                <?= $form->field($model, 'website',
                                    ['options' => 
                                        [
                                            'tag' => 'div',
                                            'class' => 'form-group'
                                        ],
                                    'template' => '<span>'.Yii::t('yii', 'Website').'</span>{input}
                                        {error}{hint}'
                                    ])->textInput(
                                    [
                                        'class' => 'input',
                                    ]
                                ) ?>
                            </div>
                            <div class="col-md-12">

                                <?= $form->field($model, 'message',['options' => [
                                    'tag' => 'div',
                                    'class' => 'form-group'
                                ],
                                'template' => '{input}{error}{hint}'
                                ])->textarea(
                                    [
                                        'class' => 'input',
                                        'placeholder' => Yii::t('yii', 'Message')
                                    ]
                                ) ?>

                                <?= Html::submitButton(Yii::t('yii', 'Submit'), ['class' => 'primary-button']) ?>
                            </div>
                        </div>
                        <?= $form->errorSummary($model)?>
                    <?php ActiveForm::end(); ?>
                </div>
                <!-- /reply -->
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
               <!-- ad -->
                <?php foreach ($publicitys1 as $publicity):?>
                <div class="aside-widget text-center">
                    <a href="<?=$publicity->url?>" style="display: inline-block;margin: auto;">
                        <?php if($publicity->image):?>
                            <?= Html::img("@web/{$publicity->image}", ['class' => 'img-responsive','alt' =>$publicity->title])?>
                        <?php else:?>
                            <?= Html::img("@web/placeHolder/ad-1.jpg",['class' => 'img-responsive','alt' =>$publicity->title])?>
                        <?php endif?> 
                    </a>
                </div>
                <?php endforeach?>
                <!-- /ad -->

                <!-- post widget -->
                <div class="aside-widget">
                    <?php if( !empty($postsview4) ): ?>
                    <div class="section-title">
                        <h2><?= Yii::t('yii','Most Read')?></h2>
                    </div>

                    <?php foreach ($postsview4 as $posts):?>
                    <div class="post post-widget">
                        <a class="post-img" href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>">
                            <?php if($posts->image_most_read):?>
                                <?= Html::img("@web/{$posts->image_most_read}", ['alt' =>$posts->getTitle()])?>
                            <?php else:?>
                                <?= Html::img("@web/placeHolder/placeHolder_view.png", ['alt' =>$posts->title])?>
                            <?php endif?>  
                        </a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                        </div>
                    </div>
                    <?php endforeach?>
                    <?php endif; ?>
                </div>
                <!-- /post widget -->

                <!-- post widget -->
                <div class="aside-widget">
                    <?php if( !empty($featured_posts2) ): ?>
                    <div class="section-title">
                        <h2><?= Yii::t('yii','Featured Posts')?></h2>
                    </div>
                    <?php foreach ($featured_posts2 as $posts):?>
                    <div class="post post-thumb">
                        <a class="post-img" href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>">
                            <?php if($posts->image):?>
                                <?= Html::img("@web/{$posts->image}", ['alt' =>$posts->getTitle()])?>
                            <?php else:?>
                                <?= Html::img("@web/placeHolder/placeHolder.png", ['alt' => Yii::t('yii','placeHolder')])?>
                            <?php endif?>
                        </a>
                        <div class="post-body">
                            <div class="post-meta">
                                <?php $category = $posts->category;?>
                                <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>"><?=$category->getTitle()?></a>
                                <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                            </div>
                            <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif; ?>
                </div>
                <!-- /post widget -->
                
                <!-- catagories -->
                <div class="aside-widget">
                    <?php if( !empty(SubCategoryWidget::widget()) ): ?>
                    <div class="section-title">
                        <h2><?=Yii::t('yii','Catagories')?></h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <?= SubCategoryWidget::widget()?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- /catagories -->
                
                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            <?= SubCategoryMoreWidget::widget()?>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

</div>
