
var URL = window.location.pathname;

app.controller('HomeController', function ($scope, $interval, $http) {
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

    function getCount() {
        $http({
            url: URL + '/api/cart/count.php',
            method: 'GET'
        }).then(function (res) {
            $scope.cartnumber = res.data;
        });
    }
    getCount();

    $scope.contactus = function (contact) {
    
        var post = $http.post('api/contactus.php', contact);
        post.then(function (response) {
            $scope.test = "success";
        });
      
    }
});