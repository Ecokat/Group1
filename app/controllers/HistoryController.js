app.controller('HistoryController', function ($scope, loginService, $interval, $http, $location) {
   

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
    $scope.orders = [];
    function getOrders() {
        $http({
            url: URL + '/api/customers/getOrder.php',
            method: 'GET'
        }).then(function (res) {
            $scope.orders = res.data;
        });
    }
    getOrders();

    $scope.detail = function (order) {
        var post2 = $http.post('api/customers/sessionOrder.php', order);
        post2.then(function (response) {
            $location.path('/orderDetail');
        });
    };

});

