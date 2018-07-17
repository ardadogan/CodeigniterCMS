var ls = {

	set: function(key,data){

		localStorage.setItem(key,data);

	},

	get: function(key){

		var d = localStorage.getItem(key);
		if(d){
			return d;
		}else{
			return false;
		}
		
	},

	delete: function(key){
		
		var d = localStorage.removeItem(key);

		return true;

	},


}


var lib = {

	numberStart: false,

	redirect: function(url,time){
		if(time==""){ var time = 0; }
		time = time*1000;
		setTimeout(function(){ window.location=url; }, time);
	},


	setJson: function(data){
		return JSON.stringify(data);
	},

	getJson: function(data){
		return JSON.parse(data);
	},

	showLoader: function(){
		$(".appLoaderScreen").show();
	},

	hideLoader: function(){ 
		$(".appLoaderScreen").hide();
	},


	sessionDestroy: function(){

		// Delete Local Storage Data
			
		lib.redirect('#/home');
	},


	cons: function(data,seperator){

		if(seperator){
			console.log('------------|'+seperator+'|------------')
		}

		console.log(data);
	},


	goBack: function(){
		window.history.back();
	}



}