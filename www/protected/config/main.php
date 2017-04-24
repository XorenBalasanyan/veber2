<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Veber Technology',
        'language'=>'ru',
        'charset'=>'utf-8',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.helpers.*',
        'application.extensions.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'admin',
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=>array(
                                'gii'=>'gii/default/login',
                                'admin' => 'site/login',
                                //'admin' => 'admin/default/',
                                'admin/post'=>'admin/post/',
                                'products/<alias_1>/<alias_2>' => 'products/viewCard',
                                'products/<alias>' => 'products/view',
                                '<controller:\w+>'=>'<controller>/index',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<alias>'=>'<controller>/view',
                                //'news/<alias>' => 'news/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

                // обработка фотографий
		'phpThumb'=>array(
			'class'=>'ext.EPhpThumb.EPhpThumb',
			'options'=>array()
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'revas@list.ru',
	),
);
