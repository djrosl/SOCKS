<?php

use kartik\color\ColorInput;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$model->colors = Json::decode($model->colors);
$model->sizes = Json::decode($model->sizes);

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(); ?>

    <?=$model->getImage() ? Html::img($model->getImage()->getUrl('x200')) : "" ?>

    <?= $form->field($model, 'consist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colors')->widget(MultipleInput::className() , [

        'columns'=>[
            [
                'name'  => 'color',
                'type'  => ColorInput::className(),
                'title' => 'Цвет',

            ],
            [
                'name'  => 'name',
                'title' => 'Название цветa',

            ],


        ]
    ])->label(false); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sizes')->widget(MultipleInput::className() , []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
