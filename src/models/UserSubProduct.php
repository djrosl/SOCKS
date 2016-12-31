<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "user_sub_product".
 *
 * @property integer $id
 * @property integer $user_sub_id
 * @property integer $product_id
 * @property string $gender
 * @property string $color
 * @property string $type
 * @property string $size
 */
class UserSubProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_sub_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_sub_id', 'product_id'], 'integer'],
            [['gender', 'color', 'type', 'size'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_sub_id' => 'User Sub ID',
            'product_id' => 'Product ID',
            'gender' => 'Gender',
            'color' => 'Color',
            'type' => 'Type',
            'size' => 'Size',
        ];
    }

    public function getSmallDescription() {
        return implode(' ', [$this->gender, $this->product->title, Json::decode($this->color)['name'], $this->type, $this->size]);
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), [
            'id'=>'product_id'
        ]);
    }

}
