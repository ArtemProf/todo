var userApp = angular.module('userApp', ['ngResource', 'ngRoute']);

userApp.factory("User", function ($resource) {
    return $resource('/api/user/:id', {id: '@id'}, {
        get: {
            method: "GET",
            url: '/api/user/index'
        },
        update: {
            method: "PUT",
            url: '/api/user/update/'
        },
        delete: {
            method: "DELETE",
            url: '/api/user/delete/'
        }
    });
});

userApp.controller("UserListController", function ($scope, User) {

    $scope.save = function (user) {
        user.onEdit = false;

        user.$update();
    };

    $scope.setAdmin = function (user, isAdmin) {
        user.admin = isAdmin === true ? 1 : 0;
        // var u = new User({id: user.id, admin: admin});

        user.$update(function () {
            $scope.reloadList();
        });
    };

    $scope.reloadList = function () {
        User.query(function (data) {
            $scope.users = data;
        });
    };

    $scope.delete = function (user) {
        user.$delete();
        $scope.reloadList();
    };

    $scope.reloadList();
});

userApp.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter, {'event': event});
                });
                event.preventDefault();
            }
        });
    };
});