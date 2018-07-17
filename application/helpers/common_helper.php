<?php

/*
 FONKSİYON LİSTESİ

--| get_page_list
		Sayfa listesini verir

--| get_gallery_photos
		Galerideki fotoğraf listesini verir

--| get_product_category
		Kategori listesini verir
	
--| get_product_sub_category
		Alt kategori listesini verir

--| get_product_list
		Ürün listesini verir

--| get_product_path
		Kategori hiyerarşisini verir
		Örnek: Teknoloji>Bilgisayar>Dizüstü>Acer 

--| sef_url
		Sef url oluşturur
		Örnek: Yeni Ürünler => yeni-urunler

--| get_contact_info
		İletişim Bilgilerini Verir

--| phone_format
		Telefon numaralarının düzgün formatta yazılmasını sağlar. Tüm yazımlar tek yazım formatına dönüştürülür
		Örnek: 3121234567 		=> +90 312 123 4567
		Örnek: 0545 987 65 43 	=> +90 545 987 6543
	
--| get_contact_category
		İletişim bilgilerindeki kategorilerin listesini verir

 */

if ( ! function_exists('get_page_list'))
{
	/**
	 * Get Page List
	 *
	 * Gönderilen kategoriye ait safyaların listesini verir
	 *
	 * 
	 *
	 * @see  Okunabilir oluşturulma tarihi (date) varsayılan olarak tarih saat formatı ile döndürülür
	 *       Okunabilir oluşturulma tarihi yalnızca tarih içerecekse aşağıdaki gibi parametre gönderin
	 *
	 * 		change_date_format($value->createDate,'date');
	 *
	 * @param categoryId 	Sayfaların listeleneceği kategori ID
	 *
	 * @return pageId 		Sayfa ID'si
	 * @return name 		Sayfa adı
	 * @return text 		Sayfa içeriği
	 * @return categoryId 	Sayfanın kategori ID'si
	 * @return languageId 	Sayfanın dil ID'si
	 * @return langId 		Sayfanın dil ID'si
	 * @return description 	Sayfanın mategori açıklaması
	 * @return image 		Sayfanın görseli
	 * @return imagePath 	Sayfa görselinin tam yolu
	 * @return createDate 	Sayfa oluşturulma tarihi
	 * @return date 		Okunabilir oluşturulma tarihi
	 * @return mainUrl 		Sayfa kategorisi ve aktif dil için oluşturulan url
	 * @return pageUrl 		Sayfa sef url'i
	 * @return url 			Sayfaya ulaşılabilecek tam link
	 *
	 *		 
	 */
	function get_page_list($categoryId=false)
	{

		$ci =& get_instance();

		$category = $ci->commonModel->getPageCategoryInfo($categoryId);

		$data = $ci->db
						->join('pages_lang lng','lng.pageId=p.pageId')
						->where('lng.languageId',$ci->_lng->languageId)
						->where('p.categoryId',$categoryId)
						->where('lng.name !=',"")
						->get('pages p')
						->result();

		$response = array();

		foreach ($data as $key => $value) {
			$response[$key] 			= $value;
			$response[$key]->mainUrl 	= $ci->_lng->code.'/page/'.sef_url($category->name);
			$response[$key]->date 		= change_date_format($response[$key]->createDate);
			$response[$key]->pageUrl 	= sef_url($value->name);
			$response[$key]->imagePath 	= 'assets/images/pages/'.$response[$key]->image;
			$response[$key]->url 		= $response[$key]->mainUrl.'/'.$response[$key]->pageId.'/'.$response[$key]->pageUrl;
		}

		return $response;



	}
}

if ( ! function_exists('get_page_gallery_category'))
{

	/**
	 * Get Gallery Category
	 *
	 * Tüm galeri kategorilerini listeler
	 * Bu fonksiyon ile yalnızca tipi galeri olan veriler çekilir
	 *
	 * @uses get_gallery_category();
	 *
	 * @param  ignore 	array	Listede hariç tutulacak Id'ler
	 * 			@uses get_gallery_category(array(1,4,6));
	 * 
	 * @return galleryId 		Galeri kategori ID'si
	 * @return type 			Galeri Tipi
	 * @return contentId 		Diğer içerikler için oluşturulan galerilerin bağlı oldu içerik ID'si
	 * @return name 			Kategori Adı
	 * @return protected		Korumalı sayfalar için kullanılır. true false değer alır
	 * @return width 			Galeride kullanılacak görsellerin genişliği
	 * @return height 			Galeride kullanılacak görsellerin yüksekliği
	 * @return ratio 			Sayfalar için kullanılacak görsel boyutlandırma yöntemi
	 * @return mobile_icon 		Mobil uygulamalar için material icon adları
	 *		 
	 */
	function get_page_gallery_category($ignore=false)
	{

		$ci =& get_instance();

			$category = $ci->db->where('type','page')->where("contentId",$ignore)->get('gallery_category')->result();

		return $category;

	}
}
if ( ! function_exists('get_page_category_list'))
{
	/**
	 * Get Page Category List
	 *
	 * Tüm sayfa kategorilerini döndürür
	 *
	 * 
	 *
	 * @uses	get_page_category_list();
	 *
	 * @return categoryId	Sayfa kategori ID'si
	 * @return name			Kategori adı
	 * @return text			Kategori açıklama yazısı
	 * @return protected	Korumalı sayfalar için kullanılır. true false değer alır
	 * @return width		Sayfalar için kullanılacak görsel genişliği
	 * @return height		Sayfalar için kullanılacak görsel yüksekliği
	 * @return ratio		Sayfalar için kullanılacak görsel boyutlandırma yöntemi
	 * @return img_required	Sayfalar için kullanılacak görsel zonululuğu. true false değer alır
	 * @return mobile_icon	Mobil uygulamalar için material icon adları
	 * @return langId		Kategori dil ID'si
	 * @return languageId	Kategori dil ID'si
	 *
	 *		 
	 */
	function get_page_category_list()
	{

		$ci =& get_instance();
		
		$data = $ci->db
						->join('pages_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$ci->_lng->languageId)
						->where('lng.name !=',"")
						->get('pages_category c')
						->result();


		return $data;



	}
}


if ( ! function_exists('get_gallery_photos'))
{

	/**
	 * Get Gallery Photos
	 *
	 * Gönderilen galeri ID'sine sahip fotoğrafları listeler
	 * Slider için ilk elemanı seçer ve varsayılan olarak active değerini atar
	 *
	 * @param galleryId 		Görsellerin listeleneceği albüm ID
	 * @param firstItemValue 	İlk liste elemanı için atancak değer. Varsayılan olarak active değerini alır
	 *
	 * @return photoId 		Sayfa ID'si
	 * @return galleryId 	Sayfanın kategori ID'si
	 * @return image 		Dosya adı
	 * @return name 		Varsa fotoğraf adı yoksa bağlı olduğu kategori adı
	 * @return createDate 	Fotoğraf eklenme tarihi
	 * @return language 	Fotoğrafın atandığı dil ID'si
	 * @return path 		Fotoğrafın tam yolu
	 * @return first 		Listenin ilk elemanı. Varsayılan olarak active değerini alır
	 *		 
	 */
	function get_gallery_photos($galleryId=false,$firstItemValue='active')
	{

		$ci =& get_instance();

		$category = $ci->db->where('galleryId',$galleryId)->get('gallery_category')->row();

		$photos = $ci->db->where('galleryId',$galleryId)->get('gallery_photos')->result();

		$response = array();

		foreach ($photos as $key => $value) {
			$response[$key] 				= $value;
			$response[$key]->path 			= 'assets/images/gallery/'.sef_url($category->name).'/'.$value->image;
			
			if($value->name==''){
				$response[$key]->name = $category->name;
			}

			if(!isset($first)){
				$response[$key]->first = $firstItemValue;
				$first = true;
			}else{
				$response[$key]->first = false;
			}

		}

		return $response;

	}
}


if ( ! function_exists('get_gallery_category'))
{

	/**
	 * Get Gallery Category
	 *
	 * Tüm galeri kategorilerini listeler
	 * Bu fonksiyon ile yalnızca tipi galeri olan veriler çekilir
	 *
	 * @uses get_gallery_category();
	 *
	 * @param  ignore 	array	Listede hariç tutulacak Id'ler
	 * 			@uses get_gallery_category(array(1,4,6));
	 * 
	 * @return galleryId 		Galeri kategori ID'si
	 * @return type 			Galeri Tipi
	 * @return contentId 		Diğer içerikler için oluşturulan galerilerin bağlı oldu içerik ID'si
	 * @return name 			Kategori Adı
	 * @return protected		Korumalı sayfalar için kullanılır. true false değer alır
	 * @return width 			Galeride kullanılacak görsellerin genişliği
	 * @return height 			Galeride kullanılacak görsellerin yüksekliği
	 * @return ratio 			Sayfalar için kullanılacak görsel boyutlandırma yöntemi
	 * @return mobile_icon 		Mobil uygulamalar için material icon adları
	 *		 
	 */
	function get_gallery_category($ignore=false)
	{

		$ci =& get_instance();

		if($ignore){
			$category = $ci->db->where('type','gallery')->where_not_in('galleryId',$ignore)->get('gallery_category')->result();
		}else{
			$category = $ci->db->where('type','gallery')->get('gallery_category')->result();
		}

		return $category;

	}
}


if ( ! function_exists('get_product_category'))
{
	/**
	 * Get Product Category
	 *
	 * Gönderilen parentId'ye ait alt kategorileri listeler
	 *
	 * @see  Okunabilir oluşturulma tarihi varsayılan olarak tarih saat formatı ile döndürülür
	 *       Okunabilir oluşturulma tarihi yalnızca tarih içerecekse aşağıdaki gibi parametre gönderin
	 *
	 * 		change_date_format($value->createDate,'date');
	 *
	 * @param  parentId 	Üst Kategori ID'si
	 *
	 * @return categoryId	Kategori ID'si
	 * @return name 		Kategori Adı
	 * @return url			Kategori sef url'i
	 * @return defaultUrl	Varsayılan kategori yolunu verir
	 * @return parentId		Üst kategori ID'si
	 * @return image		Kategori görseli
	 * @return createDate	Oluşturulma tarihi
	 * @return date			Okunabilir oluşturulma tarihi
	 * @return langId		Kategorinin dil ID'si
	 * @return languageId	Kategorinin dil ID'si
	 *		 
	 */
	function get_product_category($parentId=0)
	{

		$ci =& get_instance();

		$category = $ci->db
						->join('product_category_lang lng','lng.categoryId=pc.categoryId')
						->where('lng.languageId',$ci->_lng->languageId)
						->where('pc.parentId',$parentId)
						->where('lng.name !=',"")
						->get('product_category pc')
						->result();

		$response = array();

		foreach ($category as $key => $value) {
			$response[$key] 			= $value;
			$response[$key]->url 		= sef_url($value->name);
			$response[$key]->date 		= change_date_format($value->createDate);
			$response[$key]->defaultUrl = $ci->_lng->code.'/product/category/'.$value->categoryId.'/'.$response[$key]->url;
		}

		return $response;

	}
}
if ( ! function_exists('get_product_gallery_category'))
{

	/**
	 * Get Gallery Category
	 *
	 * Tüm galeri kategorilerini listeler
	 * Bu fonksiyon ile yalnızca tipi galeri olan veriler çekilir
	 *
	 * @uses get_gallery_category();
	 *
	 * @param  ignore 	array	Listede hariç tutulacak Id'ler
	 * 			@uses get_gallery_category(array(1,4,6));
	 * 
	 * @return galleryId 		Galeri kategori ID'si
	 * @return type 			Galeri Tipi
	 * @return contentId 		Diğer içerikler için oluşturulan galerilerin bağlı oldu içerik ID'si
	 * @return name 			Kategori Adı
	 * @return protected		Korumalı sayfalar için kullanılır. true false değer alır
	 * @return width 			Galeride kullanılacak görsellerin genişliği
	 * @return height 			Galeride kullanılacak görsellerin yüksekliği
	 * @return ratio 			Sayfalar için kullanılacak görsel boyutlandırma yöntemi
	 * @return mobile_icon 		Mobil uygulamalar için material icon adları
	 *		 
	 */
	function get_product_gallery_category($ignore=false)
	{

		$ci =& get_instance();

			$category = $ci->db->where('type','product')->where("contentId",$ignore)->get('gallery_category')->result();

		return $category;

	}
}


if ( ! function_exists('get_product_list'))
{
	/**
	 * Gönderilen categoryId'ye sahip kategorileri döndürür
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function get_product_list($data=false)
	{	
		$ci =& get_instance();

		$categoryId = $data['categoryId'];

		if($data['getSubCategoryProduct']){
			$ids = get_product_sub_category($data['categoryId']);
		}
		


		$query = $ci->db
						->join('product_lang lng','lng.productId=p.productId')
						->where('lng.languageId',$ci->_lng->languageId)
						->where('lng.name !=',"");


		if($data['getSubCategoryProduct']){
			$query->where_in('p.categoryId',$ids);
		}else{
			$query->where('p.categoryId',$categoryId);
		}



		$category = $query->get('product p')->result();
						

		$response = array();

		foreach ($category as $key => $value) {
			$response[$key] 		= $value;
			$response[$key]->url 	= sef_url($value->name);
		}

		return $response;

	}
}


if ( ! function_exists('get_product_sub_category'))
{
	/**
	 * Gönderilen categoryId'ye sahip tüm alt kategori idlerini toplar
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function get_product_sub_category($categoryId=false)
	{	
		$ci =& get_instance();

		$response = array($categoryId);

		$data = $ci->db->where('parentId',$categoryId)->get('product_category')->result();

		foreach ($data as $key => $value) {
			$response[] = $value->categoryId;
			$response = array_merge($response,get_product_sub_helper($value->categoryId));
		}
		
		return $response;
	}


	function get_product_sub_helper($categoryId=false)
	{	
		$ci =& get_instance();

		$response = array();

		$data = $ci->db->where('parentId',$categoryId)->get('product_category')->result();

		foreach ($data as $key => $value) {
			$response[] = $value->categoryId;
			$response = array_merge($response,get_product_sub_helper($value->categoryId));
		}
		
		return $response;
	}
}


if ( ! function_exists('get_product_path'))
{
	/**
	 * Gönderilen categoryId'ye sahip tüm alt kategori idlerini toplar
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function get_product_path($categoryId,$seperator='>',$except=null) {

		$ci =& get_instance();

		$row = $ci->commonModel->getProductCategoryInfo($categoryId);

		if(isset($row)){			

			if($row->parentId == 0) {
				$name = $row->name;  
				return '<a href="'.base_url($ci->_lng->code.'/product/category/'.$row->categoryId).'/'.sef_url($row->name).'">'.$name.'</a> '.$seperator.' ';
			} else {
			$name = $row->name;
			if(!empty($except) && $except == $name)
				return get_product_path($row->parentId,$seperator,$except).' <a href="'.base_url($ci->_lng->code.'/product/category/'.$row->categoryId).'/'.sef_url($row->name).'">'.$name.'</a>';
			}
			return get_product_path($row->parentId,$seperator,$except).' <a href="'.base_url($ci->_lng->code.'/product/category/'.$row->categoryId).'/'.sef_url($row->name).'">'.$name.'</a> '.$seperator;
		}
	}
}


if(!function_exists('sef_url')){

	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function sef_url($string)
	{
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '&');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', 've');
		$string = strtolower(str_replace($find, $replace, $string));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	}

}


if ( ! function_exists('get_contact_info'))
{
	/**
	 * @param 
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function get_contact_info($categoryId=1,$filter=false,$singleData=false) {

		$ci =& get_instance();

		if(!$categoryId or $categoryId==null or $categoryId==''){
			$categoryId = 1;
		}

		$names = array(
			'phone' => _r('Telefon',true),
			'adres' => _r('Adres',true),
			'eposta' => _r('E-Posta',true),
			'fax' => _r('Fax',true),
			'gsm' => _r('GSM',true),
			);

		$icons = array(
			'phone' => 'fa fa-phone',
			'adres' => 'fa fa-map-marker',
			'eposta' => 'fa fa-envelope-o',
			'fax' => 'fa fa-print',
			'gsm' => 'fa fa-mobile',
			);


		$data = $ci->db->where('categoryId',$categoryId)->order_by('i_key')->get('contact_info')->result();

		$response = array();

		foreach ($data as $key => $value) {
			if($filter){
				if($value->i_key==$filter){

					if($singleData){
						return $value->i_value;
					}else{
						$response[] = array(
								'name' => $names[$value->i_key],
								'icon' => $icons[$value->i_key],
								'value' => $value->i_value,
							);
					}
				}
			}else{
				$response[] = array(
							'name' => $names[$value->i_key],
							'icon' => $icons[$value->i_key],
							'value' => $value->i_value,
						);
			}
		}

		return $response;
		
	}
}


if ( ! function_exists('phone_format'))
{
	
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function phone_format($num=false,$countryCode='+90')
	{
		$num = str_replace(' ', '', $num);

		$num = substr($num, -10);

		$num = $countryCode.$num;

		
		return substr($num, 0,3).' ('.substr($num, 3,3).') '.substr($num, 6,3).' '.substr($num, 9,4);

	}

}


if ( ! function_exists('get_contact_category'))
{
	/**
	 * @param 
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function get_contact_category() {

		$ci =& get_instance();

		$data = $ci->db->get('contact_info_category')->result();

		$response = array();

		foreach ($data as $key => $value) {
			$response[$key] = $value;
			$response[$key]->name = _r($value->name,true);
		}

		return $response;
		
	}
}


if ( ! function_exists('change_date_format'))
{
	/**
	 * @param 
	 */
	/**
	 * function_name
	 *
	 * description_________-
	 *
	 * @see  exta_description
	 *
	 * @param  var___ 	Description______
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function change_date_format($date=false,$type='datetime') {

		if($type=='datetime'){
			return date('d.m.Y H:i:s', strtotime($date));  
		}elseif($type=='date'){
			return date('d.m.Y', strtotime($date));  
		}
		
	}
}


if ( ! function_exists('pre'))
{
	/**
	 * Pre
	 *
	 * Array ve objeleri pre <html> etiketi içinde yazar
	 *
	 * @uses  pre($data);
	 *
	 * @param  $data 	Array ya da object
	 * @param  $exit 	Akışı durdurmak için kullanılır, varsayılan olarak false değerini alır
	 *
	 * @return var___ 	Description______
	 *		 
	 */
	function pre($data=false,$exit=false)
	{
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		
		if($exit){
			exit();
		}

	}
}







?>