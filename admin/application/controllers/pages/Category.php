<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {




	public function index()
	{
			
		$data['list'] = $this->db
						->join('pages_category_lang lng','lng.categoryId=c.categoryId')
						->where('lng.languageId',$this->_lang->languageId)
						->get('pages_category c')
						->result();

		$this->header('Sayfa Grupları');
			$this->load->view('pages/group/list',$data);
		$this->footer();
	}


	public function add()
	{
		$this->header('Yeni Grup Ekle');
			$this->load->view('pages/group/add');
		$this->footer();
	}


	public function create()
	{
		
		# Form Data
			$formData = $this->input->post();

		# Category Info
			if(empty($formData['common']['width'])){ $this->error("Lütfen görsel boyutu belirleyin (Genişlik)"); }
			if(empty($formData['common']['height'])){ $this->error("Lütfen görsel boyutu belirleyin (Yükseklik)"); }

			$sData = $formData['common'];

			
			unset($formData['common']);

		# Create Category
			$this->db->insert('pages_category',$sData);
			
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
					'text' => $value['text']
					);
			}

			
			if($this->db->insert_batch('pages_category_lang', $saveData)){
				$this->success("Yeni kategori oluşturuldu");
			}else{
				$this->error("Kategori oluşturulamadı");
			}



		$this->pre($saveData);

	}


	public function edit($categoryId=false)
	{

		$data['category'] 	= $this->db->where('categoryId',$categoryId)->get('pages_category')->row();
		$langs				= $this->db->where('categoryId',$categoryId)->get('pages_category_lang')->result();

		$data['langs'] = array();
		foreach ($langs as $key => $value) {
			$data['langs'][$value->languageId] = array(
				'langId' => $value->langId,
				'name' => $value->name,
				'text' => $value->text,
			);
		}

		$this->header('Sayfa Grubunu Güncelle');
			$this->load->view('pages/group/edit',$data);
		$this->footer();
	}


	public function update($categoryId=false)
	{
		
		# Form Data
			$formData = $this->input->post();

		# Category Info
			if(empty($formData['common']['width'])){ $this->error("Lütfen görsel boyutu belirleyin (Genişlik)"); }
			if(empty($formData['common']['height'])){ $this->error("Lütfen görsel boyutu belirleyin (Yükseklik)"); }

			$sData = $formData['common'];

			$this->db->where('categoryId',$categoryId);
			$this->db->update('pages_category',$sData);
			
			unset($formData['common']);

		# Language Data's
			$saveData = array();

			foreach ($formData as $key => $value) {
				$saveData[] = array(
					'langId' => $value['langId'],
					'categoryId' => $categoryId,
					'languageId' => $key,
					'name' => $value['name'],
					'text' => $value['text']
					);
			}

			$update = $this->db->update_batch('pages_category_lang', $saveData,'langId');

	
			$this->success("Bilgiler Güncellendi");

	}


	public function delete($categoryId=false)
	{
		$this->db->where('categoryId',$categoryId)->delete('pages_category_lang');
		$this->db->where('categoryId',$categoryId)->delete('pages_category');

		$this->success("Kategori Silindi");
	}




	





}
