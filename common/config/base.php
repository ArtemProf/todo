<?php

	$config = [
		'language' => 'en',
		'sourceLanguage' => 'en',
		'bootstrap' => ['log'],
		'vendorPath' => dirname(BASE_PATH).'/vendor',
		'extensions' => require dirname(BASE_PATH).'/vendor/composer/yiisoft/extensions.php',
		'components' => [
			'db' => require_once "db.php",
			'assetManager' => [
				'appendTimestamp' => true,
			],
			'formatter' => [
				'dateFormat' => 'yyyy-MM-dd HH:mm:ss',
			],
			'urlManager' => [
				'enablePrettyUrl' => true,
				'showScriptName' => false
			],
			'request' => [
				'cookieValidationKey' => 'NrVjBLzJTHWsnWhHCJjFUXEUVYkPHZMiyVqWPexbX6miMHpa2k'
			],
			'log' => [
				'targets' => [
					'file' => [
						'class' => 'yii\log\FileTarget',
						'levels' => ['error', 'warning'],
						'logFile' => '@common/runtime/logs/error.log',
						'maxFileSize' => 1024 * 2,
						'maxLogFiles' => 20,
					],
					'mail' => [
						'class' => 'yii\log\EmailTarget',
						'except' => ['yii\web\HttpException:404'],
						'levels' => ['error', 'warning'],
						'message' => [
							'from' => 'admin@todo.me',
							'to' => 'artem.prof@gmail.com'
						],
					],
				]
			],
			'mail' => [
				'class' => 'yii\swiftmailer\Mailer',
				'transport' => [
					'class' => 'Swift_SmtpTransport',
					'host' => 'smtp.mail.ru',
					'username' => '',
					'password' => '',
					'port' => '465',
					'encryption' => 'tls',
				],
			],
			'i18n' => [
				'translations' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'fileMap' => [
						'app' => 'app.php'
					]
				]
			],
			'user' => [
				'identityClass' => 'common\models\user\User',
				'enableAutoLogin' => false
			]
		]
	];

	if (YII_ENV_PROD) {
	}

	if (YII_ENV_DEV) {
		unset($config['components']['log']);
	}

	return $config;