<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="#/home" class="col s2 center">
				<ng-md-icon icon="arrow_back" ></ng-md-icon>
			</a>
			<a class="col s10">
				<strong>{{photos.category.name}}</strong>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>

<div class="photos-list photos-block">

	<div class="photos-cover" style="background-image: url({{cdn}}{{photos.cover.imagePath}}) ">
		<img ng-src="" alt="">
		<h1>{{photos.category.name}}</h1>
	</div>

	<div class="had-container">
		<div class="row">
			<a class="col s6" ng-repeat="x in photos.list">
				<img class="materialboxed" ng-src="{{cdn}}{{x.imagePath}}" alt="">
			</a>
		</div>
	</div>
</div>