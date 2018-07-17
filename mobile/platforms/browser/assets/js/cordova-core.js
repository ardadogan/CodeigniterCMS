var cordApp = {
	// Application Constructor
	initialize: function() {
		this.bindEvents();
	},



	bindEvents: function() {
		document.addEventListener('deviceready', this.onDeviceReady, false);
	},



	onDeviceReady: function() {
		cordApp.startApp('deviceready');
		document.addEventListener("backbutton", this.onBackKeyDown, false);
	},



	startApp:  function(){
		lib.redirect("app.html");
	},


	deviceStart: function(){
		document.addEventListener("backbutton", this.onBackKeyDown, false);
	},



	onBackKeyDown: function(e){
		e.preventDefault();
		
		if(exitApp){
			navigator.notification.confirm("Uygulamadan çıkılsın mı?", this.onConfirm, "Çıkış onayı", "Evet,Hayır"); 
		}else{
			lib.redirect(prePage);
		}

	},



	onConfirm: function(button) {
		if(button==2){
			return;
		}else{
			this.devExit();
		}
	},



	devExit: function() {
		navigator.app.exitApp();
	},



	devAlert: function(title,message,buttonName) {

		if(!title){ var title = "Başlık"; }
		if(!message){ var message = "Mesaj"; }
		if(!buttonName){ var buttonName = "Tamam"; }

		navigator.notification.alert(message,buttonName,title);
	},



	devBeep: function(repeat){
		if(!repeat){
			var repeat = 1;
		}
		navigator.notification.beep(repeat);
	},



	devVibrate: function(sure) {
		if(!sure){
			var sure  = 100;
		}
		navigator.notification.vibrate(sure);
	}



	
	
	
};
