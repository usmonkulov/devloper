<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicityImage */

$this->title = $model->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Advertisings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="publicity-view">
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
                      'attribute'=>'title',
                      // 'label' => Yii::t('app','Title'),
                      'format' => 'raw',
                      'value'=> function ($model) {
                      return $model->getTitle();
                  },
                  ],
                  [
                  'attribute'=>'image',
                  'format'=>'raw', // raw, html
                  'value' => function($data)
                  {
                    if($data->image):
                      return ($data->image != NULL && $data->image != '' && !empty($data->image)) ? Html::a(Html::img(Yii::$app->urlManager->createUrl('../../frontend/web/'.$data->image), ['alt'=>$data->image,'style'=>'width:90%']),['../../frontend/web/'.$data->image]) : '';
                    else:
                      return (Html::img('@web/../../frontend/web/placeHolder/ad-2.jpg',['style'=>'width:82%']));
                    endif;
                  }
                ],
                'url:html',
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
