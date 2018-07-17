<h2>Yönetim Paneli Anasayfa</h2>


<div class="home-shortcut-links">
	<ul>
		<li>
			<a href="">
				<img src="assets/images/icons/circle/settings.png" alt="">
				<strong>Ayarlar</strong>
			</a>
		</li>
		<li>
			<a href="site/contact">
				<img src="assets/images/icons/circle/contact.png" alt="">
				<strong>İletişim Bilgileri</strong>
			</a>
		</li>
		<li>
			<a href="settings/seo">
				<img src="assets/images/icons/circle/seo.png" alt="">
				<strong>SEO Ayarları</strong>
			</a>
		</li>
		<li>
			<a href="settings/user">
				<img src="assets/images/icons/circle/user.png" alt="">
				<strong>Kullanıcı Ayarları</strong>
			</a>
		</li>
		<li>
			<a href="pages/category/">
				<img src="assets/images/icons/circle/pages.png" alt="">
				<strong>Sayfalar</strong>
			</a>
		</li>
		<li>
			<a href="gallery/category/">
				<img src="assets/images/icons/circle/gallery.png" alt="">
				<strong>Galeri</strong>
			</a>
		</li>
		<li>
			<a href="settings/language/">
				<img src="assets/images/icons/circle/languages.png" alt="">
				<strong>Dil Seçenekleri</strong>
			</a>
		</li>
		<li>
			<a href="product/category/">
				<img src="assets/images/icons/circle/product.png" alt="">
				<strong>Ürünler</strong>
			</a>
		</li>
		<li>
			<a href="site/social/">
				<img src="assets/images/icons/circle/social.png" alt="">
				<strong>Sosyal Medya Hesapları</strong>
			</a>
		</li>

	</ul>
</div>



<div class="home-cards">
	<div class="row">
		
		<?php if(empty($base->analytics_code)){ ?>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<div class="card-image">
						<img src="assets/images/cards/analyicts.png" alt="">
					</div>
					<div class="card-title">
						<h4>Google Analytics Kodu Ekleyin</h4>
					</div>
					<div class="card-desc">
						<p>Sitenize google analytics kodu ekleyerek siteniz ile ilgili gelişmiş istatistikler elde edebilirsiniz.</p>
					</div>
					<div class="card-buttons">
						<a href="https://www.google.com/analytics/" target="_blank">Google Analytics</a>
						<a href="settings/seo">Ekle</a>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if(empty($base->google_site_verification)){ ?>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<div class="card-image">
						<img src="assets/images/cards/google_site_verification.png" alt="">
					</div>
					<div class="card-title">
						<h4>Google Doğrulama Kodu Bulunamadı</h4>
					</div>
					<div class="card-desc">
						<p>Sitenize google doğrulama kodunu aşağıdaki bağlantıdan ekleyebilirsiniz. Bu bölüm site yöneticileri ile ilgilidir</p>
					</div>
					<div class="card-buttons">
						<a href="settings/seo">Ekle</a>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if(!$safe){ ?>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<div class="card-image">
						<img src="assets/images/cards/security.png" alt="">
					</div>
					<div class="card-title">
						<h4>Giriş Bilgilerinizi Gözden Geçirin</h4>
					</div>
					<div class="card-desc">
						<p>Kullanıcı adı ya da şifreniz yeteri kadar güvenli değil gibi. Lütfen bilgilerinizin güvenliği için tahmin edilmesi zor ve karmaşık şifreler deneyin <br> Merak etmeyin, şifrenizi unuttuğuzda biz buradayız</p>
					</div>
					<div class="card-buttons">
						<a href="settings/user">Düzenle</a>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</div>


<div class="homeShortcut">


<ul>
	<?php



$data = array();
$arrKey = '';

foreach(preg_split("/((\r?\n)|(\r\n?))/", $this->navLinks) as $line){
	
	$line = trim($line);

	if(!empty($line)){

		if($line[0]=='-'){

			$line = ltrim($line,'-');

			if(stristr($line, '|')){
				$exp = explode('|', $line);
				$data[$exp[0]] = array(
					'name' => $exp[0],
					'url' => $exp[1],
					'icon' => $exp[2],
					);
			}

		}elseif($line[0]=='+'){

			$line = ltrim($line,'+');

			if(stristr($line, '|')){
				$exp = explode('|', $line);
				
				$arrKey = $exp[0];

				$data[$exp[0]] = array(
					'name' => $exp[0],
					'url' => $exp[1],
					'icon' => $exp[2],
					);
			}

		}elseif($line[0]=='*'){

			$line = ltrim($line,'*');

			if(stristr($line, '|')){
				$exp = explode('|', $line);
			
				$data[$arrKey]['sub'][$exp[0]] = array(
					'name' => $exp[0],
					'url' => $exp[1],
					);
			}
		}

	}
	
}

ksort($data);

foreach ($data as $key => $value) {
	echo '<li>
			<a href="'.$value['url'].'">
				<i class="'.$value['icon'].'"></i>
				<span class="title">'.$value['name'].'</span>
			</a>';

		if(isset($value['sub'])){

			echo '<ul>';
				foreach ($value['sub'] as $skey => $sval) {
					echo '<li>
						<a href="'.$sval['url'].'">
							<span class="title">'.$sval['name'].'</span>
						</a>
					</li>';
				}
			echo '</ul>';

		}


	echo '</li>';
}



?>


</ul>




</div>