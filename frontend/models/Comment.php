<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $register_id
 * @property int $post_id
 * @property string $name
 * @property string $website
 * @property string $message
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','website', 'message'], 'required'],
            [['message'], 'string'],
            [['register_id', 'post_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'website'], 'string', 'max' => 255],
            [['register_id'], 'exist', 'skipOnError' => true, 'targetClass' => Register::className(), 'targetAttribute' => ['register_id' => 'id']],
            [['register_id'], 'default','value'=> Yii::$app->user->id],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            // ['post_id', 'default',  'value' => debug(Post::className())],
            [['post_id'], 'default', 'value'=> Yii::$app->request->get('id')],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'register_id' => Yii::t('yii', 'Register'),
            'post_id' => Yii::t('yii', 'Post'),
            'name' => Yii::t('yii', 'Name'),
            'website' => Yii::t('yii', 'Website'),
            'message' => Yii::t('yii', 'Message'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(Register::className(), ['id' => 'register_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

}
