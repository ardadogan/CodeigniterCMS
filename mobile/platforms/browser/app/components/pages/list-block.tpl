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

<div class="page-list list-block" ng-if="pageData.count > 0">
	<div class="container">
		<div class="row">
			<a ng-href="#/pages/detail/{{x.pageId}}" class="col s6" ng-repeat="x in pageData.list">
				<img ng-src="{{cdn}}{{x.imagePath}}" style="width:100%;" alt="">
				<strong class="truncate">{{x.name}}</strong>
			</a>
		</div>
	</div>
</div>