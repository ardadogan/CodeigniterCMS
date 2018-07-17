<div class="row tophdr">
	<div class="col-md-9">
		<h2>Dil Seçenekleri</h2>
	</div>

	<div class="col-md-3 text-right">
	
		<?=btn_save('data_form');?>

	</div>
</div>



<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('settings/language/update');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >
	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-bordered table-hover responsive">
				<thead>
					<tr>
						<th width="10">İşlemler</th>
						<th colspan="4">Dil</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach ($list as $key => $value) { 

							if($value->status){
								$color 		= 'blue';
								$checked 	= 'checked';
							}else{
								$color 		= 'green';
								$checked 	= '';
							}

					?>
					<tr class="deleted_row_<?=$value->languageId;?>">
						<td style="vertical-align:middle" >
							<div class="checkbox checkbox-replace color-<?=$color;?>">
								<input type="checkbox" name="languages[]" value="<?=$value->languageId;?>" <?=$checked;?>>
							</div>
						</td>
						<td><?=strtoupper($value->code);?></td>
						<td width="80"><img src="assets/images/flag/<?=$value->image;?>" alt=""></td>
						<td><?=$value->alias;?></td>
						<td><?=$value->name;?></td>
						
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>
</form>



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
					app.refresh(2);
				}

			},
			error: function(data, textStatus, jqXHR){

				app.message('form_hatasi');

			},
		});


	}


</script>