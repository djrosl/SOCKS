<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\Page;
use app\models\Product;
use app\models\Slide;
use app\models\Subscription;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $products = Product::find()->all();
        $slides = Slide::find()->all();
        $price = Subscription::find()->one();
        return $this->render('index', [
            'slides'=>$slides,
            'products'=>$products,
            'price'=>$price
        ]);
    }

    public function actionAbout(){
        return $this->render('about');
    }

    public function actionFaq(){
        return $this->render('faq');
    }

    public function actionDelivery(){
        $page = Page::findOne(['slug'=>'delivery']);
        return $this->render('static', compact('page'));
    }

    public function actionGift(){
        return $this->render('gift');
    }
}
