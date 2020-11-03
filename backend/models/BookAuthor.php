<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book_author".
 *
 * @property int $id
 * @property string $fnf
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_author';
    }

    public $translate_fnf;

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
     * {@inheritdoc} 'born_date',, 'address'
     */
    public function rules()
    {
        return [
            [['fnf'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['fnf'], 'string', 'max' => 255],
            [['translate_fnf'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fnf' => Yii::t('yii', 'Fnf'),
            'translate_fnf' => Yii::t('yii','Fnf'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getBookProducts()
    {
        return $this->hasMany(BookProduct::className(), ['book_author_id' => 'id']);
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

    public function getFnf($language=null)
    {
        $title = json_decode($this->fnf,true);

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
