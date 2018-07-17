<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="#/pages/{{pageData.page.categoryId}}" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s10">
				<strong class="truncate">{{pageData.page.name}}</strong>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>


<div class="page-detail">

	<img ng-src="{{cdn}}assets/images/pages/{{pageData.page.image}}" class="detail-main-img">



	<textarea id="scapegoat" >{{pageData.page.text}}</textarea>

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="detail-main-title">{{pageData.page.name}}</h1>
			</div>
			<div class="col s12">
				<div id="whippingBoy">
					<p class="center">İçerik yükleniyor. Lütfen bekleyin</p>
				</div>
			</div>
		</div>
	</div>
</div>