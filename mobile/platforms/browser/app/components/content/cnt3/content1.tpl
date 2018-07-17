<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 waves-effect waves-light center">
				<i class="material-icons">&#xE5C4;</i>
			</a>
			<a class="col s10">
				<strong>{{pageData.config.pageName}}</strong>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>


<div class="contentList1">
	<div class="container">
		
		<!-- With Link -->
		<a ng-if="x.url" ng-click="getUrl(x.url)" class="row"  ng-repeat="x in pageData.list">
			<div class="col s2 center"><i class="fa fa-{{x.icon}} color-{{x.icon}} "></i></div>
			<div class="col s10">{{x.name}}</div>
		</a>

		<!-- Without Link -->
		<a ng-if="!x.url" class="row"  ng-repeat="x in pageData.list">
			<div class="col s2 center"><i class="fa fa-{{x.icon}} color-{{x.icon}} "></i></div>
			<div class="col s10">{{x.name}}</div>
		</a>

	</div>
</div>

