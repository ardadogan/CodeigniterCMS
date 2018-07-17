<!DOCTYPE html>
<html lang="<?=$lng;?>" dir="ltl">
	<head>

		<?=$meta->html;?>

	

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		

		<!-- Bootstrap -->
		<link href="assets/<?=$template;?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/<?=$template;?>/css/custom.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>


	<nav class="navbar  navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?=$this->app->domain;?></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				<li class="active"><a href="<?=base_url($lng);?>"><?=_r('Anasayfa');?></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('Kurumsal');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php 
							$list = get_page_list(1);

							foreach ($list as $key => $value) {
								echo '<li><a href="'.$value->mainUrl.'/'.$value->pageId.'/'.$value->pageUrl.'">'.$value->name.'</a></li>';
							}

						?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="<?=base_url($lng);?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('Ürünlerimiz');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php

							$productCategory  = get_product_category(0);

							foreach ($productCategory as $key => $value) {
								echo '<li><a href="'.$lng.'/product/category/'.$value->categoryId.'/'.$value->url.'">'.$value->name.'</a></li>';
							}

						?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('Hizmetlerimiz');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><?=_r('İsteğe Özel Üretim');?></a></li>
						<li><a href="#"><?=_r('Montaj');?></a></li>
						<li><a href="#"><?=_r('De Montaj');?></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('Sayfalar');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><?=_r('Galeri');?></a></li>
					</ul>
				</li>
				<li><a href="#about"><?=_r('Referanslarımız');?></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('İletişim');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?=base_url($lng.'/contact');?>"><?=_r('İletişim');?></a></li>
						<li><a href="<?=base_url($lng.'/contact/group');?>"><?=_r('Gruplar');?></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=_r('Dil');?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php
							foreach ($this->languages as $key => $value) {
								echo '<li><a href="'.base_url($value->code).'">'.$value->code.'</a></li>';
							}
						?>
					</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>

