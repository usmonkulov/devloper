<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "social_networks".
 *
 * @property int $id
 * @property string $url
 * @property string $class
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class SocialNetworks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_networks';
    }

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
            [['url', 'class'], 'required'],
            [['url', 'class'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => Yii::t('yii', 'Url'),
            'status' => Yii::t('yii', 'Status'),
            'class' => Yii::t('yii', 'Class'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),

        ];
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
}
