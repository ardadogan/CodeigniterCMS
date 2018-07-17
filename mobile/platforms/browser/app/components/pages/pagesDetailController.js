app.controller('pagesDetailController', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.pageData = '';

		$scope.pageId 	= $routeParams.pageId;


	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getPageDetail = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/content/get_page_detail/'+$scope.pageId,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.pageData = data;

				console.log(data);

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
		$scope.getPageDetail();
	
}])