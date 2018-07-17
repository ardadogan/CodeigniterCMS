app.controller('publicController', ['$scope','$http', function($scope,$http){
	

	/*
	* VARIABLES
	---------------------------------*/
		$scope.exitApp = true;
		
		$scope.appName 		= 'Uygulama Adı';
		$scope.appNameSef 	= 'uygulama-adi';
		$scope.serviceUrl 	= 'http://192.168.1.113/project/sitelitik/tr/restapi';
		$scope.cdn 			= 'http://192.168.1.113/project/sitelitik/';

		$scope.config = '';



	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getConfigData = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/config/info',
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.config = data;

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};



	/*
	* RUN
	---------------------------------*/
		// $scope.getConfigData();



}])