<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 waves-effect waves-light center">
				<i class="material-icons">&#xE5C4;</i>
			</a>
			<a class="col s8">
				<strong>{{pageData.config.pageName}}</strong>
			</a>
			<a ng-href="#/contact/cus" class="col s2 waves-effect waves-light center">
				<i class="material-icons">&#xE0BE;</i>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>


<div id="map"></div>


<div class="appContact1">
	<div class="container">
		
		<!-- Address -->
		<div class="row contact1Row" ng-if="pageData.address!=''">
			<div class="col s2">
				<i class="material-icons">&#xE569;</i>
			</div>
			<div class="col s10">
				<p ng-repeat="x in pageData.address">{{x}}</p>
			</div>
		</div>

		<!-- Telefon -->
		<div class="row contact1Row" ng-if="pageData.phone!=''">
			<div class="col s2">
				<i class="material-icons">&#xE551;</i>
			</div>
			<div class="col s10">
				<p ng-repeat="x in pageData.phone">{{x}}</p>
			</div>
		</div>

		<!-- Fax -->
		<div class="row contact1Row" ng-if="pageData.fax!=''">
			<div class="col s2">
				<i class="material-icons">&#xE8AD;</i>
			</div>
			<div class="col s10">
				<p ng-repeat="x in pageData.fax">{{x}}</p>
			</div>
		</div>

		<!-- GSM -->
		<div class="row contact1Row" ng-if="pageData.gsm!=''">
			<div class="col s2">
				<i class="material-icons">&#xE325;</i>
			</div>
			<div class="col s10">
				<p ng-repeat="x in pageData.gsm">{{x}}</p>
			</div>
		</div>

		<!-- Mail -->
		<div class="row contact1Row" ng-if="pageData.mail!=''">
			<div class="col s2">
				<i class="material-icons">&#xE0E1;</i>
			</div>
			<div class="col s10">
				<p ng-repeat="x in pageData.mail">{{x}}</p>
			</div>
		</div>



	</div>
</div>


<style>
	#map {height: 300px;  }
	.mapInfoDiv {  }
	.mapInfoDiv h4 {padding: 0;margin: 0;font-size: 16px;font-weight: 600;  }
	.mapInfoDiv p {padding: 0;margin: 0;  }
</style>