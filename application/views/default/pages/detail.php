<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="assets/images/pages/<?=$page->image;?>" width="100%" alt="">
		</div>
		<div class="col-md-8">
			<h4><?=$page->name;?></h4>
			<p>
				<?=$page->text;?>
			</p>
		</div>
	</div>
</div>

<section class="services_section section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
        <div class="row">
        
    <?php 
        $productGallery=get_page_gallery_category($page->pageId);
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