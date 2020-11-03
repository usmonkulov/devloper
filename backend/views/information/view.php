<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Information */

$this->title = $model->getTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Informations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-view">

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
                          'attribute'=>'title',
                          // 'label' => Yii::t('app','Title'),
                          'format' => 'html',
                          'value'=> function ($model) {
                          return $model->getTitle();
                      },
                    ],
                    [
                          'attribute'=>'content',
                          // 'label' => Yii::t('app','Content'),
                          'format' => 'html',
                          'value'=> function ($model) {
                          return $model->getContent();
                      },
                    ],
                    'email:email',
                    'phone',
                    [
                          'attribute'=>'address',
                          // 'label' => Yii::t('app','Address'),
                          'format' => 'html',
                          'value'=> function ($model) {
                          return $model->getAddress();
                      },
                    ],
                    // 'address:html',
                    [
                        'attribute'=>'status',
                        // 'label' => Yii::t('app','Status'),
                        'format' => 'raw',
                        'value' => function($data){
                             return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                        },
                    ],
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
          </div>
        </section>
      </div>
    </div>

</div>
