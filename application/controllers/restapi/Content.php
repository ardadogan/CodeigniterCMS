<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MY_Controller {


	public function get_page_list($categoryId=false)
	{
		
		$category  = $this->db
						->join('pages_category_lang lng','lng.categoryId=p.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->where('p.categoryId',$categoryId)
						->get('pages_category p')
						->row();

		$response = array(
			'category' =>  $category,
			'count' => count(get_page_list($categoryId)),
			'list' => get_page_list($categoryId)
			);
		

		$this->success($response);
	}


	public function get_page_detail($pageId=false)
	{
		$page  = $this->db
						->join('pages_lang lng','lng.pageId=p.pageId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->where('p.pageId',$pageId)
						->get('pages p')
						->row();

		$response = array(
			'page' =>  $page
			);
		

		$this->success($response);
	}


	public function get_gallery_photos($galleryId=false)
	{
		$category = $this->db->where('galleryId',$galleryId)->get('gallery_category')->row();

		$category->folder = sef_url($category->name);

		$photos  = $this->db->where('galleryId',$galleryId)->get('gallery_photos')->result();

		$newPhotos = array();

		foreach ($photos as $key => $value) {
			$newPhotos[$key] = $value;
			$newPhotos[$key]->imagePath = 'assets/images/gallery/'.sef_url($category->name).'/'.$value->image;
		}

		$response = array(
			'category' =>  $category,
			'list' => $newPhotos,
			'cover' => end($newPhotos),
			);
		

		$this->success($response);
	}


}
