<?php

/** @var \app\components\View $this */
/** @var common\models\user\User $model */

$this->usePageScript();

$this->title = 'Users';
?>

<div class="container" ng-app="userApp" ng-controller="UserListController">
    <div class="list-group col-md-8 col-md-offset-2">
        <div class="list-group-item active">
            <div class="col-md-5">
                Users
            </div>
            <div class="col-md-3 text-left">
                <a class="btn btn-default active" href="/user">Users</a>
                <a class="btn btn-default" href="/">Tasks</a>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-default" href="/logout">Logout</a>
                <a class="btn btn-default" href="/profile">Profile</a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="list-group-item user" ng-repeat="user in users">
            <div class="col-md-4">
                <span ng-bind="user.nameFirst">{{ user.nameFirst }}</span>
                <span ng-bind="user.nameLast">{{ user.nameLast }}</span>
            </div>
            <div class="col-md-5">
                <span>{{ user.email }}</span>
            </div>
            <div class="col-md-2">
                <label for="{{user.id}}">Is admin</label>
                <input id="{{user.id}}" type="checkbox" ng-checked="user.admin" ng-model="isAdmin" ng-click="setAdmin(user, isAdmin)"/>
            </div>
            <div class="col-md-1 text-right">
                <a class="close user-close" ng-click="delete(user)" >×</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <a class="list-group-item active">
            <span class="badge">{{ users.length }}</span>Count
        </a>

    </div>
</div>