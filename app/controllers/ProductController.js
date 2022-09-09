app.controller('ProductController', function ($scope, $interval, $http, $location) {
    //Reload the page once
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

    function getCupcakes() {
        $http({
            url: URL + '/api/products/getCupcakes.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cupcakes = res.data;
        });
    }
    getCupcakes();

    function getCakes() {
        $http({
            url: URL + '/api/products/getCakes.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cakes = res.data;
        });
    }
    getCakes();

    function getCakepops() {
        $http({
            url: URL + '/api/products/getCakepops.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cakepops = res.data;
        });
    }
    getCakepops();

    function getCookies() {
        $http({
            url: URL + '/api/products/getCookies.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cookies = res.data;
        });
    }
    getCookies();

    function getMacarons() {
        $http({
            url: URL + '/api/products/getMacarons.php',
            method: 'GET'
        }).then(function (res) {
            $scope.macarons = res.data;
        });
    }
    getMacarons();

    function getBrownies() {
        $http({
            url: URL + '/api/products/getBrownies.php',
            method: 'GET'
        }).then(function (res) {
            $scope.brownies = res.data;
        });
    }
    getBrownies();

    function getPastries() {
        $http({
            url: URL + '/api/products/getPastries.php',
            method: 'GET'
        }).then(function (res) {
            $scope.pastries = res.data;
        });
    }
    getPastries();

    $scope.detail = function (product) {
        var post = $http.post('api/products/session.php', product);
        post.then(function (response) {

            $location.path('/detail');

            
        });

    };
    
    function getCount() {
        $http({
            url: URL + '/api/cart/count.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cartnumber = res.data;
        });
    }
    getCount();

    $scope.addCart = function (prd) {
    
        var cartpost = $http.post('api/cart/addtoCart.php', prd);
        cartpost.then(function (response) {
            getCount();
        });
      
    }

});