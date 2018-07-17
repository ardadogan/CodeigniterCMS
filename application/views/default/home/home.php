<div class="container">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner">
			<?php

				$slider = get_gallery_photos(1);

				foreach ($slider as $key => $value) {
					echo '
						<div class="item '.$value->first.'">
							<img src="'.$value->path.'">
						</div>
					';
				}
			?>


			<!-- SLİDER YAZI EKLEME


			Başlık ->           '.$value->name.'
			Açıklama yazısı ->	'.$value->description.'


			 -->

		</div>
		<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>
