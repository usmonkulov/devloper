<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BookAuthor */

$this->title = $model->getFnf();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Book Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-author-view">

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
                  'attribute'=>'fnf',
                  'format' => 'html',
                  'value'=> function ($model) {
                      return $model->getFnf();
                  },
                ],
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
