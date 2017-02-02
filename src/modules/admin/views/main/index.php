<?php
/** @var $this \yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Socks Admin Panel';

$status = ['Отклонен', '', 'Не оплачен', 'Оплачен', 'Проведён', 'referals'=>'Реферальные'];
?>
<div class="admin-index main-page">
    <div class="row">

        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                'content:html',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>

    </div>
    <!-- /.row -->
</div>