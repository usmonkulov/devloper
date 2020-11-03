<?php

use yii\helpers\Html;
use frontend\components\SubCategoryWidget;
use frontend\components\SubCategoryMoreWidget;
?>
<div class="site-index">

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">   
                <!-- post -->
                <?php foreach ($posts2 as $posts):?>
                <div class="col-md-6">
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
                                <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>">
                                    <?=$category->getTitle()?>
                                </a>
                                <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                            </div>
                            <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                <!-- /post -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <?php if( !empty($posts6) ): ?>
                <div class="col-md-12">
                    <div class="section-title">
                        <h2><?=Yii::t('yii','Recent Posts')?></h2>
                    </div>
                </div>

                <!-- post -->
                <?php $i = 0; foreach($posts6 as $posts): ?>
                <div class="col-md-4">
                    <div class="post">
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
                                <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>">
                                    <?=$category->getTitle()?>
                                </a>
                                <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                            </div>
                            <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                        </div>
                    </div>
                </div>
                <?php $i++?>
                <?php if($i % 3 == 0): ?>
                    <div class="clearfix visible-md visible-lg"></div>
                <?php endif;?>
                <?php endforeach;?>
                <!-- /post -->
                <?php endif; ?>
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <!-- post -->
                        <?php foreach ($posts1 as $posts):?>
                        <div class="col-md-12">
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
                                        <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>">
                                            <?=$category->getTitle()?>
                                        </a>
                                        <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                                    </div>
                                    <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- /post -->

                        <!-- post -->
                        <?php $i = 0; foreach($posts61 as $posts): ?>
                        <div class="col-md-6">
                            <div class="post">
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
                                        <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>">
                                            <?=$category->getTitle()?>
                                        </a>
                                        <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                                    </div>
                                    <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                                </div>
                            </div>
                        </div>
                        <?php $i++?>
                        <?php if($i % 2 == 0): ?>
                            <div class="clearfix visible-md visible-lg"></div>
                        <?php endif;?>
                        <?php endforeach;?>
                        <!-- /post -->
                    </div>
                </div>

                <div class="col-md-4">
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
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    
    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php if( !empty($featured_posts3) ): ?>
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2><?= Yii::t('yii','Featured Posts')?></h2>
                    </div>
                </div>

                <!-- post -->
                <?php foreach ($featured_posts3 as $posts):?>
                <div class="col-md-4">
                    <div class="post">
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
                </div>
                <?php endforeach?>
                <!-- /post -->
                <?php endif; ?>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php if( !empty($postsview41) ): ?>
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2><?= Yii::t('yii','Most Read')?></h2>
                            </div>
                        </div>

                        <!-- post -->
                        <?php $i = 0; foreach ($postsview41 as $posts):?>
                        <div class="col-md-12">
                            <div class="post post-row">
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
                                        <a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['post/category-view', 'id'=>$posts->id])?>">
                                            <?=$category->getTitle()?>
                                        </a>
                                        <span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
                                    </div>
                                    <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
                                    <p><?= mb_substr($posts->getContent(),0,310)?>...</p>
                                </div>
                            </div>
                        </div>
                        <?php $i++?>
                        <?php if($i % 4 == 0): ?>
                        <div class="col-md-12">
                            <div class="section-row">
                                <a href="<?=\yii\helpers\Url::to(['site/most-read-more'])?>">
                                    <button class="primary-button center-block">
                                        <?=Yii::t('yii','Load More')?>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach?>
                        <!-- /post -->
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- ad -->
                    <?php foreach ($publicitys2 as $publicity):?>
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
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
   
</div>
