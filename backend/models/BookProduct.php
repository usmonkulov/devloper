<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book_product".
 *
 * @property int $id
 * @property int $book_category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property int $status
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BookOrderItems[] $bookOrderItems
 * @property BookCategory $bookCategory
 */
class BookProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_product';
    }

    public $translate_name;
    public $translate_description;
    public $translate_keywords;
    public $translate_content;

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_category_id', 'name'], 'required'],
            [['book_category_id', 'book_author_id', 'status'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            // [['book_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookCategory::className(), 'targetAttribute' => ['book_category_id' => 'id']],
            // [['book_author_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookAuthor::className(), 'targetAttribute' => ['book_author_id' => 'id']],
            [['translate_name','translate_description','translate_keywords','translate_content'], 'safe'],
            [['img'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            [['img'], 'image', 'minWidth' => '634', 'minHeight' => '811', 'maxWidth' => '634', 'maxHeight' => '811'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_category_id' => Yii::t('yii', 'Book Categories'),
            'book_author_id' => Yii::t('yii', 'Book Author'),
            'name' => Yii::t('yii', 'Name'),
            'translate_name' => Yii::t('yii','Name'),
            'content' => Yii::t('yii', 'Content'),
            'translate_content' => Yii::t('yii','Content'),
            'price' => Yii::t('yii', 'Price'),
            'keywords' => Yii::t('yii', 'Keywords'),
            'translate_keywords' => Yii::t('yii','Keywords'),
            'description' => Yii::t('yii', 'Description'),
            'translate_description' => Yii::t('yii','Description'),
            'img' => Yii::t('yii', 'Image').' 634x811',
            'status' => Yii::t('yii', 'Status'),
            'hit' => Yii::t('yii', 'Hit'),
            'new' => Yii::t('yii', 'New'),
            'sale' => Yii::t('yii', 'Sale'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }

    public function upload($folder,$imageFile)
    {
        $session = explode('/', $imageFile->type);
        $session = $session[0];
        $directory = '../../frontend/web/uploads' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $session . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            \yii\helpers\FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '../../frontend/web/uploads/upload/'.$folder.'/'.$session.'/'.$fileName;
                return $path;
            }
        }

        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookOrderItems()
    {
        return $this->hasMany(BookOrderItems::className(), ['book_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookCategory()
    {
        return $this->hasOne(BookCategory::className(), ['id' => 'book_category_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthor()
    {
        return $this->hasOne(BookAuthor::className(), ['id' => 'book_author_id']);
    }

    public function getBookCategoryList()
    {
        return ArrayHelper::map(BookCategory::find()->where(['status'=>BookCategory::STATUS_ACTIVE])->all(),'id','Name');
    }


    public function getBookAuthorList()
    {
        return ArrayHelper::map(BookAuthor::find()->where(['status'=>BookAuthor::STATUS_ACTIVE])->all(),'id','Fnf');
    }

   public static function statusList(): array
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('yii', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yii', 'Inactive'),
        ];
    }

    public function getStatus($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public function status()
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('yii', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yii', 'Inactive'),
        ];
    }

    public function getName($language=null)
    {
        $title = json_decode($this->name,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }

    public function getKeywords($language=null)
    {
        $title = json_decode($this->keywords,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
    public function getDescription($language=null)
    {
        $title = json_decode($this->description,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
    public function getContent($language=null)
    {
        $title = json_decode($this->content,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
}
