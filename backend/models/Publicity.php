<?php

namespace backend\models;
use backend\components\UploadModel;
use Yii;

/**
 * This is the model class for table "publicity".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Publicity extends UploadModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publicity';
    }

    public $translate_title;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','url'], 'required'],
            [['title', 'url'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['translate_title'], 'safe'],
            [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            [['image'], 'image', 'minWidth' => '300', 'minHeight' => '250', 'maxWidth' => '300', 'maxHeight' => '250'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('yii', 'Title'),
            'translate_title' => Yii::t('yii','Title'),
            'image' => Yii::t('yii', 'Image').' 300x250',
            'url' => Yii::t('yii', 'Url'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }
}
