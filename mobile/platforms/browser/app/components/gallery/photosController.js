app.controller('photosController', ['$scope','$http','$routeParams', function($scope,$http,$routeParams){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 	= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.photos = '';

		$scope.galleryId 	= $routeParams.galleryId;


	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getPageList = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/content/get_gallery_photos/'+$scope.galleryId,
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.photos = data;

				console.log(data);


				$(document).ready(function(){
			
					setTimeout(function(){
						
						$('.materialboxed').materialbox();

						var sW = $(window).width();

						var bol = data.category.width/sW;

						var sn = data.category.height/bol;

						$('.slider').slider({
							full_width: true,
							indicators: false,
							interval: 3000,
							height: sn
						});

						lib.hideLoader();
					},1000);
				});


			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};



	/*
	* RUN
	---------------------------------*/
		$scope.getPageList();

	
}])