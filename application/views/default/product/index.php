<div class="container product-page">
	<div class="row">
		<div class="col-md-6">
			<a href="<?=base_url($lng);?>">Anasayfa</a> /
			<a href="<?=base_url($lng.'/product');?>">Ürünler</a> /
			
			<?=get_product_path($categoryId,'/'); ?>

		</div>
		<div class="col-md-3">
			<form action="<?=base_url($lng.'/product/search');?>">
				<input type="search" name="q" value="<?=@$q;?>" placeholder="<?=_r("Ürünlerde ara");?>" id="">
			</form>
		</div>
		<div class="col-md-3 text-right"><strong><?php if(isset($category)){ echo $category->name; }else{ echo _r('Ürünler'); } ?></strong></div>
	</div>
	<hr>

	<div class="row">
		<div class="col-md-3 product-list">
			<?php

				function listele($data=false,$lng='tr',$categoryId=0){

				

					if($data){
						echo '<ul>';
						foreach ($data as $key => $value) {
							echo '<li>';

								if($value->categoryId==$categoryId){
									echo '<a href="'.base_url($lng.'/product/category/'.$value->categoryId.'/'.$value->url).'" class="active">'.$value->name.'</a>';
								}else{
									echo '<a href="'.base_url($lng.'/product/category/'.$value->categoryId.'/'.$value->url).'">'.$value->name.'</a>';
								}

								listele(get_product_category($value->categoryId),$lng,$categoryId);

							echo '</li>';
						}
						echo '</ul>';
					}

				}

				listele(get_product_category(0),$lng,$categoryId);
			?>
		</div>
		<div class="col-md-9">
			<div class="row">
				<?php

					
					if(!$products){
						echo _r("Ürün Bulunamadı");
					}else{
						
						foreach ($products as $key => $value) {
						
					?>
						<a href="<?=base_url($lng.'/product/'.$value->productId.'/'.sef_url($value->name));?>" class="col-md-4">
							<img src="assets/images/product/product/<?=$value->image;?>" style="width:100%;" alt="">
							<?=$value->name;?>
						</a>
					<?php } ?>
				<?php } ?>
			</div>
			
		</div>
	</div>
</div>