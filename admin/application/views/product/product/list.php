	<div class="row tophdr">
		<div class="col-md-6">
			<h2><span><?=$category->name;?></span> Kategorisi Ürünleri</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_add('product/product/add/'.$category->categoryId,'Yeni Ürün Ekle');?>
			<?=btn('product/category/'.$category->parentId,'Geri','gold','entypo-back');?>

		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-bordered table-hover responsive">
				<thead>
					<tr>
						<th colspan="2">Ürün</th>
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach ($list as $key => $value) { 

					?>
					<tr class="deleted_row_<?=$value->productId;?>">
						<td width="80"><img src="<?=app_url('assets/images/product/product/'.$value->image);?>" alt=""></td>
						<td><?=$value->name;?></td>
					
						<td style="vertical-align:middle" width="120">
							
							<?=btn_edit('product/product/edit/'.$value->productId);?>

							<?php
								btn_delete('product/product/delete/',$value->productId);
							?>


						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>
