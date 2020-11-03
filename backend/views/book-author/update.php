<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BookAuthor */

$this->title = Yii::t('yii','Update Book Author').': {'.$model->getFnf().'}';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Book Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFnf(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii','Update');
?>
<div class="book-author-update">

   <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body minimal">
                	<h4 class="mb"><i class="fa fa-angle-right"></i> <?= Html::encode($this->title) ?></h4>
	      <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
                </div>
            </section>
        </div>
    </div>

</div>
