<?php

return array_merge(require(__DIR__ . '/installed_modules.php'), [
   'core' => ['class' => 'nullref\core\Module'],
   'admin' => ['class' => 'app\modules\admin\Module'],
		'yii2images' => [
				'class' => 'rico\yii2images\Module',
			//be sure, that permissions ok
			//if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
				'imagesStorePath' => 'images/store', //path to origin images
				'imagesCachePath' => 'images/cache', //path to resized copies
				'graphicsLibrary' => 'Imagick', //but really its better to use 'Imagick'
				'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
		],
    'user' => [
        'class' => 'dektrium\user\Module',
        'modelMap' => [
            'Profile' => 'app\models\Profile',
            'User' => 'app\models\User',
        ],
        'controllerMap' => [
            'registration' => 'app\controllers\RegistrationController',
            'settings' => 'app\controllers\SettingsController',
        ],
    ],
]);