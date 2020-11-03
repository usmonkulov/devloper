<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Information */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">

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

                        <?= $form->field($model, 'translate_address['.$language.']')->textarea(['row'=>2,'maxlength' => true])->label(Yii::t('yii','Address',null,$language)) ?>

                        <?= $form->field($model, 'translate_content['.$language.']')->widget(CKEditor::className(),[
                            'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
                        ])->label(Yii::t('yii','Content',null,$language));?>

                    </div>
                <?php $j++; } ?>
            </div>     

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
