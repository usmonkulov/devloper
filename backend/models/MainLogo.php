<?php

namespace backend\models;
use backend\components\UploadModel;
use Yii;

/**
 * This is the model class for table "main_logo".
 *
 * @property int $id
 * @property string $image
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class MainLogo extends UploadModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_logo';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            [['image'], 'image', 'minWidth' => '114', 'minHeight' => '18', 'maxWidth' => '114', 'maxHeight' => '18'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'image' => Yii::t('yii', 'Image').' 114x18',
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }
}
