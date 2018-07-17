<img src="assets/img/blank-logo.png" style="width:100%" alt="">

<div class="app-home home-circle">
	<div class="container">
		<div class="row">
				
			<a ng-href="{{x.url}}" class="col s6" ng-repeat="x in homeData.list">
				<ng-md-icon icon="{{x.icon}}" size="50" ></ng-md-icon>
				<h4 class="truncate">{{x.name}}</h4>
			</a>

		</div>
	</div>
</div>