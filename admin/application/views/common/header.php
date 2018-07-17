<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title;?></title>
	<base href="<?=base_url();?>">
	
	<meta name="robots" content="nofollow,noindex" />
	<meta name="googlebot" content="nofollow,noindex" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Yönetim Paneli" />
	<meta name="author" content="analitikreklam.com" />


	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="assets/css/gfont.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	
	<link rel="stylesheet" href="assets/css/jquery-confirm.min.css">
	
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<script src='assets/js/tinymce/tinymce.min.js'></script>

	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script>

		function ctrls(form_id){

			jQuery(document).bind('keydown', function(e) {
			  if(e.ctrlKey && (e.which == 83)) {
				e.preventDefault();
				form_gonder(form_id);
				return false;
			  }
			});

		}
		
	</script>


</head>
<body class="page-body" data-url="http://analitikreklam.com">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="home">
						<img src="assets/images/logo@2x.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<?php
				
				/**
				 * Navigasyon
				 *
				 * Navigasyonu düzenlemeki için core/MY_Controller.php dosyasından navLinks fonksiyonunu ziyaret edin
				 *
				 * Sublime text için: navLinks() <- Burada sağ tıklayın ve Goto Definition seçeneğine tıklayın
				 */


				$this->load->view('common/navigation');
				
			?>
			
		</div>

	</div>

	<div class="main-content">

		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
							Yönetici
						</a>
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<?php if(stripos($this->navLinks, 'settings/user')){ ?>
								<li>
									<a href="<?=base_url('settings/user');?>">
										<i class="entypo-user"></i>
										Kullanıcı Ayarları
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
		
				</ul>
		
		
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
					
					
					<li>
						<a href="http://<?=$this->appConfig['domain'];?>" target="_blank">
							Siteye Git <i class="entypo-logout right"></i>
						</a>
					</li>

		
					<li class="sep"></li>
		
					<li>
						<a href="<?=base_url('login/logout');?>">
							Çıkış Yap <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
<hr>
