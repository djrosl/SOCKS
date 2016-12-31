<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 15:43
 */

namespace app\controllers;


use app\models\Notification;
use app\models\UserSubcription;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;

class AccountController extends Controller
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['index', 'logout', 'delete-notify'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ]);
    }

    public function actionIndex(){

        $post = \Yii::$app->request->post();

        if($post){
            $id = $post['UserSubcription']['id'];
            $model = UserSubcription::findOne(compact('id'));
            $model->phone = $post['UserSubcription']['phone'];
            $model->address = $post['UserSubcription']['address'];
            $model->date = date('Y-m-d H:i:s');
            $model->save();
        }

        $cookies = \Yii::$app->request->cookies;
        if($cookies->getValue('order')){
           $order = Json::decode($cookies->getValue('order'));
           CatalogController::saveOrder($order);
            \Yii::$app->response->cookies->remove('order');
        }

        $orders = \Yii::$app->user->identity->subscriptions;

        return $this->render('index', compact('orders'));
    }

    public function actionDeleteNotify($id){
        $model = Notification::findOne(['id'=>$id]);
        $model->delete();
        return $this->redirect('/account');
    }

}