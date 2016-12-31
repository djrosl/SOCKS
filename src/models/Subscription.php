<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property integer $id
 * @property string $title
 * @property string $length
 * @property integer $price
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['title', 'length'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название подписки',
            'length' => 'Количество месяцев',
            'price' => 'Цена (руб)',
        ];
    }
}
