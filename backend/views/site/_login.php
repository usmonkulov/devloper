<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="container">
      <?php $form = ActiveForm::begin(['options' => ['class' => 'form-login']])?>
        <h2 class="form-login-heading"><?= Html::encode($this->title) ?></h2>
        <div class="login-wrap">
           <?php if ($model->scenario === 'lwe'): ?>
             <?= $form->field($model, 'email',['options' => [
                'tag' => 'div',
                'class' => 'form-group field-loginform-email has-feedback required'
            ],
             'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    {error}{hint}'
        ])->textInput(['placeholder' => Yii::t('app', 'Enter your e-mail'), 'autofocus' => true]) ?>
        <?php else: ?>
            <?= $form->field($model, 'username',['options' => [
                'tag' => 'div',
                'class' => 'form-group field-loginform-username has-feedback required'
            ],
            'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>
                    {error}{hint}'
        ])->textInput(['placeholder' => Yii::t('app', 'Enter your username'), 'autofocus' => true]) ?>
        <?php endif; ?>
          
          <?= $form->field($model, 'password',['options' => [
                'tag' => 'div',
                'class' => 'form-group field-loginform-password has-feedback required'
            ],
             'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    {error}{hint}'
        ])->passwordInput(['placeholder' => Yii::t('app', 'Enter your password')]) ?>
          
           
            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<span class=\"pull-left\">{input}</span> <span class=\"pull-left\">{label}</span>",
            ]) ?> 


            <div class="form-group field-loginform-rememberme">
               <?= Html::tag('span', Html::a(Yii::t('app', 'Forgot Password?'), ['site/request-password-reset']), ['class' => 'pull-right'])?>
            </div>

          <?= Html::submitButton('<i class="fa fa-lock"></i> Login', ['class' => 'btn btn-theme btn-block', 'name' => 'login-button']) ?>
          <hr>
          <div class="login-social-link centered">
            <p><?= Yii::t('app', 'If you forgot your password you can') ?></p>
            <!-- <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button> -->
          </div>
          <!-- <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div> -->
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      <?php ActiveForm::end(); ?>
    </div>
</div>
