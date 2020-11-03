<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Post;
use frontend\models\Category;
use frontend\models\Publicity;
use frontend\models\PublicityImage;
use yii\data\Pagination;
use frontend\models\Comment;
use frontend\models\SubComment;


class PostController extends BehaviorsController
{

    public function actionView($id){
        $posts = Post::findOne($id);
        if(empty($posts->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'Post not found').'.');

        Post::updateAllCounters(['view'=>1],['id'=>$id]);
        $postsview4 = Post::find()->where(['status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();
        $featured_posts2 = Post::find()->where(['status' => '1','featured_posts' => '1'])->limit(2)->orderBy(['updated_at' => SORT_DESC])->all();

        // Reklama post view Birinchi
        $publicitys1 = Publicity::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();

        // Reklama post view
        $publicityImage = PublicityImage::find()->where(['status' => '1'])->limit(1)->orderBy(['id' => SORT_DESC])->all();

        // Comment post view
        $comments = Comment::find()->where(['post_id' => $id, 'status' => '1'])->all();

        $this->setMeta($posts->getTitle());
        
        $model = new Comment();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
            Yii::$app->session->setFlash('success', Yii::t('yii', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            return $this->refresh();
            }else{
            Yii::$app->session->setFlash('error', Yii::t('yii', 'There was an error sending your message.'));
            }
        }

        return $this->render('view', compact('posts','postsview4','featured_posts2','publicitys1','publicityImage','model','comments'));
    }

    public function actionCategoryView($id){
        $posts = Post::findOne($id);
        $category = $posts->category->id;

        if(empty($posts->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'Category not found').'.');

        $posts2 = Post::find()->limit(2)->offset(1)->orderBy(['id' => SORT_DESC])->where(['category_id' => $category, 'status' => '1'])->all();
        $posts4 = Post::find()->limit(4)->offset(3)->orderBy(['id' => SORT_DESC])->where(['category_id' => $category, 'status' => '1'])->all();
        $postsview4 = Post::find()->where(['category_id' => $category, 'status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();
        
        $categor = $posts->category;
        $this->setMeta($categor->getTitle());

        return $this->render('category-view', compact('posts','posts2','posts4','postsview4'));
    }

}
