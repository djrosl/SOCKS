<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 31.12.16
 * Time: 1:54
 */

namespace app\controllers;


use app\models\SettingsForm;

class SettingsController extends \dektrium\user\controllers\SettingsController
{

    public function actionAccount()
    {
        /** @var SettingsForm $model */
        $model = \Yii::createObject(SettingsForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_ACCOUNT_UPDATE, $event);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', \Yii::t('user', 'Your account details have been updated'));
            $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $event);

            $profile = \Yii::$app->user->identity->getProfile()->one();
            $profile->name = \Yii::$app->request->post('settings-form')['name'];
            $profile->phone = \Yii::$app->request->post('settings-form')['phone'];
            $profile->location = \Yii::$app->request->post('settings-form')['location'];
            $profile->save();

            return $this->redirect(['/account']);
        }

        return $this->render('account', [
            'model' => $model,
        ]);
    }

}