<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 6:35
 */

namespace app\controllers;


use yii\web\Response;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{

    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return true;
    }

    public $modelClass = '\app\models\Product';


}