<?php

use yii\helpers\Html;
$this->params['breadcrumbs'][] = $this->title;
use frontend\components\BookCategoryWidget;
use frontend\components\BookAuthorWidget;

?>
<div class="book-category-index">
  <!-- section -->
  <div class="section">
  <!-- container -->
  <div class="container">
  <!-- START ALERTS AND CALLOUTS -->
    <?php if(Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif;?>     
  <!-- END ALERTS AND CALLOUTS -->
  <!-- row -->
  <div class="row">
       <div class="col-md-3">
          
        <!-- catagories -->
        <div class="aside-widget">
          <?php if(!empty(BookCategoryWidget::widget()) ): ?>
            <div class="section-title">
                <h2><?=Yii::t('yii','Catagories')?></h2>
            </div>
            <div class="category-widget">
                <ul>
                    <?= BookCategoryWidget::widget()?> 
                </ul>
            </div>
          <?php endif; ?>
        </div>
        <!-- /catagories -->

        <!-- author -->
        <div class="aside-widget">
          <?php if(!empty(BookAuthorWidget::widget()) ): ?>
            <div class="section-title">
                <h2><?=Yii::t('yii','Authors')?></h2>
            </div>
            <div class="category-widget">
                <ul>
                    <?= BookAuthorWidget::widget()?> 
                </ul>
            </div>
          <?php endif; ?>
        </div>
        <!-- /author -->

      </div>
      <div class="col-md-9">
      <?php if(!empty($bookProducts)) : ?>
          <div class="section-title">
              <h2 class="text-center"><?= Html::encode($this->title) ?></h2>
          </div>
        <div class="row">
          <?php $i = 0; foreach($bookProducts as $bookProduct): ?>
          <div class="col-md-4 col-sm-6">
            <div class="product-grid6">
                <div class="product-image6">
                    <a href="<?=\yii\helpers\Url::to(['book-product/view', 'id'=>$bookProduct->id])?>">
                        <?php if($bookProduct->img):?>
                            <?= Html::img("@web/{$bookProduct->img}", ['alt' =>$bookProduct->Name])?>
                        <?php else:?>
                            <?= Html::img("@web/placeHolder/book.png", ['alt' =>$bookProduct->Name])?>
                        <?php endif?> 
                     </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?= $bookProduct->getName()?></a></h3>
                    <div class="price"><?= $bookProduct->price?> so'm
                        <span><?= $bookProduct->price - 200?> so'm</span>
                    </div>
                </div>
                <ul class="social">
                    <li><a href="<?=\yii\helpers\Url::to(['book-product/view', 'id'=>$bookProduct->id])?>" data-tip="<?= Yii::t('yii','Quick View')?>"><i class="fa fa-search"></i></a></li>
                    <li><a href="<?=\yii\helpers\Url::to(['book-cart/view'])?>" data-tip="<?= Yii::t('yii','Add to Wishlist')?>"><i class="fa fa-shopping-bag"></i></a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['book-cart/add', 'id' => $bookProduct->id])?>" data-id="<?= $bookProduct->id?>" class="add-to-cart" data-tip="<?= Yii::t('yii','Add to Cart')?>"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
          </div>
          <?php $i++?>
          <?php if($i % 3 == 0): ?>
            <div class="clearfix visible-md visible-lg"></div>
            <br>
          <?php endif;?>
          <?php endforeach;?>
          <div class="clearfix visible-md visible-lg"></div>
          <div class="section-row text-center">
              <?php 
                  echo \yii\widgets\LinkPager::widget([
                    'pagination'=> $pages,
                    'options' => ['class' => 'pagination pagination-sm'],
                  ]);
              ?>
            </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /row -->
  </div>
  <!-- /container -->
  </div>
  <!-- /section -->
</div>