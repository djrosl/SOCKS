<?php

namespace app\models;

use app\modules\admin\components\ProductBehavior;
use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $consist
 * @property string $colors
 * @property string $description
 * @property string $sizes
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

		public function behaviors()
		{
			return [
					'image' => [
							'class' => 'rico\yii2images\behaviors\ImageBehave',
					],
                'product'=>['class'=>ProductBehavior::className()]
			];
		}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'title'], 'string'],
            [['consist', 'colors', 'sizes', 'image'], 'string', 'max' => 255],
        ];
    }

    public function fields(){
        return ['id', 'consist', 'description', 'title'];
    }

    public function extraFields()
    {
        return [
            'image'=>function($model){
                return $model->getImage()->getUrl();
            },
            'colors'=>function($model){
                return Json::decode($model->colors);
            },
            'sizes'=>function($model){
                return Json::decode($model->sizes);
            }
        ];
    }

    public function getSizes(){
        $arr = Json::decode($this->sizes);
        $out = $arr[0].'-'.$arr[count($arr) - 1];
        return $out.' р.';
    }

    public function getColors(){

        return implode(', ', array_map(function($color){
            return $color['name'];
        }, Json::decode($this->colors)));

    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'consist' => 'Состав',
            'colors' => 'Цвета',
            'description' => 'Описание',
            'sizes' => 'Размеры',
        ];
    }
}
