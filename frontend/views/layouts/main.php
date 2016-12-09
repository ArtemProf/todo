<?php

/** @var \app\components\View $this */
/** @var $content string */

use app\components\View;
use frontend\components\widgets\AuthChoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile('/css/style.css?'.filemtime(Yii::getAlias('@frontend/web/css/style.css')));
$this->registerJsFile('/js/scripts.js?'.filemtime(Yii::getAlias('@frontend/web/js/scripts.js')));
$this->registerJsFile(
    '/js/scripts.utils.js?'.filemtime(Yii::getAlias('@frontend/web/js/scripts.js')),
    [
        'position' => View::POS_HEAD,
    ]
);

$title = $this->seo_pageBrowserTitle ? : $this->title;

if (Yii::$app->requestedRoute !== 'application/index') {
    $title .= ' - БудуГуру';
}

$isLoginVisible = Yii::$app->user->isGuest
    && Yii::$app->requestedRoute != 'user/login';

?>
<? $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="ru" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title><?= Html::encode($title) ?></title>
        <link rel="icon" href="/favicon.ico">
        <?= Html::csrfMetaTags() ?>
        <? $this->head() ?>
    </head>
    <body class="<?= implode(' ', $this->getBodyClasses()) ?>">

        <? $this->beginBody() ?>
        <div class="container">
            <?= $content ?>
        </div>
        <? $this->endBody(); ?>

    </body>
    <? if (!YII_DEBUG): ?>

    <? endif ?>
    </html>
<? $this->endPage() ?>