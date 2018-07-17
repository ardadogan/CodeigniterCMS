app.controller('homeController', ['$scope','$http', function($scope,$http){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.homeData = '';



	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getConfigData = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/config/home_menu',
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.homeData = data;

				console.log(data);

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};



	/*
	* RUN
	---------------------------------*/
		$scope.getConfigData();

	
}])