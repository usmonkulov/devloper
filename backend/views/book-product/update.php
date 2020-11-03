<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BookProduct */

$this->title = Yii::t('yii','Update Book Product').': {'.$model->getName().'}';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Book Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getName(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii','Update');
?>
<div class="book-product-update">

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
