

	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Kategoriyi Düzenle</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_save('data_form');?>
			<?=btn_back('site/contact');?>

		</div>
	</div>


<?php
	if(isset($_GET['show_message'])){
		block_message($category->name.' İletişim Kategorisi Oluşturuldu','Bu iletişim kategorisi grubu ile ilgili işlemlerinizi bu sayfada gerçekleştirebilirsiniz');
	}
?>

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-body">
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('site/contact/update/'.$category->categoryId);?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Kategori Adı </label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="name" name="name" value="<?=$category->name;?>" placeholder="Kategori Adı">
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