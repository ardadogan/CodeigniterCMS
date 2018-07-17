<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {




	public function index($parentId=0)
	{
			
		$data['category'] = $this->db->get('contact_info_category')->result();


		$this->header('İletişim Grupları');
			$this->load->view('site/contact/list',$data);
		$this->footer();
	}


	public function add()
	{
		
		$this->header('Yeni Kategori Oluştur');
			$this->load->view('site/contact/add');
		$this->footer();
	}


	public function create($parentId=0)
	{
				
		# Form Data
			$formData = $this->input->post();

			if(empty($formData)){ $this->error("Kategori adını yazın"); }

		# Create Category
			

			if($this->db->insert('contact_info_category',$formData)){
				$this->success(array('message'=>'Yeni Kategori Oluşturuldu','categoryId'=>$this->db->insert_id()));
			}else{
				$this->error("Kategori oluşturulamadı");
			}

	}


	public function edit($categoryId=false)
	{

		$data['category'] 	= $this->db->where('categoryId',$categoryId)->get('contact_info_category')->row();

		$this->header('Kategoriyi Güncelle');
			$this->load->view('site/contact/edit',$data);
		$this->footer();
	}


	public function update($categoryId=false)
	{
		
		# Form Data
			$formData = $this->input->post();

			if(empty($formData)){ $this->error("Kategori adını yazın"); }

		# Create Category
			

			$this->db->where('categoryId',$categoryId)->update('contact_info_category',$formData);

		$this->success("Bilgiler Güncellendi");

	}


	public function delete($categoryId=false)
	{
		$this->db->where('categoryId',$categoryId)->delete('contact_info_category');

		$this->success("Kategori Silindi");
	}


	public function info($categoryId=false)
	{

		$data['category'] 	= $this->db->where('categoryId',$categoryId)->get('contact_info_category')->row();
		$data['ib'] 		= $this->db->where('categoryId',$categoryId)->get('contact_info')->result_array();

		$this->header('Kategoriyi Güncelle');
			$this->load->view('site/contact/info',$data);
		$this->footer();
	}


	public function infoDelete($id=false){

		if(!$id){
			$this->error("Hatalı İşlem");
		}else{
			
			if($this->db->delete('contact_info',array('id'=>$id))){
				$this->success("Silindi");
			}else{
				$this->error("Silinemedi");
			}
		}
		
	}


	public function infoUpdate($categoryId=false){
		

		foreach ($this->input->post() as $key => $value) {
			
			
				if(isset($value['yeni'])){

					// Yeni Bilgileri Ayır
						$yeniler = $value['yeni'];
					
					// Yeni Bilgileri diziden temizle
						array_pop($value);

					// Yeni Bilgileri Kaydet
						$this->addInfo($yeniler,$key,$categoryId);
				}

				$this->updateInfo($value,$key,$categoryId);

		}

		$this->success("İletişim bilgileri güncellendi");

	}




	public function updateInfo($data,$tur,$categoryId=false){

		$veri = array();

		foreach ($data as $key => $value) {
			$veri[$key] = array(
				'categoryId' => $categoryId,
				'id' => $key,
				'i_value' => $value
				);
		}

		// Veri varsa işlem yap
		if(count($veri)>0){
			$this->db->update_batch('contact_info',$veri,'id');
		}
		
	}




	public function addInfo($data,$tur,$categoryId=false){

		$veri = array();

		foreach ($data as $key => $value) {
			if($value!=""){
				$veri[$key] = array(
					'categoryId' => $categoryId,
					'i_key' => $tur,
					'i_value' => $value
					);
			}
		}

		// Veri varsa işlem yap
		if(count($veri)>0){
			$this->db->insert_batch('contact_info',$veri);
		}


	}




	





}
