	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Sayfa Grupları</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_add('pages/category/add','Yeni Sayfa Grubu Oluştur');?>

		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-bordered table-hover responsive">
				<thead>
					<tr>
						<th colspan="2">Grup</th>
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach ($list as $key => $value) { 

					?>
					<tr class="deleted_row_<?=$value->categoryId;?>">
						<td width="30"><?=btn('pages/pages/category/'.$value->categoryId,'Sayfalar','primary','entypo-doc-text-inv');?></td>
						<td><?=$value->name;?></td>
						
						<td style="vertical-align:middle" width="210">
							
							<?=btn_edit('pages/category/edit/'.$value->categoryId);?>

							<?php
								if(!$value->protected){
									btn_delete('pages/category/delete/',$value->categoryId);
								}
							?>

							<?=btn('pages/pages/category/'.$value->categoryId,'Sayfalar','primary','entypo-doc-text-inv');?>


						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>

