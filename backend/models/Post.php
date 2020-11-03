<?php

namespace backend\models;
use backend\components\UploadModel;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $img
 * @property int $view
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Category $category
 */
class Post extends UploadModel
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'post';
    }

    public $translate_title;
    public $translate_description;
    public $translate_content;

    const FEATURED_ACTIVE   = 1;
    const FEATURED_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'description', 'content'], 'required'],
            [['user_id', 'category_id', 'view', 'status', 'featured_posts'], 'integer'],
            [['title', 'description', 'content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'default','value'=>Yii::$app->user->id],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'image', 'minWidth' => '750', 'minHeight' => '450', 'maxWidth' => '750', 'maxHeight' => '450'],
            // [['image'], 'file', 'extensions' => 'png, jpg'],
            [['translate_title','translate_description','translate_content'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => Yii::t('yii', 'Users'),
            'category_id' => Yii::t('yii', 'Categories'),
            'title' => Yii::t('yii', 'Title'),
            'translate_title' => Yii::t('yii','Title'),
            'description' => Yii::t('yii', 'Description'),
            'translate_description' => Yii::t('yii','Description'),
            'content' => Yii::t('yii', 'Content'),
            'translate_content' => Yii::t('yii','Content'),   
            'image' => Yii::t('yii', 'Image').' 750x450',
            'image_most_read' => Yii::t('yii', 'Image Most Read').' 160x160',
            'view' => Yii::t('yii','View'),
            'status' => Yii::t('yii', 'Status'),
            'featured_posts' => Yii::t('yii', 'Featured Posts'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryList()
    {
        return ArrayHelper::map(Category::find()->orderBy(['id' => SORT_DESC])->where(['status' => Category::STATUS_ACTIVE])->all(),'id','Title');
    }
    //->where(['status'=>User::STATUS_ACTIVE])
     public function getUserList()
    {
        return ArrayHelper::map(User::find()->orderBy(['id' => SORT_DESC])->all(),'id','username');
    }


    // taniqli qilsh

    public static function featuredList(): array
    {
        return [
            self::FEATURED_ACTIVE   => Yii::t('yii', 'Featured'),
            self::FEATURED_INACTIVE => Yii::t('yii', 'Infatured'),
        ];
    }

    public function getFeatured($featured)
    {
        return ArrayHelper::getValue(self::featuredList(), $featured);
    }

    public function featured()
    {
        return [
            self::FEATURED_ACTIVE   => Yii::t('yii', 'Featured'),
            self::FEATURED_INACTIVE => Yii::t('yii', 'Infeatured'),
        ];
    }

}
