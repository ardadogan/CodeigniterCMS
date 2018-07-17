	<div class="row tophdr">
		<div class="col-md-4">
			<h2>

				<?php
					if($parentId==0){
						echo "Ana Kategoriler";
					}else{
						echo '<span>'.$category->name.'</span> Kategorisi';
					}
				?>
				
			</h2>
		</div>
		<div class="col-sm-4 text-right">
			
			<form method="GET" action="<?=base_url('product/search/');?>">
				<div class="input-group minimal headerSearchInput">
					<input type="text" class="form-control" name="q" placeholder="Kategori ya da ürün arayın">
					<span class="input-group-addon"><i class="entypo-search" onclick="jQuery('form').submit()"></i></span>
				</div>
			</form>

		</div>
		<div class="col-md-4 text-right">
			
			<?php
				if($parentId==0){
					btn_add('product/category/add/'.$parentId,'Yeni Kategori Oluştur');
				}else{
					btn_add('product/category/add/'.$parentId,'Yeni Alt Kategori Oluştur');
					btn('product/category/'.$category->parentId,'Geri','gold','entypo-back');
				}
			?>

		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			<?php
				if ($this->uri->segment(3)) {
			?>
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('product/category/sira/'.$this->uri->segment(3));?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >
			
			<?php
				}else{
			?>
				<form role="form" method="post" class="form-horizontal form-groups-bordered validate" id="data_form" action="<?=base_url('product/category/sira');?>" enctype="multipart/form-data" onsubmit="return false; form_gonder('data_form')" >
			<?php
				}
			?>
				<table class="table table-bordered table-hover responsive">
					<thead>
						<tr>
							<th colspan="2">Kategori</th>
							<th style="width: 100px;">Sıralama</th>
							<th colspan="2">İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							foreach ($list as $key => $value) { 

						?>
						<tr class="deleted_row_<?=$value->categoryId;?>">
							<td width="80"><img src="<?=app_url('assets/images/product/category/'.$value->image);?>" alt=""></td>
							<td><a href="product/category/<?=$value->categoryId;?>"><?=$value->name;?></a></td>
							<td><input type="number" class="form-control" name="sira[<?=$value->categoryId;?>]" value="<?=$value->sira;?>"></td>
							<td style="vertical-align:middle" width="230">
								<?=btn('product/product/'.$value->categoryId,'Ürünler','primary','entypo-box');?>
								<?=btn('product/category/'.$value->categoryId,'Kategoriler','primary','entypo-flow-tree');?>
							</td>
							<td style="vertical-align:middle" width="120">
								
								<?=btn_edit('product/category/edit/'.$value->categoryId);?>

								<?php
									btn_delete('product/category/delete/',$value->categoryId);
								?>


							</td>
						</tr>
						<?php } ?>
						<tr>
							<td></td>
							<td></td>
							<td>
								<a type="button" onclick="form_gonder('data_form')" class="btn btn-info btn-icon icon-left" data-toggle="tooltip" data-placement="top" data-original-title="Kaydet">
									Kaydet
									<i class="fa fa-save"></i>
								</a>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
<script type="text/javascript">
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
			<?php
				if ($this->uri->segment(3)) {
			?>
				if(data.status){
					app.redirect('product/category/<?=$this->uri->segment(3);?>');
				}
			
			<?php
				}else{
			?>
				if(data.status){
					app.redirect('product/category');
				}
			<?php
				}
			?>
				

			},
			error: function(data, textStatus, jqXHR){

				app.message('form_hatasi');

			},
		});


	}
</script>
