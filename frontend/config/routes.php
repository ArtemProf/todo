<?php

	return [
	    '/api/task' => '/application',
//	    '/api/task/<id:\d+>' => '/application',
	    '/api/task/<method:\w+>' => '/application/<method>',
	    '/api/task/<method:\w+>/<id:\d+>' => '/application/<method>/<id>',
		'/' => '/item/index',
		'/login' => '/user/login',
		'/logout' => '/user/logout',
		'/register' => '/user/register',
	];