<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 31.12.16
 * Time: 1:29
 */

namespace app\models;


class SettingsForm extends \dektrium\user\models\SettingsForm
{

    /**
     * Add a new field
     * @var string
     */
    public $name;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
        $rules[] = ['phone', 'required'];
        $rules[] = ['phone', 'string', 'max' => 255];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user', 'ФИО');
        $labels['phone'] = \Yii::t('user', 'Телефон');
        return $labels;
    }

    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = $user->getProfile()->one();
        $profile->name = $this->name;
        $profile->phone = $this->phone;
        $profile->save();

    }

}