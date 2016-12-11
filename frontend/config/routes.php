<?php

return [
    '/'      => '/task/view',
    '/user' => '/user/view',


    '/api/task'                       => '/task/index',
    '/api/task/<method:\w+>'          => '/task/<method>',
    '/api/task/<method:\w+>/<id:\d+>' => '/task/<method>/<id>',

    '/api/user'                       => '/user/index',
    '/api/user/<method:\w+>'          => '/user/<method>',
    '/api/user/<method:\w+>/<id:\d+>' => '/user/<method>/<id>',

    '/login'    => '/auth/login',
    '/logout'   => '/auth/logout',
    '/register' => '/auth/register',
    '/profile'  => '/auth/profile',
];