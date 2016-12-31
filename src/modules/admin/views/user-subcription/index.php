<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSubcriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Subcriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-subcription-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Subcription', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/
            'id',
            [
                'attribute'=>'subscription_id',
                'format'=>'html',
                'value'=>function($model){
                    return Html::tag('span', $model->subscription->title);
                }
            ],
            [
              'attribute'=>'user_id',
                'format'=>'html',
                'value'=>function($model){
                    return Html::tag('span', $model->user->profile->name).Html::tag('div', ' ['.$model->user->email.']');
                }
            ],
            'date',
            'status',
             'address',
             'phone',
            [
                'attribute'=>'id',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a('Подробнее', Url::to(['view', 'id'=>$model->id]));
                }
            ]

            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>
</div>
