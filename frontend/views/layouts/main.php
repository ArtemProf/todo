<?php

/** @var \app\components\View $this */
/** @var $content string */

use app\components\View;
use yii\helpers\Html;

$this->registerCssFile('/css/style.css?'.filemtime(Yii::getAlias('@frontend/web/css/style.css')));
$this->registerJsFile('/js/angular.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular.js')));
$this->registerJsFile('/js/angular-route.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-route.js')));
$this->registerJsFile('/js/angular-resource.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular-resource.js')));
//$this->registerJsFile('/js/angular.sanitize.js?'.filemtime(Yii::getAlias('@frontend/web/js/angular.sanitize.js')));
//$this->registerJsFile('/js/bootstrap.modal.js?'.filemtime(Yii::getAlias('@frontend/web/js/bootstrap.modal.js')));
$this->registerJsFile('/js/jquery.js?'.filemtime(Yii::getAlias('@frontend/web/js/jquery.js')));
$this->registerJsFile('/js/core.js?'.filemtime(Yii::getAlias('@frontend/web/js/core.js')));
//$this->registerJsFile('/js/scripts.js?'.filemtime(Yii::getAlias('@frontend/web/js/scripts.js')));

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
<div class="container" ng-app="scotchTodo" ng-controller="ngScotchTodoController">

    <div class="list-group col-md-8 col-md-offset-2">
        <div class="list-group-item active text-right">
            <a href="#" class="btn btn-default" ng-click="add();">Add</a>
        </div>

        <div class="list-group-item" ng-repeat="todo in todos">
            <div class="col-md-4">
                <input class="form-control" ng-show="todo.editable" ng-model="editDesc" ng-enter="save(todo, editDesc)" ng-value="todo.description" />
                <span ng-click="edit(todo);" ng-hide="todo.editable"><span ng-bind="todo.description">{{ todo.description }}</span><i class="fa fa-edit edit-icon"></i></span>
            </div>
            <div class="col-md-3">
                <select class="form-control" ng-select="changeState(todo)">
                    <option value="10">New</option>
                    <option value="50">In progress</option>
                    <option value="90">Finished</option>
                </select>
            </div>
            <div class="col-md-3">

                <a href="#" ng-click="remove(todo._id);" class="btn btn-default p-r-2">Del</a>
            </div>
            <div class="col-md-2 text-right">
                <span class="badge">{{ todo.dueDate }}</span>
            </div>
            <div class="clearfix"></div>
        </div>


<!--        <div class="list-group-item item-done">-->
<!--            <input type="checkbox" id="item-done" class="" name="Item[2][done]" value="1" checked="">-->
<!--            <span>Play music #2</span>-->
<!--            <span class="badge">2016-12-10</span>-->
<!--        </div>-->

        <a class="list-group-item active">
            <span class="badge">{{ todos.length }}</span>Count
        </a>
    </div>

</div>
<? $this->endBody(); ?>

</body>
<? if (!YII_DEBUG): ?>

<? endif ?>
</html>
<? $this->endPage() ?>
