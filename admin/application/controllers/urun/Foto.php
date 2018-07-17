<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends MY_Controller {




	public function index($urun_id=false)
	{
		$this->header('Fotoğraflar');

			$data['urun_id'] = $urun_id;
			
			$data['urun'] 	= $this->db->where('id',$urun_id)->get('urun')->row();	
			$data['foto'] 	= $this->db->where('urun_id',$urun_id)->get('foto')->result();

			$this->load->view('urun/foto/list',$data);

		$this->footer();
	}




	public function yeni($id=false)
	{
		$this->header('Fotoğraflar');

			$data['list'] = $this->db->get('kategori')->result();
			$data['id'] = $id;
			$this->load->view('urun/foto/yeni',$data);

		$this->footer();
	}




	public function create($urun_id=false)
	{


		// Sınıfı Yükle Yükle
			$this->load->library('upload/my_upload');


			$this->my_upload->upload($_FILES["file"]);

			if ( $this->my_upload->uploaded == true  ) {

				$logo_boyutlari = $this->config->item('general');

				$this->my_upload->allowed         		= array('image/*');
				$this->my_upload->file_new_name_body 	= SefLink(DOMAIN);
				$this->my_upload->image_resize 			= true;
				$this->my_upload->image_ratio 			= true;
				$this->my_upload->image_ratio_crop 		= false;
				$this->my_upload->image_ratio_fill 		= true;
				$this->my_upload->image_x				= 774;
				$this->my_upload->image_y				= 400;
				$this->my_upload->process('../assets/images/galeri/');

				if($this->my_upload->processed == true){

					
					$data['resim'] = $this->my_upload->file_dst_name;
					$data['urun_id'] = $urun_id;


					if($this->db->insert('foto',$data)){
						exit("Fotoğraf Eklendi||success");
					}else{
						exit("Fotoğraf eklenirken bir sorun oluştu||error");
					}
				


				}else{

					exit($this->my_upload->error."||error");

				}

			}else{

				
			}


	}




	public function duzenle($id=false)
	{
		$this->header('Fotoğraflar');

			$data['data'] 	= $this->db->where('id',$id)->get('urun')->row();
			$data['list'] 	= $this->db->get('kategori')->result();
			$data['id'] = $id;

			$this->load->view('urun/foto/duzenle',$data);

		$this->footer();
	}




	public function update($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }

		$data = $this->input->post();


		if($data['kategori_id']==0){ exit("Fotoğraf Kategorisi seçilmeden işleme devam edilemez||error"); }

		# Boşluk Denetimi
		foreach ($data['ad'] as $key => $value) {
			
			if($key=='tr' && $value==""){
				exit("Fotoğraf Adı ".strtoupper($key)." boş bırakılamaz||error");
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

			}


			$this->db->where('id',$id);

			if($this->db->update('urun',$data)){
				exit("Fotoğraf bilgileri güncellendi||success");
			}else{
				exit("Fotoğraf bilgileri güncellenirken bir sorun oluştu||error");
			}

	}




	public function sil($id=false)
	{
		if(!$id){ exit("Hatalı veri||error"); }


		if($this->db->delete('foto', array('id' => $id))){
			exit("Fotoğraf Silindi||success");
		}else{
			exit("Fotoğraf Silinemedi. Bir sorun oluştu||error");
		}

	}




	





}
