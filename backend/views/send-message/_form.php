<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\SendMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'message')->widget(CKEditor::className(),[
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
                 ])->label(Yii::t('yii','Message')); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList([ '1' => Yii::t('yii','New message'), '0' => Yii::t('yii','Reviewed'), ]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
