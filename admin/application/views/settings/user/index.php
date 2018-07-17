

	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Kullanıcı Ayarları</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_save('data_form');?>
			<?=btn_back('pages/category');?>

		</div>
	</div>


<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-body">
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('settings/user/update');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="form-group">
						<label for="username" class="col-sm-3 control-label">Kullanıcı Adı</label>
						
						<div class="col-sm-4">
							<input type="text" class="form-control" id="width" name="common[username]" value="<?=@$user->username; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Şifre</label>
						
						<div class="col-sm-4">
							<input type="text" class="form-control" id="width" name="common[password]" value="<?=@$user->password; ?>">
							<small>Lütfen güçlü bir şifre belirleyin</small>
						</div>
					</div>


				</form>
				
			</div>
		
		</div>
	
	</div>
</div>
	


<script>

	function form_gonder(form_id){

		// Form Bilgilerini Topla
		var form = jQuery('#'+form_id);

		var formdata = false;
		if (window.FormData){
			formdata = new FormData(form[0]);
		}
		var formAction = form.attr('action');

		// Form Post
		jQuery.ajax({
			url         : formAction,
			data        : formdata ? formdata : form.serialize(),
			cache       : false,
			contentType : false,
			processData : false,
			type        : 'POST',
			success     : function(data, textStatus, jqXHR){
				
				app.message(data);

			},
			error: function(data, textStatus, jqXHR){

				app.message('form_hatasi');

			},
		});


	}


</script>