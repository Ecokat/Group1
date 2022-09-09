
app.controller('TYController', function ($timeout, $location, $interval, $scope) {
    (() => {
        if (window.localStorage) {
            if (!localStorage.getItem('reload')) {
                localStorage['reload'] = true;
                window.location.reload();
            } else {
                localStorage.removeItem('reload');
            }
        }
    })();
    $scope.time = 5;
    $timeout(function () {
        $location.path('/');
    }, 5000);
    $interval(function () {
        $scope.time = $scope.time - 1;
    }, 1000);

});
