<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainLogo */

$this->title = Yii::t('yii', 'Create Main Logo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Main Logos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-logo-create">

    <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body minimal">
                	<h4 class="mb">
                		<i class="fa fa-angle-right"></i> 
                		<?= Html::encode($this->title) ?>
                	</h4>
					<?= $this->render('_form', ['model' => $model]) ?>
                </div>
            </section>
        </div>
    </div>

</div>
