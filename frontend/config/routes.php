<?php

	return [
	    '/api/task' => '/task/index',
	    '/api/task/<method:\w+>' => '/task/<method>',
	    '/api/task/<method:\w+>/<id:\d+>' => '/task/<method>/<id>',

		'/' => '/task/view',
		'/login' => '/user/login',
		'/logout' => '/user/logout',
		'/register' => '/user/register',
		'/profile' => '/user/profile',
	];