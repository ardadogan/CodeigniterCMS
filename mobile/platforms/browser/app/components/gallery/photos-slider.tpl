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

<div class="photos-list photos-slider">

	<div class="slider">
		<ul class="slides">
			<li ng-repeat="x in photos.list">
				<img ng-src="{{cdn}}{{x.imagePath}}">
			</li>
		</ul>
	</div>

</div>