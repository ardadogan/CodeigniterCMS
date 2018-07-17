<div class="appHeader">
	<div class="had-container">
		<div class="row">
			<a ng-href="{{prePage}}" class="col s2 waves-effect waves-light center">
				<i class="material-icons">&#xE5C4;</i>
			</a>
			<a class="col s10">
				<strong>Bize Ulaşın</strong>
			</a>
		</div>
	</div>
</div>
<div class="appHeaderMargin"></div>



<div class="appContactUs">
	<div class="container">
		
		<form ng-submit="processForm()">

			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">&#xE853;</i>
					<input id="name" ng-model="formData.name" type="text" class="validate">
					<label for="name">İsim Soyisim</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">&#xE0D0;</i>
					<input id="mail" ng-model="formData.mail" type="text" class="validate">
					<label for="mail">E-Posta Adresi</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">&#xE0CF;</i>
					<input id="phone" ng-model="formData.phone" type="text" class="validate">
					<label for="phone">Telefon </label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">&#xE8D2;</i>
					<input id="subject" ng-model="formData.subject" type="text" class="validate">
					<label for="subject">Konu </label>
				</div>
			</div>


			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">&#xE0C9;</i>
					<textarea id="textarea1" ng-model="formData.message" class="materialize-textarea"></textarea>
					<label for="textarea1">Mesaj </label>
				</div>
			</div>


			<div class="row">
				<div class="input-field col s12">
					<button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">&#xE163;</i> Gönder</button>
				</div>
			</div>

		</form>

	</div>
</div>

