<div class="row tophdr">
	<div class="col-md-6">
		<h2><span><?=$category->name;?></span> Görselleri</h2>
	</div>
	<div class="col-md-6 text-right">
		
		<?php
			if($category->type=='gallery'){
				btn('gallery/category/','Albümler','primary','entypo-doc-text-inv');
			}elseif($category->type=='product'){
				btn('product/product/edit/'.$category->contentId,'Ürüne Git','primary','entypo-basket');
			}elseif($category->type=='page'){
				btn('pages/pages/edit/'.$category->contentId,'Sayfaya Git','primary','entypo-basket');
			}
			
			btn('gallery/category/edit/'.$category->galleryId,'Albümü Düzenle','gold','entypo-pencil');
			btn('javascript:app.addNewImageShow()','Yeni Görsel Ekle','info','entypo-plus');
		?>


	</div>
</div>




<div class="gallery-env">
	<div class="image-categories">
					</div>	

		
			<div class="row updatedImageArea">
				
			<?php 

				if($category->type=='gallery'){
					$path = sef_url($category->name);
				}else{
					$path = sef_url($category->type);

				}

				foreach ($photos as $key => $value) {
				

			?>

				<div class="col-sm-2 col-xs-4 deleted_row_<?=$value->photoId;?>	" data-tag="1d">
					
					<article class="image-thumb">
						
						<a class="image" href="javascript::" onclick="app.modal('gallery/gallery/photosOptions/<?=$value->photoId;?>')">
							<img src="<?=app_url('assets/images/gallery/'.$path.'/'.$value->image);?>" />
						</a>
						
						<div class="image-options">
							<a href="javascript::" onclick="app.modal('gallery/gallery/photosOptions/<?=$value->photoId;?>')" class="edit"><i class="entypo-pencil"></i></a>
							<a href="javascript::" onclick="app.delete('gallery/gallery/delete/',<?=$value->photoId;?>)" class="delete" title="Sil" data-toggle="tooltip" data-placement="top"><i class="entypo-cancel"></i></a>

						</div>
						
					</article>
				
				</div>
			<?php } ?>
			
				
			</div>
		
		</div>





		<hr />

		
		<h3>
			<?=$category->name;?> Albümüne Yeni Görseller Ekleyin - <span style="font-size: 14px;">Yüklenebilecek max dosya boyutu <strong><?=ini_get('post_max_size');?>B</strong></span>
		</h3>
		
		<br />

		<form role="form" method="post" class="dropzone dz-min" id="dropzone_example" action="<?=base_url('gallery/gallery/create/'.$category->galleryId);?>" enctype="multipart/form-data" >
			<div class="fallback">
				<input name="file" type="file" multiple />
			</div>
		</form>
		
		<div id="dze_info" class="hidden">
			
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Dropzone Uploaded Images Info</div>
				</div>
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="40%">File name</th>
							<th width="15%">Size</th>
							<th width="15%">Type</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>		




<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jcrop/jquery.Jcrop.min.css">
	<link rel="stylesheet" href="assets/js/dropzone/dropzone.css">
<!--  Javascript -->
	<script src="assets/js/jcrop/jquery.Jcrop.min.js"></script>
	<script src="assets/js/dropzone/dropzone.js"></script>



<script>
	function refreshImageArea(){


		jQuery.ajax({
			url         : '<?=base_url("gallery/gallery/ajax/".$category->galleryId);?>',
			cache       : false,
			contentType : false,
			processData : false,
			type        : 'POST',
			success     : function(data, textStatus, jqXHR){
				
				jQuery('.updatedImageArea').html(data);

			},
			error: function(data, textStatus, jqXHR){

				app.message('form_hatasi');

			},
		});


	}
</script>