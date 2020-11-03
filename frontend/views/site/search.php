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
<div class="site-search">
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

						<!-- ad -->
						<?= PublicityImageWidget::widget()?>
						<!-- ad -->
						
						<?php if(!empty($posts4)) : ?>
						<!-- post -->
						<?php foreach ($posts4 as $posts):?>
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
										<a class="post-category cat-<?=$category->color?>" href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$category->id])?>">
											<?=$category->getTitle()?>
											</a>
										<span class="post-date"><?= mb_substr($posts->updated_at,0,10)?></span>
									</div>
									<h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$posts->id])?>"><?=$posts->getTitle()?></a></h3>
									<p><?= mb_substr($posts->getContent(),0,310)?>...</p>
								</div>
							</div>
						</div>                
						<?php endforeach?>
						<!-- /post -->

						<div class="col-md-12">
							<div class="section-row text-center">
								<?php 
		                            echo \yii\widgets\LinkPager::widget([
		                              'pagination'=> $pages,
		                              'options' => ['class' => 'pagination pagination-sm'],
		                            ]);
		                        ?>
							</div>
						</div>
						<?php else :?>
							<h2><?=Yii::t('yii', 'Posts not found')?>...</h2>
						<?php endif;?>
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
					
					<!-- archive -->
					<div class="aside-widget">
						<div class="section-title">
							<h2>Archive</h2>
						</div>
						<div class="archive-widget">
							<ul>
								<li><a href="#">Jan 2018</a></li>
								<li><a href="#">Feb 2018</a></li>
								<li><a href="#">Mar 2018</a></li>
							</ul>
						</div>
					</div>
					<!-- /archive -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</div>