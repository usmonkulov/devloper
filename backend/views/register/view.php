<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Register */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Registers'), 'url' => ['index']];
if($this->title):
  $this->params['breadcrumbs'][] = $this->title;
else:
  $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '(not set)')];
endif;
\yii\web\YiiAsset::register($this);
?>
<div class="register-view">
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
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'username',
                        'email:email',
                        'phone',
                        [
                          'attribute'=>'status',
                          'format' => 'html',
                          'value' => ($model->getStatus($model->status))?$model->getStatus($model->status) : $model->status,
                        ],
                        'created_at:date',
                        'updated_at:date',
                    ],
                ]) ?>
            </div>
          </section>
        </div>
    </div>
</div>
