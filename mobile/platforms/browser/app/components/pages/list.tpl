<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="#/home" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s10">
				<strong>{{pageData.category.name}}</strong>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>

<div ng-if="pageData.count < 1" class="empty-content">
	<img ng-src="assets/img/empty.png" alt="">
	<h4>İçerik Bulunamadı</h4>
</div>

<div class="page-list list-default" ng-if="pageData.count > 0">
	<div class="container">
		<a class="row" ng-repeat="x in pageData.list" ng-href="#/pages/detail/{{x.pageId}}">
			<div class="col s2 center">
				<img ng-src="{{cdn}}{{x.imagePath}}" style="width:100%;" ng-if="x.image!='default.png'">
				<ng-md-icon icon="{{pageData.category.mobile_icon}}" ng-if="x.image=='default.png'"></ng-md-icon>
			</div>
			<div class="col s10">
				<strong class="truncate">{{x.name}}</strong>
			</div>
		</a>
	</div>
</div>