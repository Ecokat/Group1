app.controller('ConfirmController', function ($scope, $interval, $http, $location) {
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

    function getCount() {
        $http({
            url: URL + '/api/cart/count.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cartnumber = res.data;
        });
    }
    getCount();

    function getOrder() {
        $http({
            url: URL + '/api/order/getOrder.php',
            method: 'GET'
        }).then(function (res) {
            $scope.orders = res.data;
        });
    }
    getOrder();

    $scope.setTotals = function () {
        var total = 0;
        angular.forEach($scope.orders, function (order) {
            total += order.quantity * order.pprice;
        });
        return total;
    };

    $scope.feedback = function () {
        
        var rate = $http.post('api/order/rating.php', $scope.rating);
        rate.then(function (response) {
            var rev = $http.post('api/order/review.php', $scope.review);
            rev.then(function (response) { 
                $location.path('/thankyou');
            });
            
        });
    }

})

    .directive('starRating',
        function () {
            return {
                restrict: 'A',
                template: '<ul class="rating">'
                    + '	<li ng-repeat="star in stars" ng-class="star" ng-click="toggle($index)">'
                    + '\u2605'
                    + '</li>'
                    + '</ul>',
                scope: {
                    ratingValue: '=',
                    max: '=',
                    onRatingSelected: '&'
                },
                link: function (scope, elem, attrs) {
                    var updateStars = function () {
                        scope.stars = [];
                        for (var i = 0; i < scope.max; i++) {
                            scope.stars.push({
                                filled: i < scope.ratingValue
                            });
                        }
                    };

                    scope.toggle = function (index) {
                        scope.ratingValue = index + 1;
                        scope.onRatingSelected({
                            rating: index + 1
                        });
                    };

                    scope.$watch('ratingValue',
                        function (oldVal, newVal) {
                            if (newVal) {
                                updateStars();
                            }
                        }
                    );
                }
            };
        }
    );



