<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

  <?php $form = ActiveForm::begin(); ?>

    <?php
        $languages = Yii::$app->params['languages'];
        $i = 0;
    ?>
    
    <ul class="nav nav-tabs">
      <?php foreach ($languages as $language => $label): ?>
        <li class="<?= ($i==0)?'active':'' ?>">
          <a data-toggle="tab" href="#<?=$language?>">
            <?=$label?>    
          </a>
        </li>
      <?php $i++; endforeach; ?>
    </ul>
    
    <div class="tab-content">
      <?php $j=0; foreach ($languages as $language => $label): ?>
        <div id="<?=$language?>" class="tab-pane fade in <?= ($j==0)?'active':'' ?>">

          <?= $form->field($model, 'translate_title['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Title',null,$language)) ?>

        </div>

      <?php $j++; endforeach; ?>
    </div>
  
    <div class="row">
    	<div class="col-md-6">
        
        <?= $form->field($model, 'color')->radioList(
          [ 
            '1' => Yii::t('yii','cat-1'), 
            '2' => Yii::t('yii','cat-2'), 
            '3' => Yii::t('yii','cat-3'), 
            '4' => Yii::t('yii','cat-4'),
          ]
        ) ?>

    		<?= $form->field($model, 'status')->checkbox([ '1' => Yii::t('yii','Active'), '0' => Yii::t('yii','Inactive'), ]) ?>
    	</div>
    </div>
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Save') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  
    <?= $form->errorSummary($model)?>
    
  <?php ActiveForm::end(); ?>

</div>
