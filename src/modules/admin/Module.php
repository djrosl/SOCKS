<?php

namespace app\modules\admin;

use nullref\admin\interfaces\IMenuBuilder;
use nullref\core\components\Module as BaseModule;
use nullref\core\interfaces\IAdminModule;
use Yii;
use yii\base\InvalidConfigException;

class Module extends \nullref\admin\Module implements IAdminModule
{
    public static function getAdminMenu()
    {
        return [
            'label' => 'Панель управления',
            'items'=> [
                [
                    'label' => 'Главная',
                    'url' => ['/admin/main'],
                ],
                [
                    'label' => 'Носки',
                    'url' => ['/admin/product'],
                ],
                [
                    'label' => 'Типы подписок',
                    'url' => ['/admin/subscription'],
                ],
                [
                    'label' => 'Заказы',
                    'url' => ['/admin/user-subcription'],
                ],
                [
                    'label' => 'Оповещения',
                    'url' => ['/admin/notification'],
                ],
                [
                    'label' => 'Администраторы',
                    'url' => ['/admin/user'],
                ],

            ]
        ];
    }
}
