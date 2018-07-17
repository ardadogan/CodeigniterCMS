<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index()
	{
		# Controller



		# Show
			$this->header();
				$this->load->view($this->app->template.'/home/home');
			$this->footer();
	}
}
