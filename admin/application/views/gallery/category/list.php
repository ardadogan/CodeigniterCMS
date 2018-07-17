	<div class="row tophdr">
		<div class="col-md-6">
			<h2>Albümler</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_add('gallery/category/add','Yeni Albüm Oluştur');?>

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
					<tr class="deleted_row_<?=$value->galleryId;?>">
						<td width="30"><?=btn('gallery/gallery/category/'.$value->galleryId,null,'primary','entypo-doc-text-inv');?></td>
						<td><?=$value->name;?></td>
						
						<td style="vertical-align:middle" width="210">
							
							<?=btn_edit('gallery/category/edit/'.$value->galleryId);?>

							<?php
								if(!$value->protected){
									btn_delete('gallery/category/delete/',$value->galleryId);
								}
							?>

							<?=btn('gallery/gallery/category/'.$value->galleryId,'Görseller','primary','entypo-doc-text-inv');?>


						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>

