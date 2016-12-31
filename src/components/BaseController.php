<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 13:16
 */

namespace app\components;


use yii\web\Controller;

class BaseController extends Controller
{

    public function init()
    {
        parent::init();

        \Yii::$app->language = 'ru-RU';
    }

}