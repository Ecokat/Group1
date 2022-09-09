app.service('signupService', function ($http, $location, $interval, $timeout) {
	return {
		signup: function (cust, $scope) {
			var validate = $http.post('api/customers/addCust.php', cust);
			validate.then(function (response) {
				var success = response.data.success;
				if (success) {
					$timeout(function () {
						$location.path('/login');
					}, 5000);
					$scope.success = success;
					$scope.errorMsg = "";
					$scope.time = 5;
					$interval(function () {
						$scope.time = $scope.time - 1;
					}, 1000);
					$scope.redirect = "You will be redirected to Login page in ";

				}
				else {
					$scope.success = "";
					$scope.redirect = "";
					$scope.errorMsg = response.data.error;
				}
			});
		},

	}
});