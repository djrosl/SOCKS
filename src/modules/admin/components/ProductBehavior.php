<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 5:34
 */

namespace app\modules\admin\components;


use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\UploadedFile;

class ProductBehavior extends Behavior
{

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'parse'
        ];
    }

    public function parse(){

        $this->owner->colors = Json::encode($this->owner->colors);
        $this->owner->sizes = Json::encode($this->owner->sizes);


        return true;
    }

}