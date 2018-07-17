<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {




	public function index()
	{

		$data['base'] = $this->db->where('languageId',0)->get('app')->row();
		$data['safe'] = $this->check_password_safe();
		
		$this->header('Anasayfa');
		
			$this->load->view('home',$data);

		$this->footer();
	}


	public function check_password_safe()
	{
		$data = $this->db->get('admin_user')->row();

		$u = $data->username;
		$p = $data->password;

		if($u=='admin' and $p=='admin'){
			return false;
		}elseif($p=='admin'){
			return false;
		}elseif(strlen($p)<5){
			return false;
		}else{
			return true;
		}

	}




	





}
