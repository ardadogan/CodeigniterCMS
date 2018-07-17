

	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Arama Motoru Ayarları</h2>
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
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('settings/seo/update');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="form-group">
						<label for="sliderName" class="col-sm-3 control-label">Google Doğrulama Kodu</label>
						
						<div class="col-sm-4">
							<input type="text" class="form-control" id="width" name="common[google_site_verification]" placeholder="Google Site Verification Code" value="<?=@$base->google_site_verification; ?>">
							<small>Google Site Verification Code</small>
						</div>
					</div>

					<div class="form-group">
						<label for="sliderName" class="col-sm-3 control-label">Google Analytics İzleme Kodu</label>
						
						<div class="col-sm-6">
							<textarea name="common[analytics_code]" rows="10" class="form-control" placeholder="Google analytics izleme kodunu buraya yapıştırın"><?=@$base->analytics_code; ?></textarea>
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

										<input type="hidden" name="<?=$langId;?>[langId]" value="<?=$langId;?>">

										<div class="tab-pane <?=$activeClass;?> form-horizontal form-groups-bordered validate" id="tab-<?=$value->code;?>">
											<p>
												<?=strtoupper($value->code);?> - <?=$value->alias;?> - <?=$value->name;?>
											</p>
											<div class="form-group">
												<label for="title" class="col-sm-3 control-label">Başlık</label>
												
												<div class="col-sm-5">
													<input type="text" class="form-control" id="title" name="<?=$langId;?>[title]" value="<?=@$langs[$value->languageId]['title'];?>" placeholder="Sayfa Başlığı">
													<small>Title | 60 Karakter</small>
												</div>
											</div>

											<div class="form-group">
												<label for="description" class="col-sm-3 control-label">Açıklama</label>
												
												<div class="col-sm-5">
													<textarea name="<?=$langId;?>[description]" id="description" class="form-control" placeholder="Sayfa Açıklaması"><?=@$langs[$value->languageId]['description'];?></textarea>
													<small>Description | 160 Karakter</small>
												</div>
											</div>

											<div class="form-group">
												<label for="keywords" class="col-sm-3 control-label">Anahtar Kelimeler</label>
												
												<div class="col-sm-5">
													<textarea name="<?=$langId;?>[keywords]" id="keywords" class="form-control" placeholder="Anahtar Kelimeler"><?=@$langs[$value->languageId]['keywords'];?></textarea>
													<small>Keywords | 260 Karakter</small>
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