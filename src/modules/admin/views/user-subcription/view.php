<?php

use app\components\Formatter;
use app\models\UserSubcription;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserSubcription */

$this->title = 'Заказ номер '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Subcriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title; ?>
<div class="user-subcription-view">

    <h1><?= Html::encode($this->title) ?></h1>



    
        <?php $form = ActiveForm::begin([
            'action'=>Url::to(['validate', 'id'=>$model->id])
        ]); ?>

        <div class="form-group">
        <?php echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'date_start',
            'attribute2' => 'date_end',
            'options' => ['placeholder' => 'Начало подписки'],
            'options2' => ['placeholder' => 'Окончание подписки'],
            'type' => DatePicker::TYPE_RANGE,
            'form' => $form,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ]); ?>
        </div>

        <div class="form-group text-right">
            <?=Html::submitButton('Заказ оплачен', ['class'=>'btn btn-success'])?>
        </div>
        <?php ActiveForm::end(); ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'=>'Подписка',
                'value'=>implode(' ', [
                    $model->subscription->title,
                    $model->subscription->length,
                    $model->subscription->price.' руб',
                ])
            ],
            [
                'label'=>'Пользователь',
                'value'=>$model->user->profile->name.' ['.$model->user->email.']'
            ],
            [
                'label'=>'Дата',
                'value'=>Yii::$app->formatter->asDate($model->date)
            ],
            [
                'label'=>'Статус',
                'value'=>$model->status ? 'Оплачено' : 'Не оплачено'
            ],
            [
                'label'=>'Адрес',
                'value'=>$model->address
            ],
            [
                'label'=>'Телефон',
                'value'=>$model->phone
            ],
            [
                'label'=>'Заказ',
                'format'=>'html',
                'value'=>function($model){
                    $html = '';
                    foreach($model->products as $product) {
                        $html .= DetailView::widget([
                           'model'=>$product,
                            'attributes'=>[
                                [
                                    'format'=>'html',
                                    'label'=>'image',
                                    'value'=>function($model){
                                        return Html::img($model->product->getImage()->getUrl('x100'));
                                    }
                                ],
                                'gender',
                                [
                                    'label'=>'color',
                                    'value'=>function($model){
                                        return Json::decode($model->color)['name'];
                                    }
                                ],
                                'size',
                                'type'
                            ]
                        ]);
                    }
                    return $html;
                }
            ],
        ],
    ]) ?>



</div>
