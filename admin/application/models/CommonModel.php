<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonModel extends CI_Model {




	public function getNavPages()
	{
		$data = $this->db
				->join('pages_category_lang lng','lng.categoryId=c.categoryId')
				->where('lng.languageId',$this->_lang->languageId)
				->get('pages_category c')
				->result();
		$response = array();

		foreach ($data as $key => $value) {
			$response[$value->name] = array(
				'name' => $value->name,
				'url' => base_url('pages/pages/category/'.$value->categoryId),
				);
		}

		return $response;
	}


	public function getNavAlbums()
	{
		$data = $this->db
				->where('type','gallery')
				->get('gallery_category')
				->result();

		if($data){
		
			$response = array();

			foreach ($data as $key => $value) {
				$response[$value->name] = array(
					'name' => $value->name,
					'url' => base_url('gallery/gallery/category/'.$value->galleryId),
					);
			}

			return $response;
		}else{
			return false;
		}
	}


	public function getProductGalleryCategory($productId=false)
	{
		return $this->db->where('type','product')->where('contentId',$productId)->get('gallery_category')->row();
	}
public function getPageGalleryCategory($pageId=false)
	{
		return $this->db->where('type','page')->where('contentId',$pageId)->get('gallery_category')->row();
	}

	public function getPageCategoryInfo($categoryId)
	{
		return $this->db
						->join('pages_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('c.categoryId',$categoryId)
						->get('pages_category c')
						->row();
	}


	public function getProductCategoryInfo($categoryId)
	{
		return $this->db
						->join('product_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('c.categoryId',$categoryId)
						->get('product_category c')
						->row();
	}

	

}


?>