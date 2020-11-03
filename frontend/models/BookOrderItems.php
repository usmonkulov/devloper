<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "book_order_items".
 *
 * @property int $id
 * @property int $book_order_id
 * @property int $book_product_id
 * @property string $name
 * @property double $price
 * @property int $qty_item
 * @property double $sum_item
 *
 * @property BookOrder $bookOrder
 * @property BookProduct $bookProduct
 */
class BookOrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_order_id', 'book_product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'],
            [['book_order_id', 'book_product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
            // [['book_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookOrder::className(), 'targetAttribute' => ['book_order_id' => 'id']],
            // [['book_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookProduct::className(), 'targetAttribute' => ['book_product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //         'book_order_id' => 'Book Order ID',
    //         'book_product_id' => 'Book Product ID',
    //         'name' => 'Name',
    //         'price' => 'Price',
    //         'qty_item' => 'Qty Item',
    //         'sum_item' => 'Sum Item',
    //     ];
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookOrder()
    {
        return $this->hasOne(BookOrder::className(), ['id' => 'book_order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookProduct()
    {
        return $this->hasOne(BookProduct::className(), ['id' => 'book_product_id']);
    }
}
