
	<div class="row">
		<div class="col-md-12 search-result">

			<div class="search-box">
				<form method="GET" action="<?=base_url('product/search/');?>">
					<input type="text" name="q" value="<?=$q;?>" placeholder="Kategori ya da ürün arayın">
				</form>
			</div>
			
			<p>
				<strong><?=$q;?></strong> arama sonuçları. <strong><?=$category['count'];?></strong> Kategori |  <strong><?=$product['count'];?></strong> Ürün | Toplam <strong><?=$count;?></strong> sonuç bulundu

			</p>
			<br>

			<ul>

				<?php
					foreach ($product['list'] as $key => $value) {
						echo '
							<li>
								<a href="'.base_url('product/product/edit/'.$value->productId).'">
									<h4>'.$value->name.'</h4>
									<p>Açıklama bulunamadı</p>
								</a>
							</li>
						';
					}
				?>

				<?php
					foreach ($category['list'] as $key => $value) {
						echo '
							<li>
								<a href="'.base_url('product/category/edit/'.$value->categoryId).'">
									<h4>'.$value->name.'</h4>
									<p>Açıklama bulunamadı</p>
								</a>
							</li>
						';
					}
				?>
			</ul>
			
		</div>

	</div>
