<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SendMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Appeals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-message-index">

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
        'options' => ['class' => 'panel grid-view table-responsive'],
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

            // 'id',
            [
              'attribute' => 'email',
              'headerOptions' => ['class' => 'info'],
              'filterOptions' => ['class' => 'success'],
              // 'contentOptions' =>['class' => 'text-center'],
              'footerOptions' =>['class' => 'danger'],
              'format' => 'email',
                
            ],

            [
              'attribute' => 'subject',
              'headerOptions' => ['class' => 'info'],
              'filterOptions' => ['class' => 'success'],
              // 'contentOptions' =>['class' => 'text-center'],
              'footerOptions' =>['class' => 'danger'],
              'format' => 'html',
                
            ],

            [
              'attribute' => 'message',
              'headerOptions' => ['class' => 'info'],
              'filterOptions' => ['class' => 'success'],
              // 'contentOptions' =>['class' => 'text-center'],
              'footerOptions' =>['class' => 'danger'],
              'format' => 'html',
                
            ],
        
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
                'label' => Yii::t('yii','Status'),
                'attribute' => 'status',
                'headerOptions' => ['class' => 'info text-center'],
                'filterOptions' => ['class' => 'success text-center'],
                'contentOptions' =>['class' => 'text-center'],
                'options' => ['class' => 'table-bordered'],
                'format' => 'raw',
                'filter' => ['0'=> Yii::t('yii','Reviewed'),'1'=> Yii::t('yii','New message')],
                'value' => function($model){
                    if($model->status == 0){
                        return Html::label(Yii::t('yii','Reviewed'),
                            $model->status,
                            [
                                'class'=>'label label-success',
                            ]
                        );
                    }else{
                        return Html::label(Yii::t('yii','New message'),
                            $model->status,
                            [
                                'class' => 'label label-danger',
                            ]
                        );
                    }
                },
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
