app.controller('CustomerController', function ($scope, loginService, $interval, $http) {
    //logout
    $scope.logout = function () {
        loginService.logout();
    }


    var userrequest = loginService.getCustbyID();
    userrequest.then(function (response) {
        $scope.cust = response.data[0];
    });
    $interval(function () {
        $scope.theTime = new Date().toString();
    }, 1000);
    function getCount() {
        $http({
            url: URL + '/api/cart/count.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cartnumber = res.data;
        });
    }
    getCount();

    function getVisitorCounter() {
        $http({
            url: URL + '/api/visitor/visitor.php',
            method: 'GET'
        }).then(function (res) {
            $scope.vcounter = res.data;
        });
    }
    getVisitorCounter();
    function getName() {
        $http({
            url: URL + '/api/session/session.php',
            method: 'GET'
        }).then(function (res) {
            if (res.data) {
                $scope.customer = res.data;
                $scope.customer1 = "Profile";
                $scope.customer2 = "Order History";
                $scope.customer3 = "Your Cart";
            }
        });
    }
    getName();
    $scope.success = "";
    $scope.update = function (cust) {
        if (confirm('Are you sure you want to update your profile?')) {
            var post = $http.post('api/customers/update.php', cust);
            post.then(function (response) {
                getName();
                var userrequest = loginService.getCustbyID();
                $scope.success = response.data;
                userrequest.then(function (response) {
                    $scope.cust = response.data[0];

                });
            });
        }
    }

    $scope.changePass = function (pass) {
        if (confirm('Are you sure you want to change your password?')) {
            var post = $http.post('api/customers/changePass.php', pass);
            post.then(function (response) {
                var success = response.data.success;
                if (success) {
                    $scope.paSuccess = success;
                }
                else {
                    $scope.paError = response.data.error;
                }
            });
        }
    }
});

