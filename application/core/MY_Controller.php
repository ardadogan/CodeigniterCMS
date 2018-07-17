<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	# App Configs
		public $app;


	# All System Langs
		public $languages;	# Language list

	# Active App Language
		public $_lng;		# Object

	# Default Language
		public $defaultLng; # Object



	public function __construct()
	{
		parent::__construct();

		# Configuration
			$this->configuration();

		# language 
			$this->configureLanguage();



	}


	public function header($metaType=false,$contentId=false)
	{
		# Set template and language shortcut
			$data['template'] 	= $this->app->template;
			$data['lng'] 		= $this->_lng->code;

		# Meta Tags
			$data['meta'] = $this->metaLibrary->getMetaTags($metaType,$contentId);

		$this->load->view($this->app->template.'/common/header',$data);
	}


	public function footer()
	{
		$this->load->view($this->app->template.'/common/footer');
	}


	public function configuration()
	{
		include("config.php");

		$this->app = json_decode(json_encode($conf), FALSE);
	}


	public function configureLanguage()
	{
		
		$languages = $this->commonModel->getLanguages();

		$this->languages = $languages['list'];

		if($this->uri->segment(1)){

			if(in_array($this->uri->segment(1), $languages['codes'])){
				$lngCode = $this->uri->segment(1);
			}else{
				header('HTTP/1.0 403 Forbidden');
				exit();
			}

		}else{

			$browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

			if(in_array($browserLang, $languages['codes'])){
				$lngCode = $browserLang;
			}else{
				$lngCode = $languages['default']->code;
			}
		}

		$this->_lng 		= $this->db->where('code',$lngCode)->get('languages')->row();
		$this->defaultLng 	= $this->db->where('languageId',$languages['default']->languageId)->get('languages')->row();

		$this->app->language = $this->commonModel->getLanguage($this->_lng->code);

		
	}


	public function pre($data=false,$exit=false)
	{
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		
		if($exit){
			exit();
		}

	}


	public function success($data=false,$dataType='json')
	{
		$response;

		if($data){


			if(is_array($data)){
				$response = $data;
				$response['status'] = true;
			}elseif(is_object($data)){
				$response = $data;
				$response->status = true;
			}else{
				$response = array();
				$response['status'] = true;
				$response['message'] = $data;
			}

			if($dataType=='json'){
				header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
		}
	}


	public function error($data=false,$dataType='json')
	{
		$response;

		if($data){


			if(is_array($data)){
				$response = $data;
				$response['status'] = false;
			}elseif(is_object($data)){
				$response = $data;
				$response->status = false;
			}else{
				$response = array();
				$response['status'] = false;
				$response['message'] = $data;
			}

			if($dataType=='json'){
				header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
		}
	}




}

?>