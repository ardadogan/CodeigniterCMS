<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	

	public function index()
	{
		# Controller
			
			$data['categoryId'] = 0;

			$prdConf = array(
				'categoryId' => $data['categoryId'],
				'getSubCategoryProduct' => true
				);

			$data['products'] = get_product_list($prdConf);



		# Show
			$this->header();
				$this->load->view($this->app->template.'/product/index',$data);
			$this->footer();
	}
	

	public function category($categoryId=0)
	{
		# Controller
		
			$data['categoryId'] = $categoryId;
			$data['category'] = $this->commonModel->getProductCategoryInfo($categoryId);

			$prdConf = array(
				'categoryId' => $data['categoryId'],
				'getSubCategoryProduct' => true
				);

			$data['products'] = get_product_list($prdConf);


		# Show
			$this->header();
				$this->load->view($this->app->template.'/product/index',$data);
			$this->footer();
	}


	public function detail($productId=false,$sef=false)
	{
		# Controller

			$data['product'] = $this->commonModel->getProductInfo($productId);
			
			$data['categoryId'] = $data['product']->categoryId;
			$data['category'] = $this->commonModel->getProductCategoryInfo($data['product']->categoryId);

		# Show
			$this->header();
				$this->load->view($this->app->template.'/product/detail',$data);
			$this->footer();
	}
	

	public function search($categoryId=0)
	{
		# Controller
			
			$q = $this->input->get('q');
		
			$data['categoryId'] = $categoryId;
			$data['category'] = $this->commonModel->getProductCategoryInfo($categoryId);

		

			$product = $this->db
					->join('product p','p.productId=lng.productId')
					->from('product_lang lng')
					->like('lng.name',$q)
					->group_by('p.productId')
					->get();

			$data['count']		= $product->num_rows();
			$data['products'] 	= $product->result();
			$data['q'] 			= $q;


		# Show
			$this->header();
				$this->load->view($this->app->template.'/product/index',$data);
			$this->footer();
	}



}
