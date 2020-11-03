<?php

use yii\helpers\Html;
use frontend\components\SubCategoryWidget;
use frontend\components\SubCategoryMoreWidget;
use frontend\components\CategoryArchiveWidget;
use frontend\components\PublicityWidget;
use frontend\components\PublicityImageWidget;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-featured-posts">
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
				<div class="col-md-8">
					<div class="row">
						<!-- post -->
						<?php foreach($posts1 as $posts): ?>
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
						<?php foreach($posts2 as $posts): ?>
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
						<?php endforeach;?>
						<!-- /post -->
						
						<div class="clearfix visible-md visible-lg"></div>
						
						<!-- ad -->
						<?= PublicityImageWidget::widget()?>
						<!-- ad -->
						
						<!-- post -->
						<?php $i = 0; foreach ($posts4 as $posts):?>
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
                                <a href="<?=\yii\helpers\Url::to(['site/featured-posts-more'])?>">
                                    <button class="primary-button center-block">
                                        <?=Yii::t('yii','Load More')?>
                                    </button>
                                </a>
                            </div>
						</div>
		                <?php endif;?>
						<?php endforeach?>
						<!-- /post -->
					</div>
				</div>
				
				<div class="col-md-4">
					<!-- ad -->
						<?= PublicityWidget::widget()?>
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
                                    <?= Html::img("@web/placeHolder/placeHolder_view.png", ['alt' =>$posts->getTitle()])?>
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