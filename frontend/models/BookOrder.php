<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book_order".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $region_id
 * @property int $city_id
 * @property string $address
 *
 * @property City $city
 * @property Region $region
 * @property BookOrderItems[] $bookOrderItems
 */
class BookOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_order';
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
            [['name','phone', 'region_id', 'city_id', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status'], 'integer'],
            [['sum'], 'number'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            // 'created_at' => 'Created At',
            // 'updated_at' => 'Updated At',
            // 'qty' => 'Qty',
            // 'sum' => 'Sum',
            // 'status' => 'Status',
            'region_id' => Yii::t('yii', 'Region'),
            'city_id' => Yii::t('yii', 'District or City'),
            'name' => Yii::t('yii', 'Last name, First name, Patronymic'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'address' => Yii::t('yii', 'Address'),
        ];
    }

    public function getRegionList()
    {
        return ArrayHelper::map(Region::find()->all(),'id','Name');
    }

    public function getCityList()
    {
        return ArrayHelper::map(City::findAll(['region_id' => $model->region_id]), 'id', 'Name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookOrderItems()
    {
        return $this->hasMany(BookOrderItems::className(), ['book_order_id' => 'id']);
    }
}
