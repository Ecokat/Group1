app.controller('CartController', function ($scope, $interval, $http, $location) {

    $interval(function () {
        $scope.theTime = new Date().toString();
    }, 1000);


    function getVisitorCounter() {
        $http({
            url: URL + '/api/visitor/visitor.php',
            method: 'GET'
        }).then(function (res) {
            $scope.vcounter = res.data;
        });
    }
    getVisitorCounter();

    $scope.customer = "Customer";
    $scope.customer1 = "Sign In";
    $scope.customer2 = "Sign Up";
    $scope.customer3 = "";
    

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

    function getCount() {
        $http({
            url: URL + '/api/cart/count.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cartnumber = res.data;
        });
    }
    getCount();



    $scope.getCart = function () {
        $http({
            url: URL + '/api/cart/getCart.php',
            method: 'GET'
        }).then(function (res) {
            $scope.carts = res.data;
        });
    };
    $scope.getCart();


    $scope.removeItem = function (id) {
        var post = $http.post('api/cart/removeCart.php', id);
        post.then(function (response) {

            $scope.getCart();
            getCount();
        });
    };

    $scope.setTotals = function () {
        var total = 0;
        angular.forEach($scope.carts, function (cart) {
            total += cart.product_quantity * cart.product_price;
        });
        return total;
    };

    $scope.back = function () {
        $location.path('/products');
    }


    $scope.hideItem = function () {
        if ($scope.order.payment == "Cash on Delivery") {
            $scope.value = true;
        }
        else {
            $scope.value = false;
        }

    }

    $scope.submitOrder = function (carts, order) {
        if (confirm('Are you sure you want to confirm your order?')) {
            var post = $http.post('api/order/order.php', order);
            post.then(function (response) {
                var post2 = $http.post('api/order/orderProducts.php', carts);
                post2.then(function (response) {
                    $location.path('/confirm');
                });
            });
        }
    }
});


