<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_subcription".
 *
 * @property integer $id
 * @property integer $subscription_id
 * @property integer $user_id
 */
class UserSubcription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_subcription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subscription_id', 'user_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['date_start','date_end'], 'date'],
            [['address', 'phone'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'subscription_id' => 'Тип подписки',
            'user_id' => 'Пользователь',
            'date_start' => 'Месяц начала подписки',
            'date_end' => 'Месяц окончания подписки',
        ];
    }

    public function getProducts() {
        return $this->hasMany(UserSubProduct::className(), [
            'user_sub_id' => 'id'
        ]);
    }

    public function getSubscription() {
        return $this->hasOne(Subscription::className(), [
            'id'=>'subscription_id'
        ]);
    }

    public function getUser(){
        return $this->hasOne(User::className(), [
            'id'=>'user_id'
        ]);
    }
}
