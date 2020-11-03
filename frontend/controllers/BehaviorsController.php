<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BehaviorsController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','login', 'reg', 'send-email','activate-account','reset-password','about','view','update','index','cart-model','more-view','more','category-view','book-product','news','popular','search','most-read-more','profile'],
                'rules' => [
                    // SiteController index ochiq
                    // [
                    //     'allow' => true,
                    //     'controllers' => ['site'],
                    //     'actions' => ['index'],
                    //     'verbs' => ['GET', 'POST'],
                    // ],

                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['index', 'send-email', 'reset-password']
                    ],

                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['reg', 'login', 'activate-account'],
                        'verbs' => ['GET', 'POST'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['logout'],
                        'verbs' => ['POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['register'],
                        'actions' => ['change-password'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['about','news','popular','search','most-read-more','profile'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['category'],
                        'actions' => ['view','more-view'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['post'],
                        'actions' => ['view','more','category-view'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],

                    [
                        'allow' => true,
                        'controllers' => ['video'],
                        'actions' => ['index','view','more','more-view'],
                        'verbs' => ['GET','POST'],
                        'roles' => ['@']
                    ],

                    // BookCartController ochiq
                    [
                        'allow' => true,
                        'controllers' => ['book-cart'],
                        'actions' => ['cart-model','view'],
                        'verbs' => ['GET','POST'],
                    ],

                    // BookCategoryController ochiq

                    [
                        'allow' => true,
                        'controllers' => ['book-category'],
                        'actions' => ['index','view','search'],
                        'verbs' => ['GET', 'POST'],
                    ],

                    // BookAuthorController ochiq

                    [
                        'allow' => true,
                        'controllers' => ['book-author'],
                        'actions' => ['view'],
                        'verbs' => ['GET','POST'],
                    ],

                    // BookProductController ochiq
                    [
                        'allow' => true,
                        'controllers' => ['book-product'],
                        'actions' => ['view'],
                        'verbs' => ['GET','POST'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

     public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }  
}