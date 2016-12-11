var taskApp = angular.module('taskApp', ['ngResource', 'ngRoute']);

taskApp.factory("Task", function($resource) {


    return $resource('/api/task/:id', {id:'@id'}, {
        get: {
            method: "GET",
            url: '/api/task/index'
        },
        create: {
            method: "POST",
            url: '/api/task/create/'
        },
        update: {
            method: "PUT",
            url: '/api/task/update/'
        },
        delete: {
            method: "DELETE",
            url: '/api/task/delete/'
        }
    });
});

taskApp.controller("TaskListController", function($scope, Task) {


    $scope.setEditable = function (task) {
        task.onEdit = true;
    };
    $scope.save = function (task) {
        task.onEdit = false;

        task.$update();
    };

    $scope.setState = function (task) {
        task.$update(function(){
            $scope.reloadList();
        });
    };

    $scope.reloadList = function () {
        $scope.spinner = true;

        Task.query(function(data){
            $scope.spinner = false;
            $scope.tasks = data;
        });
    };

    $scope.add = function () {
        var task = new Task({
            description: $scope.description
        });

        task.$create(function(){
            $scope.reloadList();
        });

        $scope.description = '';
    };

    $scope.delete = function (task) {
        task.$delete();
        $scope.reloadList();
    };

    $scope.reloadList();
});


taskApp.directive('ngEnter', function() {
    return function(scope, element, attrs) {
        element.bind("keydown keypress", function(event) {
            if(event.which === 13) {
                scope.$apply(function(){
                    scope.$eval(attrs.ngEnter, {'event': event});
                });
                event.preventDefault();
            }
        });
    };
});