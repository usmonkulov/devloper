<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "send_message".
 *
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class SendMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'send_message';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => Yii::t('yii', 'Email'),
            'subject' => Yii::t('yii', 'Subject'),
            'message' => Yii::t('yii', 'Message'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }
}
