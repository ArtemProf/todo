var app = angular.module('taskApp', ['ngResource', 'ngRoute']);

app.factory("Task", function($resource) {


    return $resource('/api/task/:id', {id:'@id'}, {
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

app.controller("TaskListController", function($scope, Task) {


    $scope.setEditable = function (task) {
        task.editable = true;
    };
    $scope.setState = function (task) {
        task.$update();
    };

    $scope.reloadList = function () {
        $scope.spinner = true;

        Task.query(function(data){
            $scope.spinner = false;
            $scope.tasks = data;
        });
    };

    $scope.save = function (task) {
        task.editable = false;

        task.$update();
    };

    $scope.add = function (descr) {
        var task = new Task({
            description:descr
        });

        task.$create(function(data){
            $scope.tasks.push(data);
        });
    };

    $scope.delete = function (task) {
        task.$delete();
        $scope.reloadList();
    };

    $scope.reloadList();
});


app.directive('ngEnter', function() {
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