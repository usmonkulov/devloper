<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\BookProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_category_id')->widget(Select2::classname(), [
        'data' => $model->getBookCategoryList(),
        'language' => 'en',
        'options' => ['placeholder' => 'Book Category a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'book_author_id')->widget(Select2::classname(), [
        'data' => $model->getBookAuthorList(),
        'language' => 'en',
        'options' => ['placeholder' => 'Book Author a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

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

                    <?= $form->field($model, 'translate_name['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Name',null,$language)) ?>

                    <?= $form->field($model, 'translate_keywords['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Keywords',null,$language)) ?>

                    <?= $form->field($model, 'translate_description['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Description',null,$language)) ?>

                    <?= $form->field($model, 'translate_content['.$language.']')->widget(CKEditor::className())->label(Yii::t('yii','Content',null,$language));?>
                </div>
            <?php $j++; } ?>
        </div>

    <?= $form->field($model, 'price')->textInput() ?>
    <?php if($model->img):?>
    <?= $form->field($model, 'img', ['template' => (!$model->isNewRecord)?'{label}<label class="bookproduct-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->img.'\')">{input}{error}{hint}</label>':'{label}<label class="bookproduct-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'bookproduct-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:250px'], ])->fileInput(); ?>
    <?php else:?>
    <?= $form->field($model, 'img', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'{label}<label class="bookproduct-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->img.'\')">{input}{error}{hint}</label>':'{label}<label class="bookproduct-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'bookproduct-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:250px'], ])->fileInput(); ?>
    <?php endif?>
     <?= $form->field($model, 'status')->radioList([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
