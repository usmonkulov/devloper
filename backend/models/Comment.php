<?php

namespace backend\models;

use Yii;

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
 *
 * @property Register $register
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['register_id', 'post_id', 'name', 'website', 'message', 'created_at', 'updated_at'], 'required'],
            [['register_id', 'post_id', 'status'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'website'], 'string', 'max' => 255],
            [['register_id'], 'exist', 'skipOnError' => true, 'targetClass' => Register::className(), 'targetAttribute' => ['register_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_id' => 'Register ID',
            'post_id' => 'Post ID',
            'name' => 'Name',
            'website' => 'Website',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
