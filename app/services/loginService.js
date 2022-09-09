app.service('loginService', function($http, $location, sessionService){
	return{
		login: function(cust, $scope){
			var validate = $http.post('api/customers/login.php', cust);
			validate.then(function(response){
				var aid = response.data.admin;
				var uid = response.data.cust;
				var uname = response.data.name;
				if(aid){
					sessionService.set('admin',aid);
					$location.path('/admin');
				}
				else if(uid){
					sessionService.set('cust',uid);
					sessionService.set('name',uname);
					$location.path('/customer');
				}
				else{
					$scope.successLogin = false;
					$scope.errorLogin = true;
					$scope.errorMsg = response.data.message;
				}
			});
		},
		logout: function(){
			sessionService.destroy('admin');
			$location.path('/login');
		},
		islogged: function(){
			var checkSession = $http.post('api/session/session.php');
			return checkSession;
		},
		isadmin: function(){
			var checkSession = $http.post('api/admin/session.php');
			return checkSession;
		},
		getCustbyID: function(){
			var user = $http.get('api/customers/getCustbyID.php');
			return user;
		}
	}
});