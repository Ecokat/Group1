app.controller('OrderDetailController', function ($scope, loginService, $interval, $http) {
    //logout
    $scope.logout = function () {
        loginService.logout();
    }

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
    $scope.products = [];
    function getProducts() {
        $http({
            url: URL + '/api/customers/getOrderDetail.php',
            method: 'GET'
        }).then(function (res) {
            $scope.products = res.data;
        });
    }
    getProducts();

    $scope.setTotals = function () {
        var total = 0;
        angular.forEach($scope.products, function (product) {
            total += product.quantity * product.pprice;
        });
        return total;
    };

   

});

