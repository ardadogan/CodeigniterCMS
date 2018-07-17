app.controller('usController', ['$scope','$http', function($scope,$http){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 		= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.formData = {};

	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.processForm = function() {
			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'mail/contactUs',
				data    : $.param($scope.formData),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			})
			.success(function(data) {
				
				$.alert(data.message);

			});
		};



	/*
	* RUN
	---------------------------------*/

		


	
}])