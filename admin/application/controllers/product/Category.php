<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {




	public function index($parentId=0)
	{
			
		$data['category'] = $this->commonModel->getProductCategoryInfo($parentId);

		$data['list'] = $this->db
						->join('product_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('c.parentId',$parentId)
						->order_by('sira', 'asc')
						->get('product_category c')
						->result();

		$data['parentId'] = $parentId;

		$this->header('Kategoriler');
			$this->load->view('product/category/list',$data);
		$this->footer();
	}
	public function sira($categoryId=false)
	{
		$data = $this->input->post();
		$siralama = array();
		foreach ($data["sira"] as $key => $value) {
			
			$siralama[] = array(

				'categoryId' => $key,
				'sira' =>$value
			);

		}

		if($this->db->update_batch('product_category',$siralama,"categoryId")){
			$this->success("Sıralama kaydedildi");
		}else{
			$this->error("Sıralama kaydedilirken bir sorun oluştu");
		}
	}

	public function add($parentId=0)
	{
		
		$data['parentId'] = $parentId;
		$data['category'] = $this->commonModel->getProductCategoryInfo($parentId);


		$this->header('Yeni Kategori Oluştur');
			$this->load->view('product/category/add',$data);
		$this->footer();
	}


	public function create($parentId=0)
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
			$imgConfig = array(
				'fileInput' => $_FILES['file'],
				'name' 		=> $categoryName,
				'path' 		=> '../assets/images/product/category/',
				'width' 	=> $this->appConfig['product_category_image_width'],
				'height' 	=> $this->appConfig['product_category_image_height'],
				'ratio' 	=> $this->appConfig['product_category_image_method'],
				'required' 	=> $this->appConfig['product_category_image_required'],
				);

			$img = image_upload($imgConfig);
		

			$sData = array(
				'parentId' => $parentId,
				'image' => $img,
				'createDate' => date('Y-m-d H:i:s')
				);


		# Create Category
			$this->db->insert('product_category',$sData);
			
			$categoryId = $this->db->insert_id();


		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için kategori adı girin"); }
				}

				$saveData[] = array(
					'categoryId' => $categoryId,
					'languageId' => $key,
					'name' => $value['name'],
					);
			}

			
			if($this->db->insert_batch('product_category_lang', $saveData)){
				$this->success(array('message'=>'Yeni Kategori Oluşturuldu','categoryId'=>$categoryId));
			}else{
				$this->error("Kategori oluşturulamadı");
			}

	}


	public function edit($categoryId=false)
	{

		$data['category'] 	= $this->db->where('categoryId',$categoryId)->get('product_category')->row();
		$langs				= $this->db->where('categoryId',$categoryId)->get('product_category_lang')->result();

		$data['langs'] = array();
		foreach ($langs as $key => $value) {
			$data['langs'][$value->languageId] = array(
				'langId' => $value->langId,
				'name' => $value->name,
				'text' => $value->text,
			);

			if($value->languageId==$this->_lang->languageId){
				$data['categoryName'] = $value->name;
			}
		}

		$this->header('Sayfa Grubunu Güncelle');
			$this->load->view('product/category/edit',$data);
		$this->footer();
	}


	public function update($categoryId=false)
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
					'path' 		=> '../assets/images/product/category/',
					'width' 	=> $this->appConfig['product_category_image_width'],
					'height' 	=> $this->appConfig['product_category_image_height'],
					'ratio' 	=> $this->appConfig['product_category_image_method'],
					'required' 	=> $this->appConfig['product_category_image_required'],
					);

				$img = image_upload($imgConfig);

				if($img!='default.png'){
					$sData['image'] = $img;
				}

			}



		# Update Category
			
			if(isset($sData)){
				$this->db->where('categoryId',$categoryId);
				$this->db->update('product_category',$sData);
			}
			

		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {
				$saveData[] = array(
					'langId' => $value['langId'],
					'categoryId' => $categoryId,
					'languageId' => $key,
					'name' => $value['name']
					);
			}

			$update = $this->db->update_batch('product_category_lang', $saveData,'langId');


		$this->success("Bilgiler Güncellendi");

	}


	public function delete($categoryId=false)
	{
		$this->db->where('categoryId',$categoryId)->delete('product_category_lang');
		$this->db->where('categoryId',$categoryId)->delete('product_category');

		$this->success("Kategori Silindi");
	}




	





}
