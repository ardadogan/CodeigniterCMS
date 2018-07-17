app.controller('productController', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.category = '';
		$scope.category.info = true;

		$scope.categoryId 	= $routeParams.categoryId;

		if(!$scope.categoryId){
			$scope.categoryId = 0;
		}

		$scope.pageTitle = 'Ürünlerimiz';
	

	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getCategory = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/product/getCategory/'+$scope.categoryId,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.category = data;

				if(data.info){
					$scope.pageTitle = data.info.name;

					prePage 		= '#/product/'+data.info.parentId;
					$scope.prePage 	= prePage;

				}

				console.log(data);

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};

		$scope.getProduct = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/product/getProduct/'+$scope.categoryId,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.product = data;

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
		$scope.getCategory();
		$scope.getProduct();

	
}])