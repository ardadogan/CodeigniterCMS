<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {




	public function index($categoryId=false)
	{
			
		$data['category'] = $this->commonModel->getProductCategoryInfo($categoryId);

		$data['list'] = $this->db
						->join('product_lang lng','lng.productId=p.productId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('p.categoryId',$categoryId)
						->get('product p')
						->result();


		$this->header('Sayfa Grupları');
			$this->load->view('product/product/list',$data);
		$this->footer();
	}


	public function add($categoryId=false)
	{	

		$data['category'] = $this->db
						->join('product_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('c.categoryId',$categoryId)
						->get('product_category c')
						->row();

		$this->header('Yeni Sayfa Oluştur');
			$this->load->view('product/product/add',$data);
		$this->footer();
	}


	public function create($categoryId=false)
	{
		# Category Info
			$category = $this->commonModel->getPageCategoryInfo($categoryId);
		# Form Data
			$formData = $this->input->post();


			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için kategori adı girin"); }
					$productName = sef_url($value['name']);
				}

			}

		# Upload Image
			$imgConfig = array(
				'fileInput' => @$_FILES['file'],
				'name' 		=> $productName,
				'path' 		=> '../assets/images/product/product/',
				'width' 	=> $this->appConfig['product_image_width'],
				'height' 	=> $this->appConfig['product_image_height'],
				'ratio' 	=> $this->appConfig['product_image_method'],
				'required' 	=> $this->appConfig['product_image_required'],
				);

			$img = image_upload($imgConfig);
		

			
			$sData = array(
				'categoryId' => $categoryId,
				'image' => $img,
				'createDate' => date('Y-m-d H:i:s')
				);


		# Create Category
			$this->db->insert('product',$sData);
			
			$productId = $this->db->insert_id();


		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için sayfa adı girin"); }
				}

				$saveData[] = array(
					'productId' => $productId,
					'languageId' => $key,
					'name' => $value['name'],
					'text' => $value['text']
					);
			}

			
			if($this->db->insert_batch('product_lang', $saveData)){
				$this->success(array('message'=>'Yeni Ürün Oluşturuldu','productId'=>$productId));
			}else{
				$this->error("Ürün eklenirken bir sorun oluştu");
			}


	}


	public function edit($productId=false)
	{

		$data['product'] 		= $this->db->where('productId',$productId)->get('product')->row();
		$langs				= $this->db->where('productId',$productId)->get('product_lang')->result();
		$data['category'] 	= $this->db->where('categoryId',$data['product']->categoryId)->get('product_category')->row();

		$data['langs'] = array();

		foreach ($langs as $key => $value) {
			$data['langs'][$value->languageId] = array(
					'langId' => $value->langId,
					'name' => $value->name,
					'text' => $value->text,
				);
			if($value->languageId==$this->_lang->languageId){
				$data['productName'] = $value->name;
			}
		}

		$this->header('Ürünü Güncelle');
			$this->load->view('product/product/edit',$data);
		$this->footer();
	}


	public function update($productId=false)
	{
		
		# Form Data
			$formData = $this->input->post();


			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için kategori adı girin"); }
					$categoryName = sef_url($value['name']);
				}

			}



		# Upload Image
			if(!empty($_FILES['file'])){
				$imgConfig = array(
					'fileInput' => $_FILES['file'],
					'name' 		=> $categoryName,
					'path' 		=> '../assets/images/product/product/',
					'width' 	=> $this->appConfig['product_image_width'],
					'height' 	=> $this->appConfig['product_image_height'],
					'ratio' 	=> $this->appConfig['product_image_method'],
					'required' 	=> false,
					);

				$img = image_upload($imgConfig);

				if($img!='default.png'){
					$sData['image'] = $img;
				}

			}



		# Update Category
			
			if(isset($sData)){
				$this->db->where('productId',$productId);
				$this->db->update('product',$sData);
			}

		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {
				$saveData[] = array(
					'langId' => $value['langId'],
					'productId' => $productId,
					'languageId' => $key,
					'name' => $value['name'],
					'text' => $value['text']
					);
			}


			$this->db->update_batch('product_lang', $saveData,'langId');

			$this->success("Bilgiler Güncellendi");

	}


	public function delete($productId=false)
	{


		$this->db->where('productId',$productId)->delete('product_lang');
		$this->db->where('productId',$productId)->delete('product');

		$this->success("Ürün Silindi");
	}


	public function createGallery($productId=false)
	{
		
		# Album Info
			
			$sData = array(
				'width' => 800,
				'height' => 800,
				'type' 	=> 'product',
				'name' 	=> 'product',
				'contentId' => $productId,
				);

		

		# Create Album
			if($this->db->insert('gallery_category',$sData)){
				redirect('gallery/gallery/category/'.$this->db->insert_id());
			}else{
				$this->error("Albüm oluşturulamadı");
			}


	}




	





}
