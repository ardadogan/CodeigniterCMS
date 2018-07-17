<div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Düzenle </h4>
		</div>
		<div class="modal-body">
			<form role="form" method="post" class="" id="modal_form" action="<?=base_url('gallery/gallery/photosOptionsSave');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('modal_form')" >
				<input type="hidden" name="photoId" value="<?=$photo->photoId;?>">

				<div class="row">
					<?php
						if($gallery->type=='gallery'){
							$path = sef_url($gallery->name);
						}else{
							$path = sef_url($gallery->type);

						}
					?>
					<div class="col-md-5">
						<img src="<?=app_url('assets/images/gallery/'.$path.'/'.$photo->image);?>" class="img-responsive" />
						<br>
						<button onclick="app.delete('gallery/gallery/delete/',<?=$photo->photoId;?>)" type="button" class="btn btn-white">
							<i class="entypo-trash"></i>
							Sil
						</button>
						<a href="<?=app_url('assets/images/gallery/'.$path.'/'.$photo->image);?>" target="_blank" class="btn btn-white">
							<i class="entypo-eye"></i>
							Görüntüle
						</a>


					</div>
					<div class="col-md-7">

						<div class="form-group">
							<label for="ad" class="col-sm-12 control-label">Görselin Adı</label>
							<div class="col-sm-12" data-toggle="tooltip" data-original-title="">
								<input type="text" class="form-control" name="name" value="<?=$photo->name;?>" id="ad"  />
							</div>
						</div>
						
						<div class="form-group">
							<label for="ad" class="col-sm-12 control-label">Açıklama</label>
							<div class="col-sm-12" data-toggle="tooltip" data-original-title="">
								<textarea class="form-control" name="description" id=""><?=$photo->description;?></textarea>
							</div>
						</div>


						<div class="form-group">
							<label for="ad" class="col-sm-12 control-label">URL</label>
							<div class="col-sm-12" data-toggle="tooltip" data-original-title="">
								<input disabled class="form-control" value="<?=app_url('assets/images/gallery/'.$path.'/'.$photo->image);?>" id="ad"  />
							</div>
						</div>


					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<?=btn_save('modal_form','Kaydet');?>
			<button type="button" class="btn btn-red btn-icon icon-right" data-dismiss="modal">
				<i class="entypo-cancel"></i>
				Kapat
			</button>
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