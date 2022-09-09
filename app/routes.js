var app = angular.module('main-App', ['ngRoute']);

app.config(['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
			when('/', {
				templateUrl: 'views/home.html',
				controller: 'HomeController'
			}).
			when('/login', {
				templateUrl: 'views/login.html',
				controller: 'LoginController'
			}).
			when('/signup', {
				templateUrl: 'views/signup.html',
				controller: 'SignupController'
			}).
			when('/products', {
				templateUrl: 'views/products.html',
				controller: 'ProductController'
			}).
			when('/detail', {
				templateUrl: 'views/detail.html',
				controller: 'DetailController'
			}).
			when('/cart', {
				templateUrl: 'views/cart.php',
				controller: 'CartController'
			}).
			when('/confirm', {
				templateUrl: 'views/confirm.php',
				controller: 'ConfirmController'
			}).
			when('/history', {
				templateUrl: 'views/history.html',
				controller: 'HistoryController'
			}).
			when('/orderDetail', {
				templateUrl: 'views/orderDetail.html',
				controller: 'OrderDetailController'
			}).
			when('/thankyou', {
				templateUrl: 'views/thankyou.html',
				controller: 'TYController'
			}).
			when('/admin', {
				templateUrl: 'views/admin/admin.html',
				controller: 'AdminController'
			}).
			when('/admin-orders', {
				templateUrl: 'views/admin/orders.html',
				controller: 'AdminController'
			}).
			when('/admin-custs', {
				templateUrl: 'views/admin/customers.html',
				controller: 'AdminController'
			}).
			when('/admin-products', {
				templateUrl: 'views/admin/products.html',
				controller: 'AdminController'
			}).
			when('/admin-ctgs', {
				templateUrl: 'views/admin/categories.html',
				controller: 'AdminController'
			}).
			when('/admin-feedbacks', {
				templateUrl: 'views/admin/feedback.html',
				controller: 'AdminController'
			}).
			when('/admin-contacts', {
				templateUrl: 'views/admin/contacts.html',
				controller: 'AdminController'
			}).
			when('/customer', {
				templateUrl: 'views/customer.html',
				controller: 'CustomerController'
			});
	}]);

app.run(function ($rootScope, $location, loginService) {
	//prevent going to customer if not loggedin
	var routePermit = ['/customer'];
	$rootScope.$on('$routeChangeStart', function () {
		if (routePermit.indexOf($location.path()) != -1) {
			var connected = loginService.islogged();
			connected.then(function (response) {
				if (!response.data) {
					$location.path('/login');	
				}
			});

		}
	});	
	//prevent going back to login page if session is set
	var sessionStarted1 = ['/login'];
	$rootScope.$on('$routeChangeStart', function () {
		if (sessionStarted1.indexOf($location.path()) != -1) {
			var cantgoback = loginService.islogged();
			cantgoback.then(function (response) {
				if (response.data) {
					$location.path('/customer');
				}
			});
		}
	});
	//prevent going back to sign up page if session is set
	var sessionStarted2 = ['/signup'];
	$rootScope.$on('$routeChangeStart', function () {
		if (sessionStarted2.indexOf($location.path()) != -1) {
			var cantgoback = loginService.islogged();
			cantgoback.then(function (response) {
				if (response.data) {
					$location.path('/history');
				}
			});
		}
	});
});