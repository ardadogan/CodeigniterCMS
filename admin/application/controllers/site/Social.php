<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Controller {




	public function __construct(){

		parent::__construct();
		
	}




	public function index(){

		
		$data['list'] = $this->db->get('social_accounts')->result();


		$this->header("Sosyal Medya Hesapları");

			$this->load->view('site/social/index',$data);

		$this->footer();

	}




	public function update(){

		# Form Data
			$formData = $this->input->post();

		# 
			$newData = array();
			foreach ($formData['url'] as $key => $value) {
				$newData[] = array(
					'accountId' => $key,
					'url' => $value
					);
			}

			$this->db->update_batch('social_accounts',$newData,'accountId');


		$this->success("Bilgiler güncellendi");




	}



}
