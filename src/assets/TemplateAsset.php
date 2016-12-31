<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TemplateAsset extends AssetBundle
{
    public $basePath = '@webroot/template';
    public $baseUrl = '@web/template';
    public $css = [
        'styles/main.css',
    ];
    public $js = [
        'scripts/vendor.js',
        'scripts/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
