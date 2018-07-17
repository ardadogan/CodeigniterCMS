	<div class="row tophdr">
		<div class="col-md-8">
			<h2>İletişim Bilgileri Grupları</h2>
		</div>
	
		<div class="col-md-4 text-right">
			<?php   btn_add('site/contact/add/','Yeni Kategori Oluştur');  ?>

		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-bordered table-hover responsive">
				<thead>
					<tr>
						<th>Kategori</th>
						<th colspan="2">İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach ($category as $key => $value) { 

					?>
					<tr class="deleted_row_<?=$value->categoryId;?>">
						<td><?=$value->name;?></td>
						
						<td style="vertical-align:middle" width="100">
							<?=btn('site/contact/info/'.$value->categoryId,'Bilgiler','primary','entypo-phone');?>
						</td>
						<td style="vertical-align:middle" width="120">
							
							<?=btn_edit('site/contact/edit/'.$value->categoryId);?>

							<?php
								btn_delete('site/contact/delete/',$value->categoryId);
							?>


						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>

