<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">
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
                  <?php foreach($videos1 as $video): ?>
                  <div class="col-md-12">
                      <div class="post">
                          <!-- <p class="post-img"> -->
                            <!-- <iframe width="750" height="450" src="<?=$video->url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe> -->
                            <div class="aspect-ratio">
                              <?=$video->url?>
                            </div>
                             
                            <style>
                            /* Ushbu element iframe ishlatadigan hajmni belgilaydi.
                            Ushbu misolda biz 25:14 nisbatiga ega bo'lishni xohlaymiz */
                            .aspect-ratio {
                              position: relative;
                              width: 100%;
                              height: 0;
                              padding-bottom: 62%; /* The height of the item will now be 56% of the width. */
                            }
                             
                            /* Iframe-ni u ota-onaning tashqi-kengligi va tashqi balandligida ko'rsatadigan qilib sozlang */
                            .aspect-ratio iframe {
                              position: absolute;
                              width: 100%;
                              height: 100%;
                              left: 0;
                              top: 0;
                            }
                            </style>
                         <!--  </p> -->
                          <div class="post-body">
                              <div class="post-meta">
                                  <span class="post-date"><?= mb_substr($video->updated_at,0,10)?></span>
                              </div>
                              <h3 class="post-title"><?=$video->getTitle()?></h3>
                          </div>
                      </div>
                  </div>
                  <?php endforeach;?>
                  <!-- /post -->
                          
                  <!-- post -->
                  <?php foreach($videos2 as $video): ?>
                  <div class="col-md-6">
                      <div class="post">
                          <a class="post-img" href="<?=\yii\helpers\Url::to(['video/view', 'id'=>$video->id])?>">
                            <div class="aspect-ratio">
                              <?=$video->url?>
                            </div>
                          </a>
                          <div class="post-body">
                              <div class="post-meta">
                                  <span class="post-date"><?= mb_substr($video->updated_at,0,10)?></span>
                              </div>
                              <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['video/view', 'id'=>$video->id])?>"><?=$video->getTitle()?></a></h3>
                          </div>
                      </div>
                  </div>
                  <?php endforeach;?>
                  <!-- /post -->
                  
                  <div class="clearfix visible-md visible-lg"></div>
                  
                  
                  <!-- post -->
                  <?php foreach($videos4 as $video): ?>
                  <div class="col-md-12">
                      <div class="post post-row">
                          <a class="post-img" href="<?=\yii\helpers\Url::to(['video/view', 'id'=>$video->id])?>">
                            <div class="aspect-ratio">
                              <?=$video->url?>
                            </div>
                          </a>
                          <div class="post-body">
                              <div class="post-meta">
                                  <span class="post-date"><?= mb_substr($video->updated_at,0,10)?></span>
                              </div>
                              <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['video/view', 'id'=>$video->id])?>"><?=$video->getTitle()?></a></h3>
                          </div>
                      </div>
                  </div>
                  <?php endforeach;?>
                  <!-- /post -->
                  
                  <div class="col-md-12">
                      <div class="section-row">
                          <a href="<?=\yii\helpers\Url::to(['video/more'])?>"><button class="primary-button center-block"><?=Yii::t('yii','Load More')?></button></a>
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4">
              <!-- ad -->
             <!--  <div class="aside-widget text-center">
                  <a href="#" style="display: inline-block;margin: auto;">
                      <img class="img-responsive" <img src="/img/ad-1.jpg" alt="">
                  </a>
              </div> -->
              <!-- /ad -->

              <style>
                /* Ushbu element iframe ishlatadigan hajmni belgilaydi.
                Ushbu misolda biz 25:14 nisbatiga ega bo'lishni xohlaymiz */
                .aspect-view {
                  position: relative;
                  width: 100%;
                  height: 0;
                  padding-bottom: 85%; /* The height of the item will now be 56% of the width. */
                }
                 
                /* Iframe-ni u ota-onaning tashqi-kengligi va tashqi balandligida ko'rsatadigan qilib sozlang */
                .aspect-view iframe {
                  position: absolute;
                  width: 100%;
                  height: 100%;
                  left: 0;
                  top: 0;
                }
              </style>
              
              <!-- post widget -->
              <div class="aside-widget">
                  <div class="section-title">
                      <h2><?=Yii::t('yii','Watched a lot')?></h2>
                  </div>
                  <?php foreach($videoview as $video): ?>
                  <div class="post post-widget">
                      <a class="post-img" href="blog-post.html">
                        <div class="aspect-view">
                          <?=$video->url?>
                        </div>
                      </a>
                      <div class="post-body">
                          <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['video/view', 'id'=>$video->id])?>"><?=$video->getTitle()?></a></h3>
                      </div>
                  </div>
                  <?php endforeach;?>

              </div>
              <!-- /post widget -->
              
          </div>
      </div>
      <!-- /row -->
  </div>
  <!-- /container -->
  </div>
  <!-- /section -->
</div>
