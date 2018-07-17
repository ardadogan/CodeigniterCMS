<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
	

	public function index()
	{
		# Controller
			
		$meta = array(
			'title' => _r('İletişim',true),
			'description' => 'Sitelitik iletişim bilgileri'
			);

		# Show
			$this->header("İletişim");
				$this->load->view($this->app->template.'/pages/contact');
			$this->footer();
	}
	

	public function group()
	{
		# Controller
			


		# Show
			$this->header();
				$this->load->view($this->app->template.'/pages/contact_group');
			$this->footer();
	}


	
}
