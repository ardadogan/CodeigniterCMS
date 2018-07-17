	<div class="row tophdr">
		<div class="col-md-6">
			<h2><span><?=$category->name;?></span> Grubu Sayfaları</h2>
		</div>
		<div class="col-md-6 text-right">
			
			<?=btn_add('pages/pages/add/'.$category->categoryId,'Yeni Sayfa Ekle');?>
			<?=btn('pages/category/','Sayfa Grupları','primary','entypo-doc-text-inv');?>

		</div>
	</div>



	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-bordered table-hover responsive">
				<thead>
					<tr>
						<th colspan="2">Sayfa</th>
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach ($list as $key => $value) { 

					?>
					<tr class="deleted_row_<?=$value->pageId;?>">
						<td width="150"><img src="../assets/images/pages/<?=$value->image;?>" alt=""></td>
						<td><?=$value->name;?></td>
						
						<td style="vertical-align:middle" width="110">
							
							<?=btn_edit('pages/pages/edit/'.$value->pageId);?>

							<?=btn_delete('pages/pages/delete/',$value->pageId);?>


						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>
