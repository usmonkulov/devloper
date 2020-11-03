<?php

namespace backend\models;
use backend\components\UploadModel;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property Post[] $posts
 */
class Category extends UploadModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public $translate_title;

    // color
    const STATUS_CAT1 = 1;
    const STATUS_CAT2 = 2;
    const STATUS_CAT3 = 3;
    const STATUS_CAT4 = 4;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status','color'], 'integer'],
            [['translate_title'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('yii', 'Title'),
            'translate_title' => Yii::t('yii','Title'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
            'status' => Yii::t('yii','Status'),
            'color' => Yii::t('yii','Color'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }


    // color
    public static function colorList(): array
    {
        return [
            self::STATUS_CAT1 => Yii::t('yii', 'cat-1'),
            self::STATUS_CAT2 => Yii::t('yii', 'cat-2'),
            self::STATUS_CAT3 => Yii::t('yii', 'cat-3'),
            self::STATUS_CAT4 => Yii::t('yii', 'cat-4'),
        ];
    }

    public function getColor($color)
    {
        return ArrayHelper::getValue(self::colorList(), $color);
    }

    public function color()
    {
        return [
            self::STATUS_CAT1 => Yii::t('yii', 'cat-1'),
            self::STATUS_CAT2 => Yii::t('yii', 'cat-2'),
            self::STATUS_CAT3 => Yii::t('yii', 'cat-3'),
            self::STATUS_CAT4 => Yii::t('yii', 'cat-4'),
        ];
    }

}
