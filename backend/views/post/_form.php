<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="row">
      <div class="col-md-9">

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
                    <?= $form->field($model, 'translate_description['.$language.']')->textarea(['row'=>2,'maxlength' => true])->label(Yii::t('yii','Description',null,$language)) ?>
                    <?= $form->field($model, 'translate_content['.$language.']')->widget(CKEditor::className(),[
                        'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
                 ])->label(Yii::t('yii','Content',null,$language));?>

                </div>
            <?php $j++; } ?>
        </div>
        </div>
        <div class="col-md-3">
          <?= $form->field($model, 'category_id')->widget(Select2::classname(), 
          [
            'data' => $model->getCategoryList(),
            'language' => 'en',
            'options' => ['placeholder' => Yii::t('yii','Category select')],
            'pluginOptions' => [
              'allowClear' => true
          ],
        ])?>

            <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'{label}<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image.'\')">{input}</label>':'{label}<label class="upload-label">{input}</label>','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:220px'], ])->fileInput(); ?>

            <?= $form->field($model, 'image_most_read', ['template' => (!$model->isNewRecord)?'{label}<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image_most_read.'\')">{input}</label>':'{label}<label class="upload-label">{input}</label>','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:220px'], ])->fileInput(); ?>

            <?= $form->field($model, 'status')->checkbox([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>

            <?= $form->field($model, 'featured_posts')->checkbox() ?>

            <div class="form-group">
                 <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?= $form->errorSummary($model)?>

    <?php ActiveForm::end(); ?>

</div>
  

