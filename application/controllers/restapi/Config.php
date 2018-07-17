<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {


	public function home_menu()
	{

		# Sayfalar
			$cat = get_page_category_list();

			$pages = array();

			foreach ($cat as $key => $value) {
				$pages[] = array(
					'categoryId' => $value->categoryId,
					'name' => $value->name,
					'width' => $value->width,
					'height' => $value->height,
					'icon' => $value->mobile_icon,
					'url' => '#/pages/'.$value->categoryId
					);
			}

		# Galeriler
			$cat = get_gallery_category(array(3,6));

			$gallery = array();

			foreach ($cat as $key => $value) {
				$gallery[] = array(
					'galleryId' => $value->galleryId,
					'name' => $value->name,
					'width' => $value->width,
					'height' => $value->height,
					'icon' => $value->mobile_icon,
					'url' => '#/photos/'.$value->galleryId
					);
			}

		# Manuel Menuler
			$menu = array(
				array(
					'name' => 'Ürünlerimiz',
					'icon' => 'shopping_cart',
					'url' => '#/product'
					),
				array(
					'name' => 'Sosyal Medya Hesapları',
					'icon' => 'share',
					'url' => '#/blank'
					),
				array(
					'name' => 'İletişim',
					'icon' => 'phone',
					'url' => '#/blank'
					),
				);


	
		$response = array(
			'list' => array_merge($pages,$menu,$gallery)
			);
		

		$this->success($response);
	}
	

	public function info()
	{
		
		$data = $this->db
						->join('pages_category_lang lng','lng.categoryId=p.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->get('pages_category p')
						->result();


		$this->success($this->app);

		
	}


}
