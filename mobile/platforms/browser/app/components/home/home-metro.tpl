<img src="assets/img/blank-logo.png" style="width:100%" alt="">

<div class="app-home home-metro">
	<div class="container">
		<div class="row">
			<a ng-href="{{x.url}}" class="col s6" ng-repeat="x in homeData.list">
				<div class="metro-collapse">
					<ng-md-icon icon="{{x.icon}}" size="50" ></ng-md-icon>
					<h4 class="truncate">{{x.name}}</h4>
				</div>
			</a>
		</div>
	</div>
</div>