<?php
/**
 */

namespace app\components;


use app\models\Field;
use yii\helpers\Html;

class Formatter extends \yii\i18n\Formatter
{

    const MONTH_NAMES = [
        [
            'name'=>"Январь",
            'id'=>1
        ],
        [
            'name'=>"Февраль",
            'id'=>2
        ],
        [
            'name'=>"Март",
            'id'=>3
        ],
        [
            'name'=>"Апрель",
            'id'=>4
        ],
        [
            'name'=>"Май",
            'id'=>5
        ],
        [
            'name'=>"Июнь",
            'id'=>6
        ],
        [
            'name'=>"Июль",
            'id'=>7
        ],
        [
            'name'=>"Август",
            'id'=>8
        ],
        [
            'name'=>"Сентябрь",
            'id'=>9
        ],
        [
            'name'=>"Октябрь",
            'id'=>10
        ],
        [
            'name'=>"Ноябрь",
            'id'=>11
        ],
        [
            'name'=>"Декабрь",
            'id'=>12
        ]
    ];

    static function arrayFromIndex($arr, $index) {
        $index = $index-1;
        return array_merge(array_slice($arr, $index, count($arr)),array_slice($arr, 0, $index));
    }

    static function diff($date1, $date2){
        $date1 = new \DateTime($date1);
        $date2 = new \DateTime($date2);

        $interval = $date1->diff($date2);


        return $interval;
    }

    static function field($slug = '') {
        return Html::decode(Field::findOne(['slug'=>$slug])->content);
    }

}