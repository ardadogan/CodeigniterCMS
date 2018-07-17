<div class="container product-page">
	<div class="row">
		<div class="col-md-6">
			<a href="<?=base_url($lng);?>">Anasayfa</a> /
			<a href="<?=base_url($lng.'/product');?>">Ürünler</a> /
			
			<?=get_product_path($categoryId,'/'); ?> <?=$product->name;?>

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
				<div class="col-md-12">
					
				</div>
				<div class="col-md-6">
					<img src="assets/images/product/product/<?=$product->image;?>" style="width:100%;" alt="">
				</div>
				<div class="col-md-6">
					<h4><?=$product->name;?></h4>
					<?=$product->text;?>
				</div>
			</div>
			
		</div>
	</div>
</div>

<!-- PRODUCT GALLERY-->

<section class="services_section section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <div class="row">
        
    <?php 
	    $productGallery=get_product_gallery_category($product->productId);
	     foreach ($productGallery as $key => $value) {
	     $galleryPhotos=get_gallery_photos($value->galleryId);
	     foreach ($galleryPhotos as $key => $value) {
	      echo '   
            <div class="col-md-4 col-xs-6 xxs_fullwidth">
                <div class="">
                    <div class="service_img" style="margin-bottom:15px;" >
                      <a class="fancybox" rel="gallery1" rel="group" href="'.$value->path.'">  <img src="'.$value->path.'" style="width:100%;" alt="service-img"> </a>
                    </div>
                </div>
            </div>';    
              }
          }
      ?>

        </div><!-- /.row end -->
    </div>
    <!-- /.container starts -->
</section>