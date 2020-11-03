<?php
namespace frontend\controllers;

use Yii;
use frontend\models\RegForm;
use frontend\models\LoginForm;
use frontend\models\Register;
use frontend\models\Profile;
use frontend\models\SendEmailForm;
use frontend\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\AccountActivation;
use frontend\models\Post;
use frontend\models\Publicity;
use frontend\models\PublicityImage;
use frontend\models\ContactForm;
use frontend\models\Information;
use frontend\models\Category;
use yii\data\Pagination;
use frontend\models\City;
use yii\web\UploadedFile;

class SiteController extends BehaviorsController
{
   /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {   
        $this->setMeta(Yii::t('yii','Home'));

        $posts2 = Post::find()->where(['status' => '1'])->limit(2)->orderBy(['id' => SORT_DESC])->all();

        $posts6 = Post::find()->where(['status' => '1'])->limit(6)->offset(2)->orderBy(['id' => SORT_DESC])->all();
        $posts1 = Post::find()->where(['status' => '1'])->limit(1)->offset(8)->orderBy(['id' => SORT_DESC])->all();
        $posts61 = Post::find()->where(['status' => '1'])->limit(6)->offset(7)->orderBy(['id' => SORT_DESC])->all();
        $featured_posts2 = Post::find()->where(['status' => '1','featured_posts' => '1'])->limit(2)->orderBy(['updated_at' => SORT_DESC])->all();
        $featured_posts3 = Post::find()->where(['status' => '1','featured_posts' => '1'])->limit(3)->offset(2)->orderBy(['updated_at' => SORT_DESC])->all();
        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();
        $postsview41 = Post::find()->where(['status' => '1'])->limit(4)->offset(4)->orderBy(['view' => SORT_DESC])->all();
        
        // Reklama Home Birinchi
        $publicitys1 = Publicity::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();
        // Reklama Home Ikkinchi
        $publicitys2 = Publicity::find()->where(['status' => '1'])->limit(1)->offset(1)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', compact('posts2','posts6','posts1','posts61','featured_posts2','featured_posts3','postsview4','postsview41','publicitys1','publicitys2'));
    }

    public function actionMostReadMore(){

        $this->setMeta(Yii::t('yii','Most Read'));

        $query = Post::find()->orderBy(['view' => SORT_DESC])->where(['status'=> '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $postsmore = $query->offset($pages->offset)->limit($pages->limit)->all();

        // Reklama Home Birinchi
        $publicitys1 = Publicity::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('most-read-more', compact('postsmore','pages','publicitys1'));
    }

    public function actionProfile()
    {
        $model = ($model = Profile::findOne(Yii::$app->user->id)) ? $model : new Profile();

        if($model->load(Yii::$app->request->post()) && $model->validate()):

            if($file = UploadedFile::getInstance($model,'avatar')){
                $model->avatar = $model->upload(strtolower(Yii::$app->controller->id).'ss',$file);
                if(file_exists($model->getOldAttribute('avatar')))
                    unlink($model->getOldAttribute('avatar'));
            }else{
                $model->avatar = $model->getOldAttribute('avatar');
            }

            $model->updateProfile();
            
            if($model->save()):
                Yii::$app->session->setFlash('success', Yii::t('yii', 'Profile changed'));
            else:
                Yii::$app->session->setFlash('error', Yii::t('yii', 'Profile not changed'));
                Yii::error(Yii::t('yii', 'Error writing. Profile not changed'));
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'profile',
            [
                'model' => $model
            ]
        );
    }

    public function actionReg()
    {
        $this->setMeta(Yii::t('yii','Registration'));
        
        $emailActivation = Yii::$app->params['emailActivation'];
        $model = $emailActivation ? new RegForm(['scenario' => 'emailActivation']) : new RegForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === Register::STATUS_ACTIVE):
                    if (Yii::$app->getRegister()->login($user)):
                        return $this->goHome();
                    endif;
                else:
                    if($model->sendActivationEmail($user)):
                        Yii::$app->session->setFlash('success', Yii::t('yii', 'Activation email sent to email'), Html::encode($user->email).'</strong> ('.Yii::t('yii', 'check spam folder').').');
                    else:           
                        Yii::$app->session->setFlash('error', Yii::t('yii', 'Error. Email not sent.'));
                        Yii::error(Yii::t('yii', 'Error sending email.'));
                    endif;
                    return $this->refresh();
                endif;
            else:
                Yii::$app->session->setFlash('error', Yii::t('yii', 'An error occurred while registering.'));
                Yii::error(Yii::t('yii', 'Registration error.'));
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'reg',
            [
                'model' => $model,
            ]
        );
    }

    public function actionActivateAccount($key)
    {
        try {
            $user = new AccountActivation($key);
        }
        catch(InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if($user->activateAccount()):
            Yii::$app->session->setFlash('success', Yii::t('yii', 'Activation was successful.').' <strong>'.Html::encode($user->username).'</strong>'. Yii::t('yii', ' you are now with ').' WEBMAG');
        else:
            Yii::$app->session->setFlash('error', Yii::t('yii', 'Activation error.'));
            Yii::error(Yii::t('yii', 'Error during activation.'));
        endif;

        return $this->redirect(Url::to(['/site/login']));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/site/index']);
    }

    public function actionLogin()
    {
        $this->setMeta(Yii::t('yii','Login'));

        if (!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;

        $loginWithEmail = Yii::$app->params['loginWithEmail'];

        $model = $loginWithEmail ? new LoginForm(['scenario' => 'loginWithEmail']) : new LoginForm();


        if ($model->load(Yii::$app->request->post()) && $model->login()):
            return $this->goBack();
        endif;


        return $this->render(
            'login',
            [
                'model' => $model,
            ]
        );
    }
    

    public function actionSendEmail()
    {   
        $this->setMeta(Yii::t('yii','Send Email'));
        $model = new SendEmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->sendEmail()):
                    Yii::$app->getSession()->setFlash('warning', Yii::t('yii', 'Check your email.'));
                    // return $this->goHome();
                    return $this->redirect(['/site/send-email']);
                else:
                    Yii::$app->getSession()->setFlash('error', Yii::t('yii', 'Password cannot be reset.'));
                endif;
            }
        }

        return $this->render('sendEmail', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($key)
    {
        $this->setMeta(Yii::t('yii','Reset Password'));
        try {
            $model = new ResetPasswordForm($key);
        }
        catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->resetPassword()) {
                Yii::$app->getSession()->setFlash('warning', Yii::t('yii', 'Password changed.'));
                return $this->redirect(['/site/login']);
            }
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->setMeta(Yii::t('yii','Contact'));
        $model = new ContactForm();
        $informations = Information::find()->limit(1)->orderBy(['id' => SORT_DESC])->all();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
            Yii::$app->session->setFlash('success', Yii::t('yii', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            return $this->refresh();
            }else{
            Yii::$app->session->setFlash('error', Yii::t('yii', 'There was an error sending your message.'));
            }
        }
        return $this->render('contact', compact('model', 'informations'));
    }

    public function actionFeaturedPosts()
    {
        $posts1 = Post::find()->limit(1)->where(['featured_posts' => '1', 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $posts2 = Post::find()->limit(2)->offset(1)->where(['featured_posts' => '1', 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $posts4 = Post::find()->limit(4)->offset(3)->where(['featured_posts' => '1', 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();

        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['featured_posts' => SORT_DESC, 'view' => SORT_DESC])->all();

        $this->setMeta(Yii::t('yii', 'Featured Posts'));

        return $this->render('featured-posts', compact('posts1','posts2','posts4','postsview4'));
    }

    public function actionFeaturedPostsMore(){

        $this->setMeta(Yii::t('yii','All Featured Posts'));
        $query = Post::find()->orderBy(['id' => SORT_DESC])->where(['featured_posts' => '1', 'status' => '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $postsmore = $query->offset($pages->offset)->limit($pages->limit)->all();

        $postsview4 = Post::find()->where(['featured_posts' => '1', 'status' => '1'])->limit(4)->orderBy(['featured_posts' => SORT_DESC, 'view' => SORT_DESC])->all();

        return $this->render('featured-posts-more', compact('postsmore','pages','postsview4'));
    }

    public function actionNews()
    {
        $posts1 = Post::find()->limit(1)->where(['status' => '1'])->orderBy(['updated_at' => SORT_DESC])->all();
        $posts2 = Post::find()->limit(2)->offset(1)->where(['status' => '1'])->orderBy(['updated_at' => SORT_DESC])->all();
        $posts4 = Post::find()->limit(4)->offset(3)->where(['status' => '1'])->orderBy(['updated_at' => SORT_DESC])->all();
        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['updated_at' => SORT_DESC, 'view' => SORT_DESC])->all();

        $this->setMeta(Yii::t('yii', 'News'));

        return $this->render('news', compact('posts1','posts2','posts4','postsview4'));
    }

    public function actionNewsMore(){

        $this->setMeta(Yii::t('yii','All news'));
        $query = Post::find()->orderBy(['updated_at' => SORT_DESC])->where(['status'=> '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $postsmore = $query->offset($pages->offset)->limit($pages->limit)->all();

        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['updated_at' => SORT_DESC, 'view' => SORT_DESC])->all();

        return $this->render('news-more', compact('postsmore','pages','postsview4'));
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta($q);
        if(!$q)
            return $this->render('search');
        $query = Post::find()->orderBy(['id' => SORT_DESC])->where(['status'=> '1'])->where(['like', 'title', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts4 = $query->offset($pages->offset)->limit($pages->limit)->all();

        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();

       

        return $this->render('search', compact('posts4','pages','q','postsview4'));
    }

    /**
     * @inheritdoc
     */
    public function actionCity($id)
    {
        $cities = City::find()
            ->where(['region_id' => $id])
            ->all();


            echo "<option>".Yii::t('yii','Select District or City')."</option>";

            foreach($cities as $item){
                echo "<option value='".$item->id."'>".$item->getName()."</option>";
            }
    }
}
