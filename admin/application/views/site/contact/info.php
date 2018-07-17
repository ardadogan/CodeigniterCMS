

	<div class="row tophdr">
		<div class="col-md-6">
			<h2><?=$category->name;?> İletişim Bilgileri</h2>
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
				
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('site/contact/infoUpdate/'.$category->categoryId);?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >

					<div class="row">
				<div class="col-md-3">
					
					<div class="panel panel-default" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Telefon
							</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
						<?php
							foreach ($ib as $key => $value) {
								// Telefon Numaralarını Al
								if($value['i_key']=="phone"){
									
									echo '
										<div class="form-group deleted_row_'.$value['id'].'">
											<div class="col-sm-12">
												<div class="input-group">
													<input type="text" class="form-control" name="phone['.$value['id'].']" value="'.$value['i_value'].'">
													<div class="input-group-btn">					
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" onclick="app.delete(\'site/contact/infoDelete/\','.$value['id'].')">
															<i class="entypo-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									';

								}
							}
						?>
							<div class="addRow_phone"></div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-original-title="Yeni phone numarası eklemeniz için alan oluşturur" onclick="addRow('phone')">
										Yeni Alan Ekle
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>

				<div class="col-md-3">
					
					<div class="panel panel-default" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								GSM
							</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
						<?php
							foreach ($ib as $key => $value) {
								// Telefon Numaralarını Al
								if($value['i_key']=="gsm"){
									
									echo '
										<div class="form-group deleted_row_'.$value['id'].'">
											<div class="col-sm-12">
												<div class="input-group">
													<input type="text" class="form-control" name="gsm['.$value['id'].']" value="'.$value['i_value'].'">
													<div class="input-group-btn">					
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" onclick="app.delete(\'site/contact/infoDelete/\','.$value['id'].')">
															<i class="entypo-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									';

								}
							}
						?>
							<div class="addRow_gsm"></div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-original-title="Yeni gsm numarası eklemeniz için alan oluşturur" onclick="addRow('gsm')">
										Yeni Alan Ekle
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>

				<div class="col-md-3">
					
					<div class="panel panel-default" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Fax
							</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
						<?php
							foreach ($ib as $key => $value) {
								// Telefon Numaralarını Al
								if($value['i_key']=="fax"){
									
									echo '
										<div class="form-group deleted_row_'.$value['id'].'">
											<div class="col-sm-12">
												<div class="input-group">
													<input type="text" class="form-control" name="fax['.$value['id'].']" value="'.$value['i_value'].'">
													<div class="input-group-btn">					
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" onclick="app.delete(\'site/contact/infoDelete/\','.$value['id'].')">
															<i class="entypo-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									';

								}
							}
						?>
							<div class="addRow_fax"></div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-original-title="Yeni fax numarası eklemeniz için alan oluşturur" onclick="addRow('fax')">
										Yeni Alan Ekle
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>

				<div class="col-md-3">
					
					<div class="panel panel-default" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								E-Posta
							</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
						<?php
							foreach ($ib as $key => $value) {
								// Telefon Numaralarını Al
								if($value['i_key']=="eposta"){
									
									echo '
										<div class="form-group deleted_row_'.$value['id'].'">
											<div class="col-sm-12">
												<div class="input-group">
													<input type="text" class="form-control" name="eposta['.$value['id'].']" value="'.$value['i_value'].'">
													<div class="input-group-btn">					
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" onclick="app.delete(\'site/contact/infoDelete/\','.$value['id'].')">
															<i class="entypo-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									';

								}
							}
						?>
							<div class="addRow_eposta"></div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-original-title="Yeni e-posta eklemeniz için alan oluşturur" onclick="addRow('eposta')">
										Yeni Alan Ekle
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>

				<div class="clear"></div>

				<div class="col-md-12">
					
					<div class="panel panel-default" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Adresler
							</div>
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
						<?php
							foreach ($ib as $key => $value) {
								// Telefon Numaralarını Al
								if($value['i_key']=="adres"){
									
									echo '
										<div class="form-group deleted_row_'.$value['id'].'">
											<div class="col-sm-12">
												<div class="input-group">
													<input type="text" class="form-control" name="adres['.$value['id'].']" value="'.$value['i_value'].'">
													<div class="input-group-btn">					
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" onclick="app.delete(\'site/contact/infoDelete/\','.$value['id'].')">
															<i class="entypo-trash"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									';

								}
							}
						?>
							<div class="addRow_adres"></div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-original-title="Yeni adres  eklemeniz için alan oluşturur" onclick="addRow('adres')">
										Yeni Alan Ekle
										<i class="entypo-plus"></i>
									</button>
								</div>
							</div>
						</div>
						
					</div>
				
				</div>


			</div>
		
				</form>
				
			</div>
		
		</div>
	
	</div>
</div>



<!-- 
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<input type="text" class="form-control">
										<div class="input-group-btn">					
											<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
												<i class="entypo-trash"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
 -->


<div class="sablonlar">
	<div class="sablon_phone" style="display: none;">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" class="form-control" name="phone[yeni][]" value="">
					<div class="input-group-btn">					
						<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
							<i class="entypo-trash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sablon_gsm" style="display: none;">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" class="form-control" name="gsm[yeni][]" value="">
					<div class="input-group-btn">					
						<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
							<i class="entypo-trash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sablon_fax" style="display: none;">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" class="form-control" name="fax[yeni][]" value="">
					<div class="input-group-btn">					
						<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
							<i class="entypo-trash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sablon_eposta" style="display: none;">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" class="form-control" name="eposta[yeni][]" value="">
					<div class="input-group-btn">					
						<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
							<i class="entypo-trash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sablon_adres" style="display: none;">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="input-group">
					<input type="text" class="form-control" name="adres[yeni][]" value="">
					<div class="input-group-btn">					
						<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">
							<i class="entypo-trash"></i>
						</button>
					</div>
				</div>
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


	function addRow(tur){

		if(tur=="phone"){
			var icerik = jQuery(".sablon_phone").html();

			jQuery(".addRow_phone").append(icerik);

		}else if(tur=="gsm"){
			var icerik = jQuery(".sablon_gsm").html();

			jQuery(".addRow_gsm").append(icerik);

		}else if(tur=="fax"){
			var icerik = jQuery(".sablon_fax").html();

			jQuery(".addRow_fax").append(icerik);

		}else if(tur=="eposta"){
			var icerik = jQuery(".sablon_eposta").html();

			jQuery(".addRow_eposta").append(icerik);

		}else if(tur=="adres"){
			var icerik = jQuery(".sablon_adres").html();

			jQuery(".addRow_adres").append(icerik);

		}

	}



</script>