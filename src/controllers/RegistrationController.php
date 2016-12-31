<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 15:00
 */

namespace app\controllers;


use app\models\RegistrationForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class RegistrationController extends \dektrium\user\controllers\RegistrationController
{

    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        //$this->performAjaxValidation($model);

        \Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            \Yii::$app->response->format = Response::FORMAT_JSON;

            return true;

            /*return $this->render('/message', [
                'title'  => \Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);*/
        }

        return false;/*

        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);*/
    }

}