<?php

use yii\helpers\Html;
use frontend\components\BookCategoryWidget;
use frontend\components\BookAuthorWidget;
use yii\widgets\Breadcrumbs;

$bookCategory = $bookProduct->bookCategory;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','New Books'), 'url' => ['book-category/index']];
$this->params['breadcrumbs'][] = ['label' => $bookCategory->Name, 'url' => ['book-category/view', 'id'=>$bookCategory->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-product-view">
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
                <h1><?//=Yii::t('yii', 'All').' '.$this->title?></h1>
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
  <div class="section-title">
    <h2 class="text-center"><?//= Html::encode($this->title) ?></h2>
  </div>
  <!-- cart-view -->
  <div class="col-md-5">
    <div class="aspect-ratio">
      <?php if($bookProduct->img):?>
        <?= Html::img("@web/{$bookProduct->img}", ['alt' =>$bookProduct->Name])?>
      <?php else:?>
        <?= Html::img("@web/placeHolder/book1.png", ['alt' =>$bookProduct->Name])?>
      <?php endif?> 
    </div>
    <br><br>
  </div>

  <div class="col-md-7">
    <!-- <p class="newarrival text-center">NEW</p> -->
    <h2><?=$bookProduct->Name?></h2>
    <p class="price">UZS <?=$bookProduct->price?> so'm</p>
    <p><b>Catagories:</b> <?=$bookCategory->Name?></p>
    <p><b>Description:</b> <?=$bookProduct->Description?> Server qoida sifatida eng kuchli va eng ishonchli kompyuter hisoblanadi. U uzluksiz quvvat manbai orqali ulanishi kerak, u ikki va hatto uch marta takrorlash tizimlarini ta'minlaydi.</p>
    <p><b>Authoress:</b> <?php echo $bookAuthor = $bookProduct->bookAuthor->Fnf;?> </p>
    <label>Quantity:</label>
    <input type="text" value="1" id="qty">
    <a href="<?= \yii\helpers\Url::to(['book-cart/add', 'id' => $bookProduct->id])?>" data-id="<?= $bookProduct->id?>" class="btn btn-default add-to-cart cart"> Add to cart</a>
  </div>
  <br><br>
    <!-- /cart-view -->
    <div class="col-md-12">
      <?php if(!empty($bookProducts)) : ?> 
      <div class="section-title">
        <h2 class="text-center"><?= Yii::t('yii','Yangilangan vaqt bo\'yicha')?></h2>
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
              <h3 class="title"><a href="#"><?= $bookProduct->Name?></a></h3>
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

<style>
    /* Ushbu element img ishlatadigan hajmni belgilaydi.
    Ushbu misolda biz 25:14 nisbatiga ega bo'lishni xohlaymiz */
.aspect-ratio {
  position: relative;
  width: 86%;
  height: 100%;
  padding-bottom: 100%; /* The height of the item will now be 56% of the width. */
}
                 
/* img-ni u ota-onaning tashqi-kengligi va tashqi balandligida ko'rsatadigan qilib sozlang */
.aspect-ratio img {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
}
.newarrival{
  background: green;
  width: 50px;
  color: white;
  font-size: 12px;
  font-weight: bold;
}
.col-md-7 h2{
  color: #555;
}
.price{
  color: #FE980F;
  font-size: 26px;
  font-weight: bold;
  /*padding-top: 10px;*/
}
input{
  border: 1px solid #ccc;
  font-weight: bold;
  height: 33px;
  text-align: center;
  width: 40px;
}
.cart{
  background: #0078ff;
  color: #FFFFFF;
  font-size: 15px;
  margin-left: 20px; 
}
</style>
