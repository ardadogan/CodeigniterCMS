<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {




	public function category($categoryId=false)
	{
			
		$data['category'] = $this->commonModel->getPageCategoryInfo($categoryId);

		$data['list'] = $this->db
						->join('pages_lang lng','lng.pageId=p.pageId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('p.categoryId',$categoryId)
						->get('pages p')
						->result();


		$this->header('Sayfa Grupları');
			$this->load->view('pages/pages/list',$data);
		$this->footer();
	}


	public function add($categoryId=false)
	{	

		$data['category'] = $this->db
						->join('pages_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('c.categoryId',$categoryId)
						->get('pages_category c')
						->row();

		$this->header('Yeni Sayfa Oluştur');
			$this->load->view('pages/pages/add',$data);
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
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için sayfa adı girin"); }
					$pageName = sef_url($value['name']);
				}

			}

		# Upload Image
			$imgConfig = array(
				'fileInput' => $_FILES['file'],
				'name' 		=> $pageName,
				'path' 		=> '../assets/images/pages/',
				'width' 	=> $category->width,
				'height' 	=> $category->height,
				'ratio' 	=> $category->ratio,
				'required' 	=> $category->img_required,
				);

			$img = image_upload($imgConfig);
		

			
			$sData = array(
				'categoryId' => $category->categoryId,
				'image' => $img,
				'createDate' => date('Y-m-d H:i:s')
				);


		# Create Category
			$this->db->insert('pages',$sData);
			
			$pageId = $this->db->insert_id();


		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için sayfa adı girin"); }
				}

				$saveData[] = array(
					'pageId' => $pageId,
					'languageId' => $key,
					'name' => $value['name'],
					'text' => $value['text']
					);
			}

			
			if($this->db->insert_batch('pages_lang', $saveData)){
				$this->success("Yeni sayfa oluşturuldu");
			}else{
				$this->error("Sayfa oluşturulamadı");
			}



		$this->pre($saveData);

	}


	public function edit($pageId=false)
	{

		$data['page'] 		= $this->db->where('pageId',$pageId)->get('pages')->row();
		$langs				= $this->db->where('pageId',$pageId)->get('pages_lang')->result();
		$data['category'] 	= $this->commonModel->getPageCategoryInfo($data['page']->categoryId);

		$data['langs'] = array();

		foreach ($langs as $key => $value) {
			$data['langs'][$value->languageId] = array(
					'langId' => $value->langId,
					'name' => $value->name,
					'text' => $value->text,
				);
		}

		$this->header('Sayfayı Güncelle');
			$this->load->view('pages/pages/edit',$data);
		$this->footer();
	}


	public function update($pageId=false)
	{
		
		$product 	= $this->db->where('pageId',$pageId)->get('pages')->row();
		$category 	= $this->commonModel->getPageCategoryInfo($product->categoryId);

		# Form Data
			$formData = $this->input->post();


			foreach ($formData as $key => $value) {

				if($key==$this->_lang->languageId){
					if(empty($value['name'])){ $this->error($this->_lang->alias." Dili için sayfa adı girin"); }
					$pageName = sef_url($value['name']);
				}

			}



		# Upload Image
			if(!empty($_FILES['file'])){
				$imgConfig = array(
					'fileInput' => $_FILES['file'],
					'name' 		=> $pageName,
					'path' 		=> '../assets/images/pages/',
					'width' 	=> $category->width,
					'height' 	=> $category->height,
					'ratio' 	=> $category->ratio,
					'required' 	=> $category->img_required,
				);

				$img = image_upload($imgConfig);

				if($img!='default.png'){
					$sData['image'] = $img;
				}

			}



		# Update Category
			
			if(isset($sData)){
				$this->db->where('pageId',$pageId);
				$this->db->update('pages',$sData);
			}

		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {
				$saveData[] = array(
					'langId' => $value['langId'],
					'pageId' => $pageId,
					'languageId' => $key,
					'name' => $value['name'],
					'text' => $value['text']
					);
			}

			$this->db->update_batch('pages_lang', $saveData,'langId');
			
			$this->success("Bilgiler Güncellendi");
			

	}


	public function delete($pageId=false)
	{


		$this->db->where('pageId',$pageId)->delete('pages_lang');
		$this->db->where('pageId',$pageId)->delete('pages');

		$this->success("Sayfa Silindi");
	}

	public function createGallery($pageId=false)
	{
		
		# Album Info
			
			$sData = array(
				'width' => 800,
				'height' => 475,
				'type' 	=> 'page',
				'name' 	=> 'page',
				'contentId' => $pageId,
				);

		

		# Create Album
			if($this->db->insert('gallery_category',$sData)){
				redirect('gallery/gallery/category/'.$this->db->insert_id());
			}else{
				$this->error("Albüm oluşturulamadı");
			}


	}



	





}
