<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s8">
				<strong>{{pageTitle}}</strong>
			</a>
			<a ng-href="#/home" class="col s2 center">
				<ng-md-icon icon="home" ></ng-md-icon>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>

<div class="page-detail">

	<img ng-src="{{cdn}}assets/images/product/product/{{product.product.image}}" class="detail-main-img">

	<textarea id="scapegoat" >{{product.product.text}}</textarea>

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="detail-main-title">{{product.product.name}}</h1>
			</div>
			<div class="col s12">
				<div id="whippingBoy">
					<p class="center">İçerik yükleniyor. Lütfen bekleyin</p>
				</div>
			</div>
		</div>
	</div>
</div>