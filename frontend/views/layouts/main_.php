<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\CategoryWidget;

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
                            <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
                        </div>
                        <!-- /logo -->

                        <!-- nav -->
                        <ul class="nav-menu nav navbar-nav">
                            <li><a href="/">News</a></li>
                            <?= CategoryWidget::widget()?> 
                            <li><a href="/book-category">Book</a></li>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i><?= Yii::t('yii',' Cart')?></a></li>
                        </ul>
                        <!-- /nav -->


                        <!-- search & aside toggle -->
                        <div class="nav-btns">
                            <button class="aside-btn"><i class="fa fa-bars"></i></button>
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                            <div class="search-form">
                                <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                                <button class="search-close"><i class="fa fa-times"></i></button>
                            </div>
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
                            <li><a href="/">Home</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/about'])?>">About Us</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/reg'])?>">Registratsiya</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/login'])?>">Login</a></li>
                            <li><a href="/book-category">Book</a></li>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i><?= Yii::t('yii',' Cart')?></a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/video'])?>">Video</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/contact'])?>">Contacts</a></li>
                            <?php if(!Yii::$app->user->isGuest): ?>
                              <li><a data-method="POST" href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Chiqish)</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <!-- /nav -->

                    <!-- widget posts -->
                    <div class="section-row">
                        <h3>Recent Posts</h3>
                        <?= \frontend\components\PostWidget::widget()?> 
                    </div>
                    <!-- /widget posts -->

                    <!-- social links -->
                    <div class="section-row">
                        <h3>Follow us</h3>
                        <ul class="nav-aside-social">
                           <?= \frontend\components\NetworkWidget::widget()?> 
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

        <div class="section">
          <div class="container">
              <?php try {
                  echo Breadcrumbs::widget([
                      'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("/")],
                      'tag' => 'ol',
                      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                      'options' => ['class' => 'breadcrumb'],
                      'encodeLabels' => false
                  ]);
              } catch ( Exception $e ) {
                  echo $e->getMessage();
              } ?>
               <?= Alert::widget() ?>
              <?= $content ?>
          </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
                            </div>
                            <ul class="footer-nav">
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Advertisement</a></li>
                            </ul>
                            <div class="footer-copyright">
                                <span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">About Us</h3>
                                    <ul class="footer-links">
                                        <li><a href="<?=\yii\helpers\Url::to(['/'])?>">Home</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/book-category'])?>">Book</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/video'])?>">Video</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['/site/contact'])?>">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Catagories</h3>
                                    <ul class="footer-links">
                                       <?= CategoryWidget::widget()?> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Join our Newsletter</h3>
                            <div class="footer-newsletter">
                                <form>
                                    <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                                    <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                            <ul class="footer-social">
                                <?= \frontend\components\NetworkWidget::widget()?> 
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
        <a href="' .\yii\helpers\Url::to(['book-cart/view']) . '" class="btn btn-success">'.Yii::t('yii','Buyurtma bering').'</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">'.Yii::t('yii','Savatchani boshating').'</button>'
]);
\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
