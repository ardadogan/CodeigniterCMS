<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urun extends MY_Controller {




	public function index($kategori_id=false)
	{
		$this->header('Ürünler');
			
			if($kategori_id==""){
				$data['list'] = $this->db->get('urun')->result();
			}else{
				$data['list'] = $this->db->where('kategori_id',$kategori_id)->get('urun')->result();
				$data['kategori_id'] = $kategori_id;
			}

			$this->load->view('urun/urun/list',$data);

		$this->footer();
	}




	public function yeni($id=false)
	{
		$this->header('Ürünler');

			$data['list'] = $this->db->get('kategori')->result();
			$data['id'] = $id;
			$this->load->view('urun/urun/yeni',$data);

		$this->footer();
	}




	public function create()
	{
		$data = $this->input->post();


		# Boşluk Denetimi
		foreach ($data['ad'] as $key => $value) {
			
			if($key=='tr' && $value==""){
				exit("Ürün Adı ".strtoupper($key)." boş bırakılamaz");
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
				$this->my_upload->image_ratio_no_zoom_in = true;
				$this->my_upload->image_ratio 			= true;
				$this->my_upload->image_ratio_crop 		= false;
				$this->my_upload->image_ratio_fill 		= true;
				$this->my_upload->image_x				= 1000;
				$this->my_upload->image_y				= 700;
				$this->my_upload->process('../assets/images/urun/');

				if($this->my_upload->processed == true){

					
					$data['resim'] = $this->my_upload->file_dst_name;

					
				
				}else{

					exit($this->my_upload->error."||error");

				}

			}else{

				exit("Ürün görseli yüklemeden işleme devam edilemez||error");

			}



			if($this->db->insert('urun',$data)){
				exit("Yeni ürün oluşturuldu||success");
			}else{
				exit("Ürün oluşturulurken bir sorun oluştu||error");
			}

	}




	public function duzenle($id=false)
	{
		$this->header('Ürünler');

			$data['data'] 	= $this->db->where('id',$id)->get('urun')->row();
			$data['list'] 	= $this->db->get('kategori')->result();
			$data['id'] = $id;

			$this->load->view('urun/urun/duzenle',$data);

		$this->footer();
	}




	public function update($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }

		$data = $this->input->post();


		if($data['kategori_id']==0){ exit("Ürün Kategorisi seçilmeden işleme devam edilemez||error"); }

		# Boşluk Denetimi
		foreach ($data['ad'] as $key => $value) {
			
			if($key=='tr' && $value==""){
				exit("Ürün Adı ".strtoupper($key)." boş bırakılamaz||error");
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
				$this->my_upload->image_ratio_no_zoom_in = false;
				$this->my_upload->image_ratio 			= true;
				$this->my_upload->image_ratio_crop 		= false;
				$this->my_upload->image_ratio_fill 		= true;
				$this->my_upload->image_x				= 1000;
				$this->my_upload->image_y				= 700;
				$this->my_upload->process('../assets/images/urun/');

				if($this->my_upload->processed == true){

					
					$data['resim'] = $this->my_upload->file_dst_name;
				
				}else{

					exit($this->my_upload->error."||error");

				}

			}else{

			}


			$this->db->where('id',$id);

			if($this->db->update('urun',$data)){
				exit("Ürün bilgileri güncellendi||success");
			}else{
				exit("Ürün bilgileri güncellenirken bir sorun oluştu||error");
			}

	}




	public function sil($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }


		if($this->db->delete('urun', array('id' => $id))){
			exit("Ürün Silindi||success");
		}else{
			exit("Ürün Silinemedi. Bir sorun oluştu||error");
		}

	}




	





}
