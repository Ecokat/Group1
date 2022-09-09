app.controller('AdminController', function ($scope, loginService, $location, $interval, $http) {

    //logout
    $scope.logout = function () {
        loginService.logout();
    }
    //Get admin info
    function getadmin() {
        get = $http.get('api/admin/getAdmin.php');
        get.then(function (response) {
            $scope.admin = response.data[0];
        });
    }
    getadmin();

    //edit admin profile
    $scope.update = function (admin) {
        if (confirm('Are you sure you want to update admin profile?')) {
            var post = $http.post('api/admin/update.php', admin);
            post.then(function (response) {
                $scope.success = response.data;
                getadmin();
            });
        }
    }

    $scope.changePass = function (pass) {
        if (confirm('Are you sure you want to change Admin Password?')) {
            var post = $http.post('api/admin/changePass.php', pass);
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

    $scope.orders = [];
    function getOrders() {
        $http({
            url: URL + '/api/admin/getOrders.php',
            method: 'GET'
        }).then(function (res) {
            $scope.orders = res.data;
        });
    }
    getOrders();

    $scope.orderdetails = [];
    function getorderdetails() {
        $http({
            url: URL + '/api/customers/getOrderDetail.php',
            method: 'GET'
        }).then(function (res) {
            $scope.orderdetails = res.data;
        });
    }
    

    $scope.detail = function (order) {
        var post2 = $http.post('api/customers/sessionOrder.php', order);
        post2.then(function (response) {
            getorderdetails();
        });
    };

    $scope.setTotals = function () {
        var total = 0;
        angular.forEach($scope.orderdetails, function (orderdetail) {
            total += orderdetail.quantity * orderdetail.pprice;
        });
        return total;
    };

    $scope.updateOrder = function (order) {
        if (confirm('Are you sure you want to update this order?')) {
            var post4 = $http.post('api/admin/updateOrder.php', order);
            post4.then(function (response) {
                getOrders();
                $scope.updatesuccess = response.data;
            });
        }
    };

    $scope.removeOrder = function (order) {
        if (confirm('Are you sure you want to remove this order?')) {
            var post3 = $http.post('api/admin/removeOrder.php', order);
            post3.then(function (response) {
                getOrders();
            });
        }
    };

    $scope.updateOD = function (orderdetail) {
        if (confirm('Are you sure you want to update this order?')) {
            var post5 = $http.post('api/admin/updateOD.php', orderdetail);
            post5.then(function (response) {
                getorderdetails();
                $scope.odsuccess = response.data;
            });
        }
    };
    
    $scope.removeOD = function (orderdetail) {
        if (confirm('Are you sure you want to remove this item?')) {
            var post6 = $http.post('api/admin/removeOD.php', orderdetail);
            post6.then(function (response) {
                getorderdetails();
            });
        }
    };

    $scope.customers = [];
    function getCustomers() {
        $http({
            url: URL + '/api/admin/getCusts.php',
            method: 'GET'
        }).then(function (res) {
            $scope.customers = res.data;
        });
    }
    getCustomers();

    $scope.removeCust = function (cust) {
        if (confirm('Are you sure you want to remove this customer?')) {
            var post3 = $http.post('api/admin/removeCust.php', cust);
            post3.then(function (response) {
                getCustomers();
            });
        }
    };

    $scope.updateCust = function (cust) {
        if (confirm('Are you sure you want to update this customer info?')) {
            var post4 = $http.post('api/admin/updateCust.php', cust);
            post4.then(function (response) {
                getCustomers();
                $scope.custsuccess = response.data;
            });
        }
    };

    $scope.insertCust = function (newcust) {
        if (confirm('Are you sure you want to insert to Customers ?')) {
            var post4 = $http.post('api/admin/insertCust.php', newcust);
            post4.then(function (response) {
                getCustomers();
                $scope.custsuccess = response.data;
            });
        }
    };

    $scope.products = [];
    function getProducts() {
        $http({
            url: URL + '/api/admin/getProducts.php',
            method: 'GET'
        }).then(function (res) {
            $scope.products = res.data;
        });
    }
    getProducts();

    $scope.removePrd = function (product) {
        if (confirm('Are you sure you want to remove this product?')) {
            var post3 = $http.post('api/admin/removeProduct.php', product);
            post3.then(function (response) {
                getProducts();
            });
        }
    };

    $scope.updatePrd = function (product) {
        if (confirm('Are you sure you want to update this product info?')) {
            var post4 = $http.post('api/admin/updatePrd.php', product);
            post4.then(function (response) {
                getProducts();
                $scope.prdsuccess = response.data;
            });
        }
    };

    $scope.insertPrd = function (newprd) {
        if (confirm('Are you sure you want to insert to Products ?')) {
            var post4 = $http.post('api/admin/insertPrd.php', newprd);
            post4.then(function (response) {
                getProducts();
                $scope.prdsuccess = response.data;
            });
        }
    };

    $scope.ctgs = [];
    function getCtgs() {
        $http({
            url: URL + '/api/admin/getCtgs.php',
            method: 'GET'
        }).then(function (res) {
            $scope.ctgs = res.data;
        });
    }
    getCtgs();

    $scope.removeCtg = function (ctg) {
        if (confirm('Are you sure you want to remove this category?')) {
            var post3 = $http.post('api/admin/removeCtg.php', ctg);
            post3.then(function (response) {
                getCtgs();
            });
        }
    };

    $scope.updateCtg = function (ctg) {
        if (confirm('Are you sure you want to update this category info?')) {
            var post4 = $http.post('api/admin/updateCtg.php', ctg);
            post4.then(function (response) {
                getCtgs();
                $scope.ctgsuccess = response.data;
            });
        }
    };

    $scope.insertCtg = function (newctg) {
        if (confirm('Are you sure you want to insert to Categories ?')) {
            var post4 = $http.post('api/admin/insertCtg.php', newctg);
            post4.then(function (response) {
                getCtgs();
                $scope.ctgsuccess = response.data;
            });
        }
    };

    $scope.feedbacks = [];
    function getFeedbacks() {
        $http({
            url: URL + '/api/admin/getFeedbacks.php',
            method: 'GET'
        }).then(function (res) {
            $scope.feedbacks = res.data;
        });
    }
    getFeedbacks();

    $scope.contacts = [];
    function getContacts() {
        $http({
            url: URL + '/api/admin/getContacts.php',
            method: 'GET'
        }).then(function (res) {
            $scope.contacts = res.data;
        });
    }
    getContacts();
});

