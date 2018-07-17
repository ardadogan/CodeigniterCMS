<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {




	public function index()
	{

		
		$data['user'] = $this->db->get('admin_user')->row();

		
		$this->header('Kullanıcı Ayarları');
			$this->load->view('settings/user/index',$data);
		$this->footer();
	}


	public function update()
	{
		
		# Form Data
			$formData = $this->input->post();

		# Category Info
			$sData = $formData['common'];

			$this->db->where('userId',1);
			$this->db->update('admin_user',$sData);

			$this->success("Bilgiler Güncellendi");

	}




	





}
