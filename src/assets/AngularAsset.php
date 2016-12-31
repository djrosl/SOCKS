<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 29.12.16
 * Time: 6:45
 */

namespace app\assets;


use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular';
    public $js = [

        'angular.min.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}