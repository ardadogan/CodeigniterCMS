app.controller('cnt3Controller', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.pageData = '';

		$scope.contentName 	= $routeParams.contentName;


	/*
	* FUNCTIONS
	---------------------------------*/


		$scope.getFirstList = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+$scope.contentName,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.pageData = data;

				console.log(data);

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};


		$scope.getUrl = function(url){

			window.open(url, '_system');

		}



	/*
	* RUN
	---------------------------------*/

		$scope.getFirstList();
	
}])