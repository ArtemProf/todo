<?php

	define('BASE_PATH', dirname(__DIR__));

	defined('YII_DEBUG') or define('YII_DEBUG', $_SERVER['HTTP_HOST'] === 'todo.dev');
	defined('YII_ENV') or define('YII_ENV', YII_DEBUG ? 'dev' : 'prod');

	require BASE_PATH.'/../vendor/composer/autoload.php';
	require BASE_PATH.'/../vendor/composer/yiisoft/yii2/Yii.php';
	require BASE_PATH.'/../common/config/bootstrap.php';

	(new yii\web\Application(require(BASE_PATH.'/config/base.php')))->run();

	if (YII_DEBUG && Yii::$app->response->format === yii\web\Response::FORMAT_HTML)
		echo '<script src="http://todo.dev:35740/livereload.js?snipver=1"></script>';
