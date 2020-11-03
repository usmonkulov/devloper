<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BookAuthor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-author-form">

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

               <?= $form->field($model, 'translate_fnf['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Fnf',null,$language)) ?>

            </div>

        <?php $j++; } ?>
    </div>

    <?= $form->field($model, 'status')->radioList([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->errorSummary($model)?>

    <?php ActiveForm::end(); ?>

</div>
