<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailLibrary
{
	public $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	/*
	* FUNCTIONS
	-------------------------------------------------*/




	/*
	* Run 
	-------------------------------------------------*/

	public function send($data=false)
	{

		if(!isset($data['to_mail']) or $data['to_mail']==""){
			$data['to_mail'] = $this->ci->app->smtp->to_mail;
		}

		if(!isset($data['to_name']) or $data['to_name']==""){
			$data['to_name'] = $this->ci->app->smtp->to_name;
		}

		if(!isset($data['subject']) or $data['subject']==""){
			$data['subject'] = $this->ci->app->smtp->subject;
		}

		if(!isset($data['from_mail']) or $data['from_mail']==""){
			$data['from_mail'] = $this->ci->app->smtp->from_mail;
		}

		if(!isset($data['from_name']) or $data['from_name']==""){
			$data['from_name'] = $this->ci->app->smtp->from_name;
		}



		$this->ci->load->library('phpmailer/PHPMailer');
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = $this->ci->app->smtp->smtp_ssl;
		$mail->Host = $this->ci->app->smtp->smtp_host;
		$mail->Port = $this->ci->app->smtp->smtp_port;
		$mail->Username = $this->ci->app->smtp->smtp_user;
		$mail->Password = $this->ci->app->smtp->smtp_pass;
		$mail->SetFrom($data['from_mail'], $data['from_name']);
		
		try {

			$mail->AddAddress($data['to_mail'], $data['to_name']);
			$mail->CharSet = 'UTF-8';
			$mail->Subject = $data['subject'];
			$mail->MsgHTML($data['html']);
			$mail->Send();

			echo 'success';

		} catch (phpmailerException $e){
			echo 'error';
			# $this->ci->pre($e->errorMessage());
		}catch (Exception $e) {
			echo 'error';
			# $this->ci->pre($e->getMessage());
		}

		

	}





	public function checkRequire($data,$rule,$names)
	{
		
		$exp 	= explode(',', $rule);
		$name 	= explode(',', $names);

		foreach ($exp as $key => $value) {
			# check input object
				if(!isset($data[$value])){
					exit($name[$key].' Alanı bulunamadı');
				}

			# check empty
				if(empty(trim($data[$value]))){
					exit($name[$key].' Alanının doldurulması gerekli');
				}
		}


	}

	

}




?>