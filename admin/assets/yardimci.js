
var app = {


	modal: function(url){

		jQuery('.modal').modal('show', {backdrop: 'static'});
	
		jQuery.ajax({
			url: url,
			cache       : false,
			contentType : false,
			processData : false,
			crossDomain	: true,
			success: function(response)
			{
				jQuery('.modal').html(response);
			},
			beforeSend : function(xhr) {  
					xhr.setRequestHeader("Access-Control-Allow-Origin", "*");  
				},
		});

		show_loading_bar({
			pct: 100,
			delay: 0.1
		});

		hide_loading_bar();

	},


	message: function(data){

		// Bildirim Tonları
		// pley('http://sitenisec.com/sound/messages.mp3');

		var opts = {
				"closeButton": true,
				"debug": false,
				"positionClass": "toast-top-right",
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "10",
				"progressBar": true,
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};

		// toastr.info('İşleminiz gerçekleştirilemedi','Hatalı İşlem');

		if(data=='form_hatasi'){
			toastr.error('Bir sorun oluştu. İşleminiz gerçekleştirilemedi  ','Hatalı İşlem',opts);
		}else{

			if(data.status){
				toastr.success(data.message,'',opts);
			}else{
				toastr.error(data.message,'',opts);
			}

			/*
			// Mesajları Yazdır
				if(n[2]=="success"){
					toastr.success(''+n[0]+'',''+n[1]+'',opts);
				}else if(n[2]=="error"){
					toastr.error(''+n[0]+'',''+n[1]+'',opts);
				}else if(n[2]=="warning"){
					toastr.warning(''+n[0]+'',''+n[1]+'',opts);
				}else if(n[2]=="info"){
					toastr.info(''+n[0]+'',''+n[1]+'',opts);
				}else{
					if(n==""){
						toastr.error('Veri Alınamadı','',opts);
					}else{
						toastr.warning(n,'',opts);
					}
				}
			*/

		}

		hide_loading_bar();


	},


	delete: function(url,id){


		jQuery.confirm({
			icon: 'fa fa-warning',
			closeIcon: true,
			title: 'İçerik Silinecek',
			content: 'Seçtiğiniz içerik silinecek. Onaylıyor musunuz?',
			buttons: {
				success: {
					text: 'Evet',
					btnClass: 'btn-blue any-other-class',
					action: function(){
					
						jQuery.ajax({
							url         : url+id,
							cache       : false,
							contentType : false,
							processData : false,
							type        : 'POST',
							success     : function(data, textStatus, jqXHR){
								
								app.message(data);

								if(data.status){
									jQuery(".deleted_row_"+id).hide();
								}
								
							},
							error: function(data, textStatus, jqXHR){

								app.message(data);

							},
						});

					}
				},
				cancel: {
					text: 'İptal',
					btnClass: 'btn-red any-other-class',
					action: function(){
						
					}
				}
			}
		});


	},

	refresh: function(time=0){

		if(time==""){
			var time = 0;
		}
		
		time = time*1000;

		setTimeout(function(){
			location.reload(true);
		}, time);

	},


	redirect: function(url,time){
		
		if(time==""){
			var time = 0;
		}
		
		time = time*1000;

		setTimeout(function(){
			window.location=url;
		}, time);
	},


	addNewImageShow: function(){
		
		jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, 800);
	
		jQuery(".dropzone").attr("style",'border: 2px dashed #EE3769');

		setTimeout(function(){
		  jQuery(".dropzone").attr("style",'border: none');
		}, 2000);
		

	},




}

