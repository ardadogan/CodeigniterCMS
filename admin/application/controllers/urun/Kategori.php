<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {




	public function index()
	{
		$this->header('Kategoriler');
			
			$data['list'] = $this->db->get('kategori')->result();

			$this->load->view('urun/kategori/list',$data);

		$this->footer();
	}




	public function yeni($id=false)
	{
		$data['list'] = $this->db->get('kategori')->result();
		$data['id'] = $id;
		$this->load->view('urun/kategori/yeni',$data);
	}




	public function create()
	{
		$data = $this->input->post();


		# Boşluk Denetimi
		foreach ($data['ad'] as $key => $value) {
			
			if($key=='tr' && $value==""){
				exit("Kategori ".strtoupper($key)." boş bırakılamaz");
			}

			if($key=="tr"){
				$data['ad_l'][$key] = str_replace(array('i'), array('İ'), $value);
				$data['ad_l'][$key] = mb_strtoupper($data['ad_l'][$key], "UTF-8");
			}else{
				$data['ad_l'][$key] = $value;
			}


			$data['sef'][$key] = SefLink($value);
		}
		
		
		$resim_adi = SefLink($data['ad']['tr']);

		$data['ad'] = json_encode($data['ad']);
		$data['sef'] = json_encode($data['sef']);
		$data['ad_l'] = json_encode($data['ad_l']);



		// Sınıfı Yükle Yükle
			$this->load->library('upload/my_upload');


			$this->my_upload->upload($_FILES["userfile"]);

			if ( $this->my_upload->uploaded == true  ) {

				$logo_boyutlari = $this->config->item('general');

				$this->my_upload->allowed         		= array('image/*');
				$this->my_upload->file_new_name_body 	= $resim_adi;
				$this->my_upload->image_resize 			= true;
				$this->my_upload->image_ratio 			= true;
				$this->my_upload->image_ratio_crop 		= false;
				$this->my_upload->image_ratio_fill 		= true;
				$this->my_upload->image_x				= 470;
				$this->my_upload->image_y				= 250;
				$this->my_upload->process('../assets/images/kategori/');

				if($this->my_upload->processed == true){

					
					$data['resim'] = $this->my_upload->file_dst_name;

					
				
				}else{

					exit($this->my_upload->error."||error");

				}

			}else{

				// exit("Kategori görseli yüklemeden işleme devam edilemez||error");

			}



			if($this->db->insert('kategori',$data)){
				exit("Yeni kategori oluşturuldu||success");
			}else{
				exit("Kategori oluşturulurken bir sorun oluştu||error");
			}

	}




	public function duzenle($id=false)
	{
		if(!$id){ exit("Hatalı veri"); }


			$data['data'] 	= $this->db->where('id',$id)->get('kategori')->row();
			$data['list'] 	= $this->db->get('kategori')->result();

			$this->load->view('urun/kategori/duzenle',$data);

	}




	public function update($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }

		$data = $this->input->post();


		# Boşluk Denetimi
		foreach ($data['ad'] as $key => $value) {
			
			if($key=='tr' && $value==""){
				exit("Kategori ".strtoupper($key)." boş bırakılamaz");
			}

			if($key=="tr"){
				$data['ad_l'][$key] = str_replace(array('i'), array('İ'), $value);
				$data['ad_l'][$key] = mb_strtoupper($data['ad_l'][$key], "UTF-8");
			}else{
				$data['ad_l'][$key] = $value;
			}


			$data['sef'][$key] = SefLink($value);
		}
		
		
		$resim_adi = SefLink($data['ad']['tr']);

		$data['ad'] = json_encode($data['ad']);
		$data['sef'] = json_encode($data['sef']);
		$data['ad_l'] = json_encode($data['ad_l']);

		// Sınıfı Yükle Yükle
			$this->load->library('upload/my_upload');


			$this->my_upload->upload($_FILES["userfile"]);

			if ( $this->my_upload->uploaded == true  ) {

				$logo_boyutlari = $this->config->item('general');

				$this->my_upload->allowed         		= array('image/*');
				$this->my_upload->file_new_name_body 	= $resim_adi;
				$this->my_upload->image_resize 			= true;
				$this->my_upload->image_ratio 			= true;
				$this->my_upload->image_ratio_crop 		= false;
				$this->my_upload->image_ratio_fill 		= true;
				$this->my_upload->image_x				= 470;
				$this->my_upload->image_y				= 250;
				$this->my_upload->process('../assets/images/kategori/');

				if($this->my_upload->processed == true){

					
					$data['resim'] = $this->my_upload->file_dst_name;
				
				}else{

					exit($this->my_upload->error."||error");

				}

			}else{

			}


			$this->db->where('id',$id);

			if($this->db->update('kategori',$data)){
				exit("Kategori bilgileri güncellendi||success");
			}else{
				exit("Kategori bilgileri güncellenirken bir sorun oluştu||error");
			}

	}




	public function sil($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }


		if($this->db->delete('kategori', array('id' => $id))){
			exit("Kategori Silindi||success");
		}else{
			exit("Kategori Silinemedi. Bir sorun oluştu||error");
		}

	}




	





}
