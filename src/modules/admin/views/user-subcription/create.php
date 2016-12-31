<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserSubcription */

$this->title = 'Create User Subcription';
$this->params['breadcrumbs'][] = ['label' => 'User Subcriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-subcription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
