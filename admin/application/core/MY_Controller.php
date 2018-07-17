<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public $appConfig;
	public $navLinks;
	public $_lang;
	public $langs;


	public function __construct()
	{
		parent::__construct();


		# Check User Session
			$this->checkUserSession();

		# Language
			$this->configureLanguage();

		# 
			$this->navLinks();

		# load config
			include("../config.php");

			$this->appConfig = $conf;

			$this->appUrl = str_ireplace('/admin', '/', base_url());

		
	}




	public function index()
	{
			
	}




	public function header($title=true)
	{	

		if($title!=""){
			$data['title'] = $title.' | Yönetim Paneli';
		}else{
			$data['title'] = 'Yönetim Paneli';
		}

		# for empty page titles
			$data['pageTitle'] = 'İçerik';

		$this->load->view('common/header', $data);

	}




	public function footer($title=true)
	{	

		$this->load->view('common/footer');

	}


	public function configureLanguage()
	{
		$this->_lang 	= $this->db->where('default',1)->get('languages')->row();
		$this->langs 	= $this->db->where('status',1)->get('languages')->result();
	}




	public function checkUserSession()
	{
		
		if(!$this->session->userdata('adminSession7oigFda5ltaATymajJMTzl')){
			
			redirect(base_url('login'));
		}

	}


	public function pre($data=false)
	{
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		exit();
	}


	public function navLinks()
	{
		$this->navLinks = '
			
			+Ayarlar||entypo-cog
				*SEO Ayarları|settings/seo
				*Kullanıca Ayarları|settings/user
				*Dil Seçenekleri|settings/language
			+Site||entypo-globe
				*İletişim Bilgileri|site/contact
				*Sosyal Medya Hesapları|site/social
			-Ürünler|product/category|entypo-basket
			-Sayfalar|pages/category|entypo-doc-text-inv
			-Galeri|gallery/category|entypo-picture
			-Mobil Uygulama|mobile|entypo-mobile

			';
	}


	public function success($data=false)
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

		
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
			
		}
	}


	public function error($data=false)
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

			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
			
		}
	}





}



?>