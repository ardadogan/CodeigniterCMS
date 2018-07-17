	<div class="row tophdr">
		<div class="col-md-8">
			<h2>İletişim Bilgileri Grupları</h2>
		</div>
	
		<div class="col-md-4 text-right">
			<?=btn_save('data_form');?>
		</div>
	</div>


					

	<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-body">		
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('site/social/update/');?>">


					<table class="table table-hover">
						<thead>
							<tr>
								<th><strong>İcon</strong></th>
								<th><strong>Medya</strong></th>
								<th><strong>Link</strong></th>
								<th><strong>Bağlantıyı Temizle</strong></th>
							</tr>
						</thead>
						
						<tbody>
							
							<?php

								foreach ($list as $key => $value) {

							?>
							<tr>
								<td style="vertical-align:middle"><i class="fa fa-<?=$value->sef;?>" style="color:#444;font-size: 20px;"></i></td>
								<td style="vertical-align:middle"><?=$value->name;?></td>
								<td style="vertical-align:middle">
									<input type="text" class="form-control input_clear_<?=$value->accountId;?>" name="url[<?=$value->accountId;?>]" value="<?=$value->url;?>">
								</td>
								<td>
									<button type="button" class="btn btn-info btn-icon icon-left" onclick="jQuery('.input_clear_<?=$value->accountId;?>').val('');">
										Bağlantıyı Temizle
										<i class="entypo-trash"></i>
									</button>
								</td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
			
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

				if(data.status){
					app.refresh(1);
				}


			},
			error: function(data, textStatus, jqXHR){

				app.message('form_hatasi');

			},
		});


	}


</script>
