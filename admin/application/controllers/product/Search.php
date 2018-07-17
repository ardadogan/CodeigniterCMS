
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {




	public function index()
	{
		
		$q = $this->input->get('q');

		$data = array();

		$data['q'] = $q;	
		$data['count'] = 12;


		$category = $this->db
					->join('product_category c','c.categoryId=lng.categoryId')
					->from('product_category_lang lng')
					->like('lng.name',$q)
					->get();

		$data['category']['count'] = $category->num_rows();
		$data['category']['list'] = $category->result();


		$product = $this->db
					->join('product p','p.productId=lng.productId')
					->from('product_lang lng')
					->like('lng.name',$q)
					->get();

		$data['product']['count'] = $product->num_rows();
		$data['product']['list'] = $product->result();


		$data['count'] = $data['category']['count']+$data['product']['count'];

		
		$this->header('Arama Sonuçları');
			$this->load->view('product/search/result',$data);
		$this->footer();
	}


	



	





}
