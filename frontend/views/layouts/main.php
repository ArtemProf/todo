<?php

/** @var \app\components\View $this */
/** @var $content string */

use app\components\View;
use yii\helpers\Html;

$this->registerCssFile('/css/style.css?'.filemtime(Yii::getAlias('@frontend/web/css/style.css')));
$this->registerJsFile('/js/jquery.js?'.filemtime(Yii::getAlias('@frontend/web/js/jquery.js')));
$this->registerJsFile('/js/angular.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular.js')));
$this->registerJsFile('/js/angular-route.min.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-route.min.js')));
$this->registerJsFile('/js/angular-resource.min.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-resource.min.js')));


$this->registerJsFile('/js/app.js?'.filemtime(Yii::getAlias('@frontend/web/js/app.js')));

if (Yii::$app->requestedRoute !== 'application/index') {
    $title = ' - БудуГуру';
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
<div class="container" ng-app="taskApp" ng-controller="TaskListController">

    <div class="list-group col-md-8 col-md-offset-2">
        <div class="list-group-item active text-right">
        </div>

        <div class="list-group-item">
            <div class="col-md-11">
                <input class="form-control" ng-model="description" ng-enter="add(description)"/>
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-default">Add</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="list-group-item" ng-repeat="task in tasks">

            <div class="col-md-4">
                <input class="form-control" ng-show="task.editable" ng-model="task.description" ng-enter="save(task)"
                       ng-value="task.description"/>
                <span ng-hide="task.editable" ng-click="setEditable(task);"><span>{{ task.description }}</span><i
                        class="fa fa-edit edit-icon"></i></span>
            </div>
            <div class="col-md-3">
                <select class="form-control" ng-model="task.state" ng-change="setState(task)">
                    <option ng-value="0">New</option>
                    <option ng-value="50">In progress</option>
                    <option ng-value="90">Finished</option>
                </select>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-default p-r-2" ng-click="delete(task)" >Del</a>
            </div>
            <div class="col-md-2 text-right">
                <span class="badge">{{ task.dueDate }}</span>
            </div>
            <div class="clearfix"></div>
        </div>

        <a class="list-group-item active">
            <span class="badge">{{ tasks.length }}</span>Count
        </a>
    </div>

</div>
<? $this->endBody(); ?>

</body>
<? if (!YII_DEBUG): ?>

<? endif ?>
</html>
<? $this->endPage() ?>
