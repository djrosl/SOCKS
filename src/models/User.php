<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 30.12.16
 * Time: 7:05
 */

namespace app\models;


class User extends \dektrium\user\models\User
{

    public function getSubscriptions() {
        return $this->hasMany(UserSubcription::className(), [
            'user_id'=>'id'
        ]);
    }

    public function getNotifications() {
        return $this->hasMany(Notification::className(), [
            'user_id'=>'id'
        ]);
    }

}