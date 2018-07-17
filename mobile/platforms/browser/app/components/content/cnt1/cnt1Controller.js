app.controller('cnt1Controller', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.pageData = '';

		$scope.contentName 	= $routeParams.contentName;
		$scope.subPage 		= $routeParams.subPage;


	/*
	* FUNCTIONS
	---------------------------------*/

		if($scope.subPage!=null){
			prePage 		= '#/content/cnt1/'+$scope.contentName;
			$scope.prePage 	= prePage;
		}

		$scope.getConfigData = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+$scope.contentName+'/'+$scope.subPage,
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
		$scope.getConfigData();
	
}])