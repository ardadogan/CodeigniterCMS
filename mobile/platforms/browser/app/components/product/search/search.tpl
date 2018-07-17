<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s6">
				<strong class="truncate">Ürünlerde Ara</strong>
			</a>
			<a ng-href="#/product" class="col s2 center">
				<ng-md-icon icon="shopping_cart" ></ng-md-icon>
			</a>
			<a ng-href="#/home" class="col s2 center">
				<ng-md-icon icon="home" ></ng-md-icon>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>


<div class="search-area">
	<div class="container">
		<div class="row">
			<form ng-submit="searchProduct()">
				<div class="input-field col s10">
					<input id="icon_prefix" type="text" ng-model="formData.q" class="validate" placeholder="Ürünlerde arama yapın">
				</div>
				<div class="col s2">
					<a class="circle search-button" ng-click="searchProduct()" ><ng-md-icon icon="send" ></ng-md-icon></a>
				</div>
			</form>
		</div>
	</div>
</div>


<div ng-if="product.count >0" >
	
	<div class="page-product list-default">
		<div class="container">
			
			<div class="row">
				<div class="col s12">
					({{product.count}}) Ürün bulundu
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

<div class="empty-content" ng-if="reslutError">
	<img ng-src="assets/img/empty.png" alt="">
	<h4>{{reslutError}}</h4>
</div>


<div class="empty-content" ng-if="showIntro">
	<img ng-src="assets/img/empty.png" alt="">
	<h4>Ürünlerde arama yapın</h4>
</div>


