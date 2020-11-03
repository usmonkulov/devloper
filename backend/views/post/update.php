<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

if($model->getTitle()):
  $this->title = Yii::t('yii','Update Post').': '.$model->getTitle().'';
else:
  $this->title = Yii::t('yii','Update Post').': '.Yii::t('yii', '(not set)').'';
endif;

$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Posts'), 'url' => ['index']];

if($model->getTitle()):
  $this->params['breadcrumbs'][] = ['label' => $model->getTitle(), 'url' => ['view', 'id' => $model->id]];
else:
  $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '(not set)'), 'url' => ['view', 'id' => $model->id]];
endif;

$this->params['breadcrumbs'][] = Yii::t('yii','Update');

?>
<div class="post-update">

   <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body minimal">
                	<h4 class="mb"><i class="fa fa-angle-right"></i> <?= Html::encode($this->title) ?></h4>
            	      <?= $this->render(
                      '_form', 
                      [
            	          'model' => $model,
            	        ]
                    ) ?>
                </div>
            </section>
        </div>
    </div>

</div>
