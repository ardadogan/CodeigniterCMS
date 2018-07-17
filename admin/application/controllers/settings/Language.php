<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MY_Controller {




	public function index($parentId=0)
	{
			
		
		$data['list'] = $this->db->order_by('status','DESC')->order_by('languageId','ASC')->get('languages')->result();

		$this->header('Kullanılabilir Sistem Dilleri');
			$this->load->view('settings/language/list',$data);
		$this->footer();
	}



	public function update($categoryId=false)
	{
		
		# Form Data
			$formData = $this->input->post();


			$this->db->update('languages',array('status'=>0));

			$newData = array();

			foreach ($formData['languages'] as $key => $value) {
				$newData[] = array(
					'languageId' => $value,
					'status' => 1
					);
			}

			$this->db->update_batch('languages',$newData,'languageId');

		$this->success("Bilgiler Güncellendi");

	}


	





}
