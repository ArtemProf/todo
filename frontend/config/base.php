<?php

	use common\components\helpers\ArrayHelper;

	$params = array_merge(
		require Yii::getAlias('@common/config/params.php'),
		require 'params.php'
	);

	$config = ArrayHelper::merge(require Yii::getAlias('@common/config/base.php'), [
		'id' => 'frontend',
		'basePath' => BASE_PATH,
		'components' => [
            'authClientCollection' => [
				'class' => 'yii\authclient\Collection',
				'clients' => []
			],
			'view' => [
				'class' => 'app\components\View'
			],
			'urlManager' => [
				'rules' => require 'routes.php'
			]
		],
		'params' => $params
	]);

	/* Необходимо для обработки событий авторизации, регистрации и т.п. */
	$config['components']['user']['class'] = 'frontend\components\User';

	return $config;