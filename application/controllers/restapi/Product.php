<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


	public function getCategory($categoryId=0)
	{
		
		$list  = get_product_category($categoryId);

		$info = $this->db
						->join('product_category_lang lng','lng.categoryId=p.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->where('p.categoryId',$categoryId)
						->get('product_category p')
						->row();

		$response = array(
			'info' =>  $info,
			'count' =>  count($list),
			'list' =>  $list
			);
		

		$this->success($response);
	}


	public function getProduct($categoryId=false)
	{
		
		
		$category  = get_product_list(
			array(
				'categoryId' => $categoryId,
				'getSubCategoryProduct' => true
				)
			);

		$response = array(
			'count' =>  count($category),
			'list' =>  $category
			);
		

		$this->success($response);
	}


	public function getProductInfo($productId=false)
	{


		$product = $this->db
						->join('product_lang lng','lng.productId=p.productId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->where('p.productId',$productId)
						->get('product p')
						->row();

		$category = $this->db
						->join('product_category_lang lng','lng.categoryId=p.categoryId')
						->where('lng.languageId',$this->_lng->languageId)
						->where('lng.name !=',"")
						->where('p.categoryId',$product->categoryId)
						->get('product_category p')
						->row();

		$response = array(
			'product' =>  $product,
			'category' =>  $category
			);
		

		$this->success($response);
	}


	public function searchProduct()
	{


		$q = trim($this->input->post('q'));

		$limit = 1;

		if(strlen($q)<$limit){
			$this->error("Aramanızı en az ".$limit." kelime ile yapın");
		}else{
		

			
			$product = $this->db
				->join('product p','p.productId=lng.productId')
				->from('product_lang lng')
				->like('lng.name',$q)
				->group_by('p.productId')
				->get();

			$response = array(
				'count' => $product->num_rows(),
				'list' => $product->result(),
				'q' => $q,
				);
		
			if($product->num_rows()>0){
				$this->success($response);
			}else{
				$this->error('"'.$q.'" Araması için sonuç bulunamadı');
			}
		}

		
	}


}
