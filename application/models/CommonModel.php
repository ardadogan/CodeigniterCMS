<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonModel extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}


	public function getLanguages()
	{
		
		$response = array();

		$response['list'] = $this->db->where('status',true)->get('languages')->result();
		$response['default'] = $this->db->where('default',1)->get('languages')->row();

		foreach ($response['list'] as $key => $value) {
			$response['codes'][] = $value->code;
		}

		return $response;

	}


	public function getLanguage($code='tr')
	{
		return $this->db->where('code',$code)->get('languages')->row();
	}


	public function getPageCategoryInfo($categoryId)
	{
		return $this->db
						->join('pages_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('c.categoryId',$categoryId)
						->get('pages_category c')
						->row();
	}


	public function getPageInfo($pageId)
	{
		return $this->db
						->join('pages_lang lng','lng.pageId=p.pageId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('p.pageId',$pageId)
						->get('pages p')
						->row();
	}


	public function getProductCategoryInfo($categoryId)
	{
		return $this->db
						->join('product_category_lang lng','lng.categoryId=pc.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('pc.categoryId',$categoryId)
						->get('product_category pc')
						->row();
	}


	public function getProductInfo($productId)
	{
		return $this->db
						->join('product_lang lng','lng.productId=p.productId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('p.productId',$productId)
						->get('product p')
						->row();
	}

	

}


?>