/*
	Home Styles : Hazır anasayfa temalarını kullanmak için "homeTemplate" değişkenine aşağıdaki değerleri atayınız
		Home Styles : home | home-circle | home-border | home-metro
 */
 	var homeTemplate = 'home-circle';
 
/*
	List Styles : Alt sayfalarda kullanılan listeleme stilleri. Listeleme stilini değiştirmek için "listTemplate" değişkenine aşağıdaki değerleri atayınız
		List Styles : list | list-block
 */
 	var listTemplate = 'list-block';
 
/*
	Photos Styles : Fotoğraf sayfasının nasıl görüneceğini belirler
		List Styles : photos-block | photos-slider
 */
 	var photosTemplate = 'photos-block';



app.config(function($routeProvider) {
	$routeProvider

		// Home
		// 	
			.when('/', {
				templateUrl : 'app/components/home/'+homeTemplate+'.tpl',
				controller  : 'homeController'
			})

			.when('/home', {
				templateUrl : 'app/components/home/'+homeTemplate+'.tpl',
				controller  : 'homeController'
			})
			

		// Pages
			.when('/pages/:pageId', {
				templateUrl : 'app/components/pages/'+listTemplate+'.tpl',
				controller  : 'pagesController'
			})

			.when('/pages/detail/:pageId', {
				templateUrl : 'app/components/pages/detail.tpl',
				controller  : 'pagesDetailController'
			})
			

		// Galery
			.when('/photos/:galleryId', {
				templateUrl : 'app/components/gallery/'+photosTemplate+'.tpl',
				controller  : 'photosController'
			})
			

		// Product
			.when('/product/', {
				templateUrl : 'app/components/product/list.tpl',
				controller  : 'productController'
			})

			.when('/product/search', {
				templateUrl : 'app/components/product/search/search.tpl',
				controller  : 'productSearchController'
			})

			.when('/product/:categoryId', {
				templateUrl : 'app/components/product/list.tpl',
				controller  : 'productController'
			})

			.when('/product/detail/:productId', {
				templateUrl : 'app/components/product/detail.tpl',
				controller  : 'productDetailController'
			})





		
});