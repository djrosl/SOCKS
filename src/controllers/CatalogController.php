<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 6:03
 */

namespace app\controllers;


use app\components\BaseController;
use app\models\Subscription;
use app\models\UserSubcription;
use app\models\UserSubProduct;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class CatalogController extends BaseController
{


    public function actionIndex(){

        $subscriptions = Subscription::find()->all();

        return $this->render('index', compact('subscriptions'));
    }

    public function actionSave(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $post = \Yii::$app->request->post();
        if($post){

            if(\Yii::$app->user->isGuest){
                $cookies = \Yii::$app->response->cookies;

                $cookies->add(new \yii\web\Cookie([
                    'name' => 'order',
                    'value' => Json::encode($post),
                ]));

                return 'openModal';
            } else {
                return $this->saveOrder($post);
            }
        }

        return false;
    }


    static function saveOrder($data){
        if(\Yii::$app->user->isGuest){
            return false;
        }
        $userSub = new UserSubcription();

        $userSub->setAttributes([
            'user_id'=>\Yii::$app->user->id,
            'subscription_id'=>$data['sub'],
            'status'=>0,
            'date'=>date('Y-m-d H:i:s')
        ]);

        $userSub->save();

        foreach($data['products'] as $choice){
            $userSubProduct = new UserSubProduct();
            $choice['product_id'] = $choice['id'];
            $choice['user_sub_id'] = $userSub->id;
            $choice['color'] = Json::encode($choice['color']);

            $userSubProduct->setAttributes($choice);
            $userSubProduct->save();
        }
        return true;

    }


}