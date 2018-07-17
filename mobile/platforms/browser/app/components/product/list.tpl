<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s6">
				<strong class="truncate">{{pageTitle}}</strong>
			</a>
			<a ng-href="#/product/search" class="col s2 center">
				<ng-md-icon icon="search" ></ng-md-icon>
			</a>
			<a ng-href="#/home" class="col s2 center">
				<ng-md-icon icon="home" ></ng-md-icon>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>

<div ng-if="category.info" class="product-category-cover" style="background-image: url({{cdn}}assets/images/product/category/{{category.info.image}})">
	<h1>{{category.info.name}}</h1>
</div>

<div class="page-product list-default">
	<div class="container">
		
		<a class="row" ng-repeat="x in category.list" ng-href="#/product/{{x.categoryId}}">
			<div class="col s3 center">
				<img ng-src="{{cdn}}assets/images/product/category/{{x.image}}" style="width:100%;" ng-if="x.image!='default.png'">
				<ng-md-icon icon="{{category.category.mobile_icon}}" ng-if="x.image=='default.png'"></ng-md-icon>
			</div>
			<div class="col s9">
				<strong class="truncate">{{x.name}}</strong>
			</div>
		</a>

	</div>
</div>

<div ng-if="product.count >0" >
	
	<div class="page-product list-default">
		<div class="container">
			
			<div class="row">
				<div class="col s12">
					Ürünler ({{product.count}})
				</div>
			</div>

			<a class="row" ng-repeat="x in product.list" ng-href="#/product/detail/{{x.productId}}">
				<div class="col s3 center">
					<img ng-src="{{cdn}}assets/images/product/product/{{x.image}}" style="width:100%;" ng-if="x.image!='default.png'">
					<ng-md-icon icon="{{product.category.mobile_icon}}" ng-if="x.image=='default.png'"></ng-md-icon>
				</div>
				<div class="col s9">
					<strong class="truncate">{{x.name}}</strong>
				</div>
			</a>

		</div>
	</div>

</div>

<div ng-if="product.count < 1" >
	
	<div class="page-product list-default">
		<div class="container">
			
			<div class="row">
				<div class="col s12">
					Bu Kategoride Ürün Bulunamadı
				</div>
			</div>

		</div>
	</div>

</div>