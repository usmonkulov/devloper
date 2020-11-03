<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BookProduct */

$this->title = $model->getName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Book Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-product-view">

    <div class="row mt">
      <div class="col-sm-12">
        <section class="panel">
            
          <header class="panel-heading wht-bg">
            <p>
                <?= Html::a('<i class="fa fa-pencil"></i> '.Yii::t('yii','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
               
                <?= Html::a('<i class="fa fa-share-square-o"></i> '.Yii::t('yii', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
               
                <?= Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <h4 class="gen-case">
                <?= Html::encode($this->title) ?>
            </h4>
          </header>
          <div class="panel-body minimal">
             <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                     [
                          'label'=> Yii::t('yii', 'Book Category'),
                          'attribute'=>'book_category_id',
                          // 'label' => Yii::t('app','Title'),
                          'format' => 'html',
                          'value'=> function ($model) {
                            return $model->bookCategory->getName();
                        },
                      ],

                      [
                          'attribute'=>'book_author_id',
                          'label'=>Yii::t('yii', 'Book Author'),
                          'format'=>'html', // Возможные варианты: raw, html
                          'value'=>function($model){
                            if($model->bookAuthor):
                              return $model->bookAuthor->getFnf();
                            endif;
                          },
                      ],

                    [
                        'attribute'=>'name',
                        // 'label' => Yii::t('app','Title'),
                        'format' => 'html',
                        'value'=> function ($model) {
                        return $model->getName();
                    },
                    ],
                    [
                        'attribute'=>'content',
                        // 'label' => Yii::t('app','Title'),
                        'format' => 'html',
                        'value'=> function ($model) {
                        return $model->getContent();
                    },
                    ],

                    'price',
                     [
                          'attribute'=>'description',
                          // 'label' => Yii::t('app','Title'),
                          'format' => 'html',
                          'value'=> function ($model) {
                          return $model->getDescription();
                      },
                    ],
                     [
                          'attribute'=>'keywords',
                          // 'label' => Yii::t('app','Title'),
                          'format' => 'html',
                          'value'=> function ($model) {
                          return $model->getKeywords();
                      },
                    ],
              
                     [
                        'attribute'=>'img',
                        // 'label' => Yii::t('app','Image'),
                        'format' => 'raw',
                        'value' => function($data){
                          if($data->img):
                            return ($data->img != NULL && $data->img != '' && !empty($data->img)) ? Html::a(Html::img(Yii::$app->urlManager->createUrl('../../frontend/web/'.$data->img), ['alt'=>$data->img,'style'=>'width:40%']),['../../frontend/web/'.$data->img]) : '';
                          else:
                            return (Html::img('@web/placeHolder/book.png',['style'=>'width:40%']));
                          endif;
                        }
                    ],
                    'hit',
                    'new',
                    'sale',
                    'created_at',
                    'updated_at',
                    [
                        'attribute'=>'status',
                        // 'label' => Yii::t('app','Status'),
                        'format' => 'raw',
                        'value' => function($data){
                             return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                        },
                    ],
                ],
            ]) ?>
          </div>
        </section>
      </div>
  </div>

</div>
