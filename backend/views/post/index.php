<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii','Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div  class="post-index">
  <div class="row mt">
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading wht-bg">
          <p>
            <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
            <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
          </p>
          <h4 class="gen-case">
            <?= Html::encode($this->title) ?>
          </h4>
        </header>
        
        <div class="panel-body minimal">
          <?= GridView::widget([
            'options' => ['class' => 'panel table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
              'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model)
            {
              if($model->status == 0)
              return [
                'class' => 'danger'
              ];
              if($model->status == 1)
              return [
                'class' => 'active'
              ];
            },
            'columns' => [

              [
                'class' => 'yii\grid\SerialColumn',
                // # rishotka o'rniga tartib raqam qo'yildi
                'header'=> Html::a(Yii::t('yii','t\r')), 
                // tepa qismi
                'headerOptions' => ['class' => 'info text-center'],
                // qidirishning chikkalariga ishlov berish
                'filterOptions' => ['class' => 'success'],
                // tarrib raqamlar
                'contentOptions' =>['class' => 'warning text-center'],
                // Katakcha chizig'i
                'options' => ['class' => 'table-bordered'],
              ],
              
              [ 
                'attribute' => 'title',
                'headerOptions' => ['class' => 'info'],
                'filterOptions' => ['class' => 'success'],
                'contentOptions' =>['class' => 'text-danger'],
                // 'footerOptions' =>['class' => 'danger'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'html',
                'value'=> function ($model) 
                {
                  return mb_substr($model->getTitle(),0,30);
                },
              ],

              [
                'attribute'=> 'user_id',
                'headerOptions' => ['class' => 'info text-center','width' => '100'],
                'filterOptions' => ['class' => 'success text-center','width' => '100'],
                'filter' => \backend\models\Post::getUserList(),
                'contentOptions' =>['class' => 'text-danger text-center','width' => '100'],
                'content'=>function($data)
                {
                  return $data->user->username;
                },
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // raw, html
              ],
            
              [
                'attribute'=>'category_id',
                'headerOptions' => ['class' => 'info text-center','width' => '120'],
                'filterOptions' => ['class' => 'success text-center','width' => '120'],
                'filter' => \backend\models\Post::getCategoryList(),
                'contentOptions' =>['class' => 'text-danger text-center','width' => '120'],
                'content'=>function($data)
                {
                  if($data->category):
                    return $data->category->getTitle();
                  else:
                    return Yii::t('yii', '(not set)');
                  endif;
                },
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // raw, html
              ],

              [
                'attribute'=>'view',
                'headerOptions' => ['class' => 'info text-center','width' => '1'],
                'filterOptions' => ['class' => 'success text-center','width' => '1'],
                'contentOptions' =>['class' => 'text-success text-center','width' => '1'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // raw, html
              ],

              [
                'attribute' => 'status',
                'headerOptions' => ['class' => 'info text-center','width' => '125'],
                'filterOptions' => ['class' => 'success text-center','width' => '125'],
                'filter'=>\backend\models\Post::status(),
                'contentOptions' =>['class' => 'text-danger text-center','width' => '125'],
                'content' => function($data)
                {
                  return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                },
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // raw, html
              ],

              [
                'attribute' => 'featured_posts',
                'headerOptions' => ['class' => 'info text-center','width' => '125'],
                'filterOptions' => ['class' => 'success text-center','width' => '125'],
                'filter'=>\backend\models\Post::featured(),
                'contentOptions' =>['class' => 'text-danger text-center','width' => '125'],
                'content' => function($data)
                {
                  return ($data->getFeatured($data->featured_posts))?$data->getFeatured($data->featured_posts) : $data->featured_posts;
                },
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // raw, html
              ],

              [
                'attribute'=>'image',
                'headerOptions' => ['class' => 'info text-center','width' => '80'],
                'filterOptions' => ['class' => 'success text-center','width' => '80'],
                'contentOptions' =>['class' => 'text-center','width' => '80'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'raw', // raw, html
                'content' => function($data)
                {
                  if($data->image):
                    return ($data->image != NULL && $data->image != '' && !empty($data->image)) ? Html::a(Html::img(Yii::$app->urlManager->createUrl('../../frontend/web/'.$data->image), ['style'=>'width:100%']),['../../frontend/web/'.$data->image]) : '';
                  else:
                      return (Html::img('@web/../../frontend/web/placeHolder/no-image.png',['style'=>'width:100%']));
                  endif;
                }
              ],

              [
                'attribute' => 'created_at',
                'headerOptions' => ['class' => 'info text-center'],
                'filterOptions' => ['class' => 'success text-center'],
                'contentOptions' =>['class' => 'text-primary text-center'],
                'options' => ['class' => 'table-bordered'],
              ],

              [
                'attribute' => 'updated_at',
                'headerOptions' => ['class' => 'info text-center'],
                'filterOptions' => ['class' => 'success text-center'],
                'contentOptions' =>['class' => 'text-success text-center'],
                'options' => ['class' => 'table-bordered'],
              ],

              [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'table-bordered'],
                'header'=> Html::a(Yii::t('yii','Menu')), 

                'headerOptions' => ['class' => 'info text-center','width' => '142'],
                'filterOptions' => ['class' => 'success text-center','width' => '142'],
                'contentOptions' =>['class' => 'text-center','width' => '142',],

                'template' => '{view} {update} {featured} {delete} {activate}',
                'buttons' => [
                  'view' => function($url,$model)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-eye bigger-130"></i>',
                      ['view','id' => $model->id],
                      [
                        'title'=>Yii::t('yii','View'),
                        'class' => 'btn btn-info btn-xs'
                      ]
                    );
                  },
                    
                  'update' => function($url,$model)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-pencil bigger-130"></i>',
                      $url,
                      [
                        'title'=>Yii::t('yii','Update'),
                        'class' => 'btn btn-primary btn-xs'
                      ]
                    );
                  },

                  'featured' => function($url,$model,$key)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-bookmark bigger-130"></i>',
                      $url, 
                      [
                        'title'=>Yii::t('yii','Featured'),
                        'class' => 'btn btn-warning btn-xs'
                      ]
                    );
                  },

                  'delete' => function($url,$model)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-trash-o bigger-130"></i>',
                      $url,
                      [
                        'title'=>Yii::t('yii','Delete'),
                        'data' => 
                        [
                          'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                          'method'=>'post'
                        ],
                        'class' => 'btn btn-danger btn-xs'
                      ]
                    );
                  },

                  'activate' => function($url,$model,$key)
                  {
                    return Html::a(
                      '<i class="ace-icon fa fa-flag bigger-130"></i>',
                      $url, 
                      [
                        'title'=>Yii::t('yii','Activate'),
                        'class' => 'btn btn-success btn-xs'
                      ]
                    );
                  },

                ],
              ],
            ],
          ]); ?>
        </div>
      </section>
    </div>
  </div>
</div>
