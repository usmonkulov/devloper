<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $languages = Yii::$app->params['languages'];
        $i = 0;
    ?>
    <ul class="nav nav-tabs">
        <?php foreach ($languages as $language => $label) { ?>
            <li class="<?= ($i==0)?'active':'' ?>"><a data-toggle="tab" href="#<?=$language?>"><?=$label?></a></li>
        <?php $i++; } ?>
    </ul>
    <div class="tab-content">
        <?php $j=0; foreach ($languages as $language => $label) { ?>
            <div id="<?=$language?>" class="tab-pane fade in <?= ($j==0)?'active':'' ?>">

               <?= $form->field($model, 'translate_title['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Title',null,$language)) ?>

            </div>

         <?php $j++; } ?>
     </div>

    <?= $form->field($model, 'url')->textarea(['rows' => 3, 'placeholder' => Yii::t('yii', 'https://www.youtube.com')]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
