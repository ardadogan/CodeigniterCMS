<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends MY_Controller {




	public function upload()
	{
		
		// Sınıfı Yükle Yükle
		$this->load->library('upload/my_upload');

	
		$file = $_FILES['file'];

		$this->my_upload->upload($file);

		if ( $this->my_upload->uploaded == true  ) {

			$logo_boyutlari = $this->config->item('general');

			$this->my_upload->allowed         		= array('image/*');
			$this->my_upload->file_new_name_body 	= url_title($this->appConfig['domain']);
			$this->my_upload->process('../assets/images/editor/');

			if($this->my_upload->processed == true){

				$data['resim'] = $this->my_upload->file_dst_name;

				// echo "<script>top.jQuery('.mce-btn.mce-open').parent().find('.mce-textbox').val('".base_url('../assets/images/editor/'.$this->my_upload->file_dst_name)."').closest('.mce-window').find('.mce-primary').click();</script>";

				echo app_url('assets/images/editor/'.$this->my_upload->file_dst_name);

			}else{

				exit($this->my_upload->error."||error");

			}

		}else{

			echo "Görsel seçilmedi";
		}


		

	}




	





}
