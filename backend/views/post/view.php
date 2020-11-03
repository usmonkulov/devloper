<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Posts'), 'url' => ['index']];
if($this->title):
  $this->params['breadcrumbs'][] = $this->title;
else:
  $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '(not set)')];
endif;
?>
<div class="post-view">
  <div class="row mt">
    <div class="col-sm-12">
      <section class="panel">    
        <header class="panel-heading wht-bg">
          <p>
            <?= Html::a(
              '<i class="fa fa-pencil"></i> '.Yii::t('yii','Update'), 
              ['update', 'id' => $model->id], 
              ['class' => 'btn btn-primary']) 
            ?>

            <?= Html::a(
              '<i class="fa fa-share-square-o"></i> '.Yii::t('yii', 'Back'), 
              ['index'], ['class' => 'btn btn-success']) 
            ?>
               
            <?= Html::a(
              '<i class="fa fa-trash-o"></i> '.Yii::t('yii', 'Delete'), 
              ['delete', 'id' => $model->id], 
              [
                'class' => 'btn btn-danger',
                'data' => [
                  'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                  'method' => 'post',
                ],
              ]
            ) ?>
          </p>
          <h4 class="gen-case">
            <?= Html::encode($this->title) ?>
          </h4>
        </header>

        <div class="panel-body minimal">
          <?= DetailView::widget(
            [
              'model' => $model,
              'attributes' => 
              [
                'id',
                [
                  'attribute'=>'title',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    return $model->getTitle();
                  },
                ],

                [
                  'attribute'=>'description',
                  // 'label' => Yii::t('app','Description'),
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    return $model->getDescription();
                  },
                ],

                [
                  'attribute'=>'content',
                  'format' => 'html',
                  'value'=> $model->getContent(),
                ],

                [
                  'attribute'=>'image',
                  'format'=>'raw', // raw, html
                  'value' => function($data)
                  {
                    if($data->image):
                      return ($data->image != NULL && $data->image != '' && !empty($data->image)) ? Html::a(Html::img(Yii::$app->urlManager->createUrl('../../frontend/web/'.$data->image), ['alt'=>$data->image,'style'=>'width:70%']),['../../frontend/web/'.$data->image]) : '';
                    else:
                      return (Html::img('@web/placeHolder/placeHolder.png',['style'=>'width:70%']));
                    endif;
                  }
                ],

                [
                  'attribute' => 'user.username',
                  'label'=> Yii::t('yii', 'User')
                ],
                [
                  'label'=> Yii::t('yii', 'Category'),
                  'attribute'=>'category_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->category):
                      return $model->category->getTitle();
                    else:
                      return Yii::t('yii', '(not set)');
                    endif;
                  },
                ],
                
                'view',
                
                [
                  'attribute'=>'status',
                  'format' => 'html',
                  'value' => ($model->getStatus($model->status))?$model->getStatus($model->status) : $model->status,
                ],
                
                'created_at',
                'updated_at',
              ],
            ]
          ) ?>
        </div>
      </section>
    </div>
  </div>
</div>
