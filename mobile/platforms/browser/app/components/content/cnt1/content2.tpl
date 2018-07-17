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


<div class="contentList2">
	<div class="container">
		<div class="row">

			<a ng-href="#/content/cnt1/{{contentName}}/{{x.url}}" ng-repeat="x in pageData.list" class="col s6 center">
				 <i class="fa fa-{{x.icon}} "></i>
				 <strong>{{x.name}}</strong>
			</a>

		</div>
	</div>
</div>