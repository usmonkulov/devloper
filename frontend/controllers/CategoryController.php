<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Post;
use frontend\models\Category;
use frontend\models\Publicity;
use yii\data\Pagination;


class CategoryController extends BehaviorsController
{

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'Category not found').'.');

        $posts1 = Post::find()->limit(1)->where(['category_id' => $id, 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $posts2 = Post::find()->limit(2)->offset(1)->where(['category_id' => $id, 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();
        $posts4 = Post::find()->limit(4)->offset(3)->where(['category_id' => $id, 'status' => '1'])->orderBy(['id' => SORT_DESC])->all();
       
        $postsview4 = Post::find()->where(['category_id' => $id, 'status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();

        $this->setMeta($category->getTitle());

        return $this->render('view', compact('pages','posts1', 'category', 'posts2', 'posts4','postsview4'));
    }

    public function actionMoreView($id)
    {   
        $category = Category::findOne($id);
        if(empty($category->status))
            throw new \yii\web\HttpException(404, Yii::t('yii', 'Category not found').'.');
        $this->setMeta($category->getTitle());

        $query = Post::find()->orderBy(['id' => SORT_DESC])->where(['category_id' => $id,'status'=> '1']);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>20, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $postsmore = $query->offset($pages->offset)->limit($pages->limit)->all();

        $postsview4 = Post::find()->where(['category_id' => $id, 'status' => '1'])->limit(4)->orderBy(['view' => SORT_DESC])->all();
        
        return $this->render('more-view', compact('category','postsmore','pages','postsview4'));
    }

}
