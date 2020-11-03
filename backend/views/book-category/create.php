<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BookCategory */

$this->title = Yii::t('yii', 'Create Book Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Book Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-create">

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
