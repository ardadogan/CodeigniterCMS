app.controller('contact1Controller', ['$scope','$http', function($scope,$http){
	
	
	/*
	* VARIABLES
	---------------------------------*/
		exitApp 		= false;
		prePage 		= '#/home';
		$scope.prePage 	= prePage;

		$scope.pageData  = '';

	/*
	* FUNCTIONS
	---------------------------------*/

		$scope.getContactData = function() {
				lib.showLoader();

			$http({
				method  : 'POST',
				url     : $scope.serviceUrl+'/contact',
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(data) {

				$scope.pageData = data;

				console.log($scope.pageData);

				$scope.initMap();

				lib.hideLoader();

			}).error(function(data){

				$.alert(data);

				lib.hideLoader();
			});

		};


		$scope.initMap = function() {


			var contentString = '<div class="mapInfoDiv"> <h4>Başlık</h4> <p>Gop cad map cud çata küte bala göte no5</p> </div>';


			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var myLatLng = {lat: $scope.pageData.location.lat, lng: $scope.pageData.location.lng};

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: myLatLng,
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				animation: google.maps.Animation.DROP,
				title: 'Hello World!'
			});

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		}







	/*
	* RUN
	---------------------------------*/
		$scope.getContactData();
		




	
}])