<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\components\SubCategoryWidget;
use frontend\components\SubCategoryMoreWidget;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="more">
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
						<?php if(!empty($postsmore)) : ?>
						<!-- post -->
	                    <?php foreach ($postsmore as $posts):?>
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
						<?php endif;?>
					</div>
				</div>

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