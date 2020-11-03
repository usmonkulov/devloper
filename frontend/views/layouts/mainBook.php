<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\CategoryWidget;
use frontend\components\NetworkWidget;
use frontend\components\MainLogoWidget;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\components\PostWidget;
use frontend\components\InformationWidget;
use frontend\models\Profile;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <div id="nav">
            <!-- Main Nav -->
            <div id="nav-fixed">
                <div class="container">
                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="/" class="logo">
                            <?= MainLogoWidget::widget()?>
                        </a>
                    </div>
                    <!-- /logo -->

                    <!-- nav -->
                    <ul class="nav-menu nav navbar-nav"> 
                        <li><a href="<?= \yii\helpers\Url::to(['/book-category'])?>"><?=Yii::t('yii','Books')?></a></li>
                        
                        <!-- <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i><?//= Yii::t('yii',' Cart')?></a>
                        <script>var show = '<?//= Url::to(['book-cart/show']); ?>';</script>
                        </li> -->
                    </ul>
                    <!-- /nav -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        
                        <!-- language -->
                        <?php if(Yii::$app->user->isGuest): ?>
                        <ul class="nav pull-left top-menu">
                           <li>
                            <a class="language dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                            <span class="fa fa-user"></span>
                            </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=\yii\helpers\Url::to(['site/login'])?>"><b><?=Yii::t('yii','Login')?></b></a></li>

                                    <li><a href="<?=\yii\helpers\Url::to(['site/reg'])?>"><b><?=Yii::t('yii','Registration')?></b></a></li>
                                </ul>
                           </li>
                        </ul>
                        <?php else: ?>
                            <ul class="nav pull-left top-menu">
                                <li>
                                <a class="language dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true">
                                <span class="fa fa-user"></span>
                                </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a>
                                                <?php  $profile = Profile::findOne(Yii::$app->user->identity->id);?>

                                                <?php if($profile->avatar):?>
                                                    <?= Html::img("@web/{$profile->avatar}",['class' => 'profile-image','alt' => Yii::$app->user->identity['username']])?>
                                                <?php else:?>
                                                    <?= Html::img("@web/placeHolder/author.png", ['class' => 'profile-image','alt' => Yii::$app->user->identity['username']])?>
                                                <?php endif?>  
                                                <b style="margin-left: 5px"><?= Yii::$app->user->identity['username']?></b>   
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <li><a data-method="POST" href="<?= \yii\helpers\Url::to(['register/profile?id='.Yii::$app->user->identity->id])?>"><b> <?=Yii::t('yii','My profile')?></b></a></li>

                                        <li><a data-method="POST" href="<?= \yii\helpers\Url::to(['register/change-password?id='.Yii::$app->user->identity->id])?>"><b> <?=Yii::t('yii','Change password')?></b></a></li>
                                        
                                        <li><a data-method="POST" href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><b> <?=Yii::t('yii','Logout')?></b></a></li>
                                    </ul>
                               </li>
                            </ul>
                        <?php endif?>
                        <!-- /endlanguage -->
                        <ul class="nav pull-left top-menu">
                            <li>
                               <a href="#" data-toggle="dropdown" class="language dropdown-toggle"><?=\frontend\components\LanguageDropdown::label(Yii::$app->language)?> <b class="caret"></b></a>
                               <?php
                                echo \frontend\components\LanguageDropdown::widget();
                               ?>  
                            </li>
                        </ul>
                        <a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i></a>
                        <script>var show = '<?= Url::to(['book-cart/show']); ?>';</script>
                        
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <form method="get" action="<?=\yii\helpers\Url::to(['/book-category/search'])?>">
                        <div class="search-form">
                                <input class="search-input" type="text" name="q" placeholder="<?=Yii::t('yii','Enter Your Search')?> ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                        </form>
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Main Nav -->

            <!-- Aside Nav -->
            <div id="nav-aside">
                <!-- nav -->
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><?=Yii::t('yii','Home')?></a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['/video'])?>"><?=Yii::t('yii','Video')?></a></li> 
                        <li><a href="<?= \yii\helpers\Url::to(['/book-category'])?>"><?=Yii::t('yii','Books')?></a></li>   
                        <li><a href="<?=\yii\helpers\Url::to(['/site/contact'])?>"><?=Yii::t('yii','Contact')?></a></li>
                    </ul>
                </div>
                <!-- /nav -->

                <!-- widget posts -->
                <div class="section-row">
                    <h3><?=Yii::t('yii','Recent Posts')?></h3>
                    <?= PostWidget::widget()?> 
                </div>
                <!-- /widget posts -->

                <!-- social links -->
                <div class="section-row">
                    <h3><?=Yii::t('yii','Follow us')?></h3>
                    <ul class="nav-aside-social">
                       <?= NetworkWidget::widget()?> 
                    </ul>
                </div>
                <!-- /social links -->

                <!-- aside nav close -->
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                <!-- /aside nav close -->
            </div>
            <!-- Aside Nav -->
        </div>
        <!-- /Nav -->
    </header>
    <!-- /Header -->

    <?//= Alert::widget() ?>
    
    <?= $content ?>

    <!-- Footer -->
    <footer id="footer">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="\" class="logo">
                                <?= MainLogoWidget::widget()?>
                            </a>
                        </div>
                        <div class="footer-copyright">
                            <?= InformationWidget::widget()?>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title"><?=Yii::t('yii','About Us')?></h3>
                                <ul class="footer-links">
                                    <!-- <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Join Us</a></li> -->
                                    <li>
                                        <a href="<?=\yii\helpers\Url::to(['/site/contact'])?>">
                                            <?=Yii::t('yii','Contact')?>
                                        </a>
                                    </li>
                                    <li>
                                        <a> <?= date('d.m.Y') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if( !empty(CategoryWidget::widget()) ): ?>
                            <div class="footer-widget">
                                <h3 class="footer-title"><?=Yii::t('yii','Catagories')?></h3>
                                <ul class="footer-links">
                                    <?= CategoryWidget::widget()?> 
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="footer-title"><?=Yii::t('yii','Join our Newsletter')?></h3>
                        <!-- <div class="footer-newsletter">
                            <form>
                                <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                                <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div> -->
                        <ul class="footer-social">
                            <?= NetworkWidget::widget()?> 
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /Footer -->

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>'.Yii::t('yii','Savatcha kassasi').'</h2>',
    'id' => 'bookCart',
    'size' => 'modal-lg', 
    'footer' =>' <button type="button" class="btn btn-default" data-dismiss="modal">'.Yii::t('yii','Xarid qilishni davom eting').'</button>
        <a href="' .\yii\helpers\Url::to(['book-cart/view']) . '" class="btn btn-success">'.Yii::t('yii','Xaridni Rasmiylashtirish').'</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">'.Yii::t('yii','Savatchani boshating').'</button>'
]);
\yii\bootstrap\Modal::end();
?>
<script>var delitem = '<?= Url::to(['book-cart/del-item']); ?>';</script>
<script>var clear = '<?= Url::to(['book-cart/clear']); ?>';</script>
<script>var add = '<?= \yii\helpers\Url::to(['book-cart/add', 'id' => $bookProduct->id]); ?>';</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
