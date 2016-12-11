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
                'enablePrettyUrl' => true,
                'enableStrictParsing' => true,
                'showScriptName' => false,
				'rules' => require 'routes.php'
			],
            'request' => [
                'parsers' => [
                    'application/json' => 'yii\web\JsonParser',
                ]
            ]
		],
		'params' => $params
	]);


	return $config;