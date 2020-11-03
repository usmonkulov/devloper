<?php
use common\rbac\models\AuthItem;
use kartik\password\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-user']); ?>
    
    <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="well">

            <?= $form->field($user, 'username')->textInput(
                    ['placeholder' => Yii::t('yii', 'Create username'), 'autofocus' => true]) ?>
            
            <?= $form->field($user, 'email')->input('email', ['placeholder' => Yii::t('yii', 'Enter e-mail')]) ?>

            <?php if ($user->scenario === 'create'): ?>

                <?= $form->field($user, 'password')->widget(PasswordInput::classname(), 
                    ['options' => ['placeholder' => Yii::t('yii', 'Create password')]]) ?>

            <?php else: ?>

                <?= $form->field($user, 'password')->widget(PasswordInput::classname(),
                         ['options' => ['placeholder' => Yii::t('yii', 'Change password ( if you want )')]]) ?> 

            <?php endif ?>

            <div class="row">
            <div class="col-md-6">

                <?= $form->field($user, 'status')->dropDownList($user->statusList) ?>

                <?php foreach (AuthItem::getRoles() as $item_name): ?>
                    <?php $roles[$item_name->name] = $item_name->name ?>
                <?php endforeach ?>
                <?= $form->field($user, 'item_name')->dropDownList($roles) ?>

            </div>
            </div>

            <div class="form-group">     
                <?= Html::submitButton($user->isNewRecord ? Yii::t('yii', 'Create') 
                    : Yii::t('yii', 'Update'), ['class' => $user->isNewRecord 
                    ? 'btn btn-success' : 'btn btn-primary']) ?>

                <?= Html::a(Yii::t('yii', 'Cancel'), ['user/index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>    
    </div>

    <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="well">
            <?php if($user->image):?>
            <?= $form->field($user, 'image', ['template' => (!$user->isNewRecord)?'{label}<label class="upload-users-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$user->image.'\')">{input}</label>':'{label}<label class="upload-users-label">{input}</label>','inputOptions' => ['class' => 'upload-users-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:250px'], ])->fileInput(); ?>
            <?php else:?>
                <?= $form->field($user, 'image', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'{label}<label class="upload-users-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$user->image.'\')">{input}</label>':'{label}<label class="upload-users-label">{input}</label>','inputOptions' => ['class' => 'upload-users-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;width:250px'], ])->fileInput(); ?>
            <?php endif?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
