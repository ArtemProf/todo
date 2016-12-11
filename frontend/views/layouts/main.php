<?php

/** @var \app\components\View $this */
/** @var $content string */

use yii\helpers\Html;

$this->registerCssFile('/css/style.css?'.filemtime(Yii::getAlias('@frontend/web/css/style.css')));
$this->registerJsFile('/js/jquery.js?'.filemtime(Yii::getAlias('@frontend/web/js/jquery.js')));
$this->registerJsFile('/js/angular.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular.js')));
$this->registerJsFile('/js/angular-route.min.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-route.min.js')));
$this->registerJsFile('/js/angular-resource.min.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-resource.min.js')));

if (Yii::$app->requestedRoute !== 'index') {
    $title .= ' - Todo.me';
}

?>
<? $this->beginPage(); ?>
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
    <?= $content ?>
<? $this->endBody(); ?>

</body>
<? if (!YII_DEBUG): ?>

<? endif ?>
</html>
<? $this->endPage() ?>
