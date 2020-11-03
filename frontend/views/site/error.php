<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
$this->title = $name;
?>
<div class="site-error">

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <?php try 
                        {
                          echo Breadcrumbs::widget(
                            [
                              'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("/")],
                              'tag' => 'ol',
                              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                              'options' => ['class' => 'page-header-breadcrumb'],
                              'encodeLabels' => false
                            ]
                          );
                        } catch ( Exception $e ) 

                        {
                          echo $e->getMessage();
                        } 
                        ?>
                    <h1><?=$this->title?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <!-- section -->
    <div class="section">
        
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>
            </div>
        </div>
           
    </div>
    <!-- /section -->

</div>
