<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {




	public function index()
	{
			
		$data['list'] = $this->db->where('type','gallery')->get('gallery_category')->result();

		$this->header('Albümler');
			$this->load->view('gallery/category/list',$data);
		$this->footer();
	}


	public function add()
	{
		$this->header('Yeni Albüm Ouluştur');
			$this->load->view('gallery/category/add');
		$this->footer();
	}


	public function create()
	{
		
		# Form Data
			$formData = $this->input->post();

		# Album Info
			if(empty($formData['common']['width'])){ $this->error("Lütfen görsel boyutu belirleyin (Genişlik)"); }
			if(empty($formData['common']['height'])){ $this->error("Lütfen görsel boyutu belirleyin (Yükseklik)"); }

			$sData = $formData['common'];

		

		# Create Album
			if($this->db->insert('gallery_category',$sData)){
				$this->success("Yeni albüm oluşturuldu");
			}else{
				$this->error("Albüm oluşturulamadı");
			}


	}


	public function edit($galleryId=false)
	{

		$data['category'] 	= $this->db->where('galleryId',$galleryId)->get('gallery_category')->row();


		$this->header('Albümü Düzenle');
			$this->load->view('gallery/category/edit',$data);
		$this->footer();
	}


	public function update($galleryId=false)
	{
		
		# Form Data
			$formData = $this->input->post();

		# Category Info
			if(empty($formData['common']['width'])){ $this->error("Lütfen görsel boyutu belirleyin (Genişlik)"); }
			if(empty($formData['common']['height'])){ $this->error("Lütfen görsel boyutu belirleyin (Yükseklik)"); }

			$sData = $formData['common'];

			$this->db->where('galleryId',$galleryId);
			$this->db->update('gallery_category',$sData);
			
		
			$this->success("Bilgiler Güncellendi");

	}


	public function delete($galleryId=false)
	{
		$this->db->where('galleryId',$galleryId)->delete('gallery_category');

		$this->success("Albüm Silindi");
	}




	





}
