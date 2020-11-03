<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Video */

$this->title = $model->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="video-view">
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

          <style>
            /* Ushbu element iframe ishlatadigan hajmni belgilaydi.
                Ushbu misolda biz 25:14 nisbatiga ega bo'lishni xohlaymiz */
            .aspect-ratio {
              position: relative;
              width: 100%;
              height: 0;
              padding-bottom: 56%; /* Endi elementning balandligi kenglikning 56% ni tashkil qiladi. */
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
                    'attribute'=>'url',
                    'value'=>"<div class='aspect-ratio'>{$model->url}</div>",
                    'format'=>'raw',
                ],
                'created_at',
                'updated_at',
                [
                    'attribute'=>'status',
                    // 'label' => Yii::t('app','Status'),
                    'format' => 'raw',
                    'value' => function($model){
                            if($model->status == 0){
                                return Yii::t('yii','Inactive');
                            }else{
                                return Yii::t('yii','Active');
                            }
                        },
                ],     
              ],
          ]) ?>
        </div>
      </section>
    </div>
  </div>
</div>
