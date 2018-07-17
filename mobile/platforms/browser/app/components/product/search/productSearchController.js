app.controller('productSearchController', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/product';
		$scope.prePage 	= prePage;

		$scope.formData = {};
		$scope.product = '';

		$scope.showIntro = true;
		$scope.reslutError = false;


	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.searchProduct = function() {
			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/product/searchProduct/',
				data    : $.param($scope.formData),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			})
			.success(function(data) {

				$scope.showIntro = false;
				$scope.reslutError = false;
				
				$scope.product = data;

				if(data.status){
					$scope.product = data;
				}else{
					$scope.reslutError = data.message;
				}

				console.log(data);

				lib.hideLoader();

			});
		};



	/*
	* RUN
	---------------------------------*/

	
}])