<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainLogo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-logo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->image):?>
    <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'{label}<label class="uploadlogo-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image.'\')">{input}{error}{hint}</label>':'{label}<label class="uploadlogo-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'uploadlogo-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:260px'], ])->fileInput(); ?>
    <?php else:?>
    <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'{label}<label class="uploadlogo-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image.'\')">{input}{error}{hint}</label>':'{label}<label class="uploadlogo-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'uploadlogo-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:260px'], ])->fileInput(); ?>
	<?php endif?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
