<?php

	$config = require 'base.php';

	return [
		'id' => 'console',
		'basePath' => dirname(__DIR__),
		'controllerNamespace' => 'app\commands',
		'components' => [
			'db' => $config['components']['db'],
		],
		'params' => require 'params.php',
	];
