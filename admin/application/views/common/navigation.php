<ul id="main-menu" class="main-menu">
	<li>
		<a href="home">
			<i class="entypo-gauge"></i>
			<span class="title">Anasayfa</span>
		</a>
	</li>
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


if(isset($data['Sayfalar'])){
	$pages = $this->commonModel->getNavPages();
	if($pages){
		$data['Sayfalar']['sub'] = $pages;
	}
}

if(isset($data['Galeri'])){
	$gallery = $this->commonModel->getNavAlbums();
	if($gallery){
		$data['Galeri']['sub'] = $gallery;
	}
}




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




	<li>
		<a href="login/logout">
			<i class="entypo-logout"></i>
			<span class="title">Çıkış</span>
		</a>
	</li>

</ul>