<?php

if(file_exists(__DIR__.DIRECTORY_SEPARATOR."db.local.php"))
    $db = require_once "db.local.php";
else
    $db = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=todo;port=8889',
        'username' => 'web',
        'password' => '',
        'charset' => 'utf8',
    ];

return $db;