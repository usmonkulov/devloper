<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicityImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicity-form">

    <?php $form = ActiveForm::begin(); ?>

    	   <?php if($model->image):?>
    		<?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'{label}<label class="upload-publicity-image-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image.'\')">{input}{error}{hint}</label>':'{label}<label class="upload-publicity-image-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:728px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'{label}<label class="upload-publicity-image-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'../../frontend/web/'.$model->image.'\')">{input}{error}{hint}</label>':'{label}<label class="upload-publicity-image-label">{input}{error}{hint}</label>','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:728px'], ])->fileInput(); ?>
            <?php endif;?>

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

		    <?= $form->field($model, 'url')->textarea(['placeholder' => Yii::t('yii','https://www.reklama.uz')]) ?>

		    <?= $form->field($model, 'status')->checkbox([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
