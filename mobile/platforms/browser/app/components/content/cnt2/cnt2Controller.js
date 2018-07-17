app.controller('cnt2Controller', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
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
			prePage 		= '#/content/cnt2/'+$scope.contentName;
			$scope.prePage 	= prePage;
		}

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

		$scope.getSecondList = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+$scope.contentName+'2/'+$scope.subPage,
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



	/*
	* RUN
	---------------------------------*/

		if($scope.subPage==undefined){
			$scope.getFirstList();
		}else{
			$scope.getSecondList();
		}
	
}])