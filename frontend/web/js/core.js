(function () {
    var ngContactUsFormApp,
        hasProp = {}.hasOwnProperty;

    ngScotchTodo = angular.module('scotchTodo', ['ngRoute', 'ngResource']);


    ngScotchTodo.controller('ngScotchTodoController', function ($scope, $http) {
        $scope.formData = {};
        // console.log($http.get);
        // console.log($http.put);
        // console.log($http.post);
        // console.log($http.delete);

        // when landing on the page, get all todos and show them
        $http.get('/api/todos')
            .success(function (data) {
                $scope.todos = data;
                console.log(data);
            })
            .error(function (data) {
                console.log('Error: ' + data);
            });

        // when submitting the add form, send the text to the node API
        $scope.createTodo = function () {
            $http.post('/api/todos', $scope.formData)
                .success(function (data) {
                    $scope.formData = {}; // clear the form so our user is ready to enter another
                    $scope.todos = data;
                    console.log(data);
                })
                .error(function (data) {
                    console.log('Error: ' + data);
                });
        };

        // delete a todo after checking it
        $scope.remove = function (id) {
            $http.delete('/api/todos/' + id)
                .success(function (data) {
                    $scope.todos = data;
                })
                .error(function (data) {
                });
        };
        $scope.edit = function (todo) {
            todo.editable = true;
        };
        $scope.save = function (todo, descr) {
            todo.editable = false;
            todo.description = descr;

            $http.put('/api/todos/' + todo.id  )
                .success(function (data) {
                    $scope.todos = data;
                    console.log(data);
                })
                .error(function (data) {
                    console.log('Error: ' + data);
                });
        };
        $scope.changeState = function (id) {
            $http.delete('/api/todos/' + id)
                .success(function (data) {
                    $scope.todos = data;
                    console.log(data);
                })
                .error(function (data) {
                    console.log('Error: ' + data);
                });
        };
    });

    ngScotchTodo.directive('ngEnter', function() {
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
}).call(this);
