<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BookProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii','Book Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-product-index">

    <h2 class="text-center "><?//= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
        'rowOptions' => function($model){
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
                'attribute'=>'name',
                'label'=>Yii::t('yii', 'Name'),
                'contentOptions' =>['width' => '100'],
                'headerOptions' => ['class' => 'info','width' => '100'],
                'filterOptions' => ['class' => 'success','width' => '100'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // Возможные варианты: raw, html
                 'value'=> function ($model) {
                    // if($model):
                        return $model->getName();
                    // else:
                    //     return Yii::t('yii', '(not set)');
                    // endif;
                },
            ],
            
            [
                'attribute'=>'book_category_id',
                'label'=>Yii::t('yii', 'Book Categories'),
                'headerOptions' => ['class' => 'info text-center','width' => '130'],
                'filterOptions' => ['class' => 'success text-center','width' => '130'],
                'contentOptions' =>['class' => 'text-center','width' => '130'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // Возможные варианты: raw, html
                'content'=>function($data){
                   return $data->bookCategory->getName();
                },
                'filter' => \backend\models\BookProduct::getBookCategoryList()
            ],

             [
                'attribute'=>'book_author_id',
                'label'=>Yii::t('yii', 'Book Author'),
                'headerOptions' => ['class' => 'info text-center','width' => '130'],
                'filterOptions' => ['class' => 'success text-center','width' => '130'],
                'contentOptions' =>['class' => 'text-center','width' => '130'],
                'options' => ['class' => 'table-bordered'],
                'format'=>'html', // Возможные варианты: raw, html
                'content'=>function($data){
                    if($data->bookAuthor):
                        return $data->bookAuthor->getFnf();
                    else:
                       return Yii::t('yii', '(not set)');
                    endif;
                },
                'filter' => \backend\models\BookProduct::getBookAuthorList()
            ],

            // 'content:html',
            // 'price',
            [
              'attribute' => 'price',
              'headerOptions' => ['class' => 'info text-center'],
              'filterOptions' => ['class' => 'success text-center'],
              'contentOptions' =>['class' => 'text-center'],
              'options' => ['class' => 'table-bordered'],
            ],
            //'keywords',
            //'description',
             [
                'attribute' => 'status',
                'headerOptions' => ['class' => 'info text-center','width' => '100'],
                'filterOptions' => ['class' => 'success text-center','width' => '100'],
                'contentOptions' =>['class' => 'text-center','width' => '100'],
                'options' => ['class' => 'table-bordered'],
                'label' => Yii::t('yii','Status'),
                'format' => 'raw',
                'content' => function($data){
                    if($data->status):
                        return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                    else:
                       return Yii::t('yii', '(not set)');
                    endif;
                },
                'filter'=>\backend\models\BookProduct::status(),
            ],
             [
                'attribute'=>'img',
                'contentOptions' =>['class' => 'text-center','width' => '100'],
                'headerOptions' => ['class' => 'info text-center','width' => '100'],
                'filterOptions' => ['class' => 'success text-center','width' => '100'],
                'label' => Yii::t('yii','Image'),
                'format' => 'raw',
                'content' => function($data){
                  if($data->img):
                    return ($data->img != NULL && $data->img != '' && !empty($data->img)) ? Html::a(Html::img(Yii::$app->urlManager->createUrl('../../frontend/web/'.$data->img),['style'=>'width:100px'], ['alt'=>$data->img]),['../../frontend/web/'.$data->img]) : '';
                  else:
                    return (Html::img('@web/placeHolder/book.png',['style'=>'width:100px']));
                  endif;
                }
              ],
            //'hit',
            //'new',
            //'sale',

           
            [
              'attribute' => 'created_at',
              'headerOptions' => ['class' => 'info text-center'],
              'filterOptions' => ['class' => 'success text-center'],
              'contentOptions' =>['class' => 'text-center'],
              'options' => ['class' => 'table-bordered'],
            ],

            [
              'attribute' => 'updated_at',
              'headerOptions' => ['class' => 'info text-center'],
              'filterOptions' => ['class' => 'success text-center'],
              'contentOptions' =>['class' => 'text-center'],
              'options' => ['class' => 'table-bordered'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['class' => 'table-bordered'],
                'header'=> Html::a(Yii::t('yii','Menu')), 
                'headerOptions' => ['class' => 'info text-center','width' => '114'],
                'filterOptions' => ['class' => 'success text-center','width' => '114'],
                'contentOptions' =>['class' => 'text-center','width' => '114',],
                'template' => '{view} {update} {delete} {activate}',
                'buttons' => [
                    'view' => function($url,$model){
                        return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],
                            [
                                'title'=>Yii::t('yii','View'),
                                'class'=>'green text-black',
                                'class' => 'btn btn-info btn-xs'
                            ]);
                    },
                    'update' => function($url,$model){
                        return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,
                            [
                                'title'=>Yii::t('yii','Update'),
                                'class'=>'green text-success',
                                'class' => 'btn btn-primary btn-xs'
                            ]);
                    },
                    'delete' => function($url,$model){
                        return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                            [
                                'title'=>Yii::t('yii','Delete'),
                                'data' => [
                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'method'=>'post'
                                ],
                                'class'=>'text-danger',
                                'class' => 'btn btn-danger btn-xs'
                            ]);
                    },
                    'activate' => function($url,$model,$key){
                        return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url, 
                            [
                                'title'=>Yii::t('yii','Activate'),
                                'class'=>'green text-success',
                                'class' => 'btn btn-success btn-xs'
                            ]);
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
