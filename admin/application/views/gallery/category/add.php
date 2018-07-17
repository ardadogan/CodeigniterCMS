

	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Yeni Albüm Oluştur</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_save('data_form');?>
			<?=btn_back('gallery/category');?>

		</div>
	</div>


<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-body">
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('gallery/category/create');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="form-group">
						<label class="col-sm-2 control-label">Resim Ayarları</label>
						
						<div class="col-sm-3">
							<input type="number" class="form-control" id="width" name="common[width]" placeholder="Genişlik">
							<small>Genişlik</small>
						</div>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="height" name="common[height]" placeholder="Yükseklik">
							<small>Yükseklik</small>
						</div>
						<div class="col-sm-3">
							<select name="common[ratio]" id="" class="form-control">
								<?=list_img_ratio(); ?>
							</select>
							<small>Resim boyutlandırma yöntemi</small>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Albüm Adı</label>
						
						<div class="col-sm-3">
							<input type="text" class="form-control" id="name" name="common[name]" placeholder="Albüm Adı">
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