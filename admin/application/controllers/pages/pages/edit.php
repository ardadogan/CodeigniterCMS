<div class="row tophdr">
	<div class="col-md-6">
		<h2>Sayfayı Düzenle </h2>
	</div>
	<div class="col-md-6 text-right">
		<?=btn_page_options($page->pageId);?>
		<?=btn_save('data_form');?>
		<?=btn_back('pages/pages/category/'.$page->categoryId);?>

	</div>
</div>


<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-body">
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('pages/pages/update/'.$page->pageId);?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="form-group">
						<label for="buton_text" class="col-sm-3 control-label">Görsel</label>
						<div class="col-sm-5" >
														
							<?php

								image_uploader(array(
										'width' => $category->width,
										'height' => $category->height,
										'currentImg' => app_url('assets/images/pages/'.$page->image),
										'inputName' => 'file',
									));
							?>

						</div>
					</div>


					<div class="form-group">
						

						<div class="col-md-12">
							<ul class="nav nav-tabs bordered">
								<?php
									# Create Language Tabs
									language_tabs();
								?>
							</ul>
							
							<div class="tab-content ">
								<?php

									foreach ($this->langs as $key => $value) {
										
										$langId = $value->languageId;
										$activeClass="";
										if($this->_lang->languageId==$value->languageId){
											$activeClass="active";
										}
								?>
										<input type="hidden" name="<?=$langId;?>[langId]" value="<?=@$langs[$value->languageId]['langId'];?>">
										
										<div class="tab-pane <?=$activeClass;?> form-horizontal form-groups-bordered validate" id="tab-<?=$value->code;?>">
											<p>
												<?=strtoupper($value->code);?> - <?=$value->alias;?> - <?=$value->name;?>
											</p>
											
											<div class="form-group">
												<label for="name" class="col-sm-2 control-label">Sayfa Adı </label>
												
												<div class="col-sm-5">
													<input type="text" class="form-control" id="name" name="<?=$langId;?>[name]" value="<?=@$langs[$value->languageId]['name'];?>" placeholder="Sayfa Adı">
												</div>
											</div>

											<div class="form-group">
												<label for="text" class="col-sm-2 control-label">Açıklama</label>
												
												<div class="col-sm-10">
												
													<textarea name="<?=$langId;?>[text]" id="" class="text_editor" placeholder="Sayfa detayı"><?=@$langs[$value->languageId]['text'];?></textarea>

												</div>
											</div>
										
										</div>
								<?php } ?>
							</div>
						</div>

					</div>

				</form>
				
			</div>
		
		</div>
	
	</div>
</div>


<?=text_editor();?>


<script>

	function form_gonder(form_id){


		tinyMCE.triggerSave();


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