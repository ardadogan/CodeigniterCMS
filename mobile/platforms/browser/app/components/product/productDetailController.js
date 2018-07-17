app.controller('productDetailController', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.product = '';

		$scope.productId 	= $routeParams.productId;

		if(!$scope.productId){
			$scope.productId = 0;
		}

		$scope.pageTitle = 'Ürün Detayları';
	

	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getProductInfo = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/product/getProductInfo/'+$scope.productId,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				console.log(data);

				$scope.product = data;

				$scope.pageTitle = data.product.name;

				prePage = '#/product/'+data.product.categoryId;
				$scope.prePage 	= prePage;


				$(document).ready(function(){
			
					setTimeout(function(){
						
						var d = $("#scapegoat").val();
						$("#whippingBoy").html(d);

						lib.hideLoader();
					},1000);
				});

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};



	/*
	* RUN
	---------------------------------*/
		$scope.getProductInfo();

	
}])