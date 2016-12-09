<?php

	$params = [
		'host.front' => 'todo.me',
		/**
		 * Auth settings
		 */
		'auth.remember.timeout' => 2592000, /* 3600*24*30 Timelife of auth data */
		'password.min.length' => 5, /* Min length of the password */
		'password.max.length' => 24, /* Max length of the password*/
	];

	if (YII_ENV_DEV) {
		$params['host.front'] = 'todo.dev';
	}

	return $params;