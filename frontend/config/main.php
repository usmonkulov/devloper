<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'frontend\models\Register',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login']
            // 'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'i18n' => [
            'translations' => [
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    'fileMap' => [
                        'yii' => 'yii.php'
                    ],
                ],
            ],
        ],
       
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'uz', 'ru', 'oz'],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html',
            'rules' => [

                'more/page/<page:>'=>'video/more',
                'video/<id:\d+>'=>'video/view',
                
                'video/more-view/<id:\d+>/page/<page:\d+>'=>'video/more-view',
                'video/more-view/<id:\d+>'=>'video/more-view',
                'video'=>'video/index',
                
                'more/page/<page:\d+>'=>'post/more',
                'more'=>'post/more',
                
                'category-view/<id:\d+>'=>'post/category-view',
                'post/<id:\d+>'=>'post/view',
                

                'category/<id:\d+>'=>'category/view',
                'book-category/<id:\d+>'=>'book-category/view',  
                'book-category/'=>'book-category/index',  
                'book-category/<id:\d+>'=>'book-category/view',  
                'book-category/<q:\d+>'=>'book-category/search',  
                // [
                //     'pattern' => 'book-category',
                //     'route' => 'book-category/search'
                // ],
                'book-author/<id:\d+>'=>'book-author/view',  
                'book-product/<id:\d+>'=>'book-product/view',  

                'search'=>'site/search',

                'news'=>'site/news',
                'contact'=>'site/contact',
                
                '/'=>'/site/index',
                'send-email'=>'site/send-email',
                'reset-password'=>'site/reset-password',
                'registration'=>'site/reg',
                'login'=>'site/login',

                'featured-posts-more/page/<page:\d+>'=>'site/featured-posts-more',
                'featured-posts'=>'site/featured-posts',

                'news-more/page/<page:\d+>'=>'site/news-more',
                'news-more'=>'site/news-more',

                'most-read-more/page/<page:\d+>'=>'site/most-read-more',
                'most-read-more' => 'site/most-read-more',

                'more-view/<id:\d+>/page/<page:\d+>'=>'category/more-view',
                'more-view/<id:\d+>'=>'category/more-view',

                'featured-posts-more' => 'site/featured-posts-more',
            ],
        ],
    
    ],
    'params' => $params,
];
