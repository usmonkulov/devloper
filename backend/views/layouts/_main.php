<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

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

 <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/admin" class="logo"><b>ADMI<span>NKA</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <!-- <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <!-- <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="/admin/img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="/admin/img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="/admin/img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="/admin/img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li> -->
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <!-- <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li> -->
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
         <?php Yii::$app->language = 'en';
 $languageItem = new cetver\LanguageSelector\items\DropDownLanguageItem([
     'languages' => [
         'en' => '<span class="flag-icon flag-icon-us"></span> English',
         'ru' => '<span class="flag-icon flag-icon-ru"></span> Russian',
         'uz' => '<span class="flag-icon flag-icon-uz"></span> O\'zbekcha',
     ],
     'options' => ['encode' => false],
 ]);
 $languageItem = $languageItem->toArray();
 $languageDropdownItems = \yii\helpers\ArrayHelper::remove($languageItem, 'items');
 echo \yii\bootstrap\ButtonDropdown::widget([
     'label' => $languageItem['label'],
     'encodeLabel' => false,
     'options' => ['class' => 'btn-default pull-right'],
     'dropdown' => [
         'items' => $languageDropdownItems
     ]
 ]);?>
        <ul class="nav pull-right top-menu">
           <li><a data-method="POST" class="logout" href="<?= Url::to(['/site/logout'])?>">Tizimdan chiqish</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="/admin"><img src="/admin/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <?php $controller = Yii::$app->controller->id; ?>
                <li class="mt">
                    <a class="<?= ($controller=='site')?'active':''?>" href="/admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='category')?'active':''?>" href="<?= Url::to(['category/'])?>">
                        <i class="fa fa-list"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="<?= ($controller=='post')?'active':''?>" href="<?= Url::to(['post/'])?>" >
                        <i class="fa fa-newspaper-o"></i>
                        <span>Posts</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='information')?'active':''?>"  href="<?= Url::to(['information/'])?>">
                        <i class="fa fa-tags"></i>
                        <span>Information</span>
                    </a>
                </li>
                <li>
                    <a  class="<?= ($controller=='send-message')?'active':''?>"  href="<?= Url::to(['send-message/'])?>">
                        <i class="fa fa-file-text-o"></i>
                        <span>Send Message</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='video')?'active':''?>"  href="<?= Url::to(['video/'])?>">
                        <i class="fa fa-film"></i>
                        <span>Videos</span>
                    </a>
                </li>

                 <li>
                    <a  class="<?= ($controller=='publicity')?'active':''?>"  href="<?= Url::to(['publicity/'])?>">
                        <i class="fa fa-list-alt"></i>
                        <span>Publicity 300x250</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='social-networks')?'active':''?>"  href="<?= Url::to(['social-networks/'])?>">
                        <i class="fa fa-list-alt"></i>
                        <span>Social Networks</span>
                    </a>
                </li>

                 <li>
                    <a  class="<?= ($controller=='book-category')?'active':''?>"  href="<?= Url::to(['book-category/'])?>">
                        <i class="fa fa-th-large"></i>
                        <span>BookCategory</span>
                    </a>
                </li>
                
                 <li>
                    <a  class="<?= ($controller=='book-product')?'active':''?>"  href="<?= Url::to(['book-product/'])?>">
                        <i class="fa fa-list-alt"></i>
                        <span>BookProduct</span>
                    </a>
                </li>

                <li>
                    <a  class="<?= ($controller=='book-author')?'active':''?>"  href="<?= Url::to(['book-author/'])?>">
                        <i class="fa fa-list-alt"></i>
                        <span>BookAuthor</span>
                    </a>
                </li>

          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- BREADCRUMBS AREA START -->
        <h1 class="breadcrumbs-title"><?//=$this->title?></h1>
        <?php try {
            echo Breadcrumbs::widget([
                'homeLink' => ['label' => '<i class="fa fa-dashboard"></i> '.Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("/")],
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'breadcrumb panel'],
                'encodeLabels' => false
            ]);
        } catch ( Exception $e ) {
            echo $e->getMessage();
        } ?>
        <!-- BREADCRUMBS AREA END -->
        <?= $content ?>
      </section>
    </section>
  </section>
   <!--main content end-->
    <!--footer start-->
   <!--  <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits"> -->
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          <!-- Created with Dashio template by <a href="/admin">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer> -->
    <!--footer end-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
