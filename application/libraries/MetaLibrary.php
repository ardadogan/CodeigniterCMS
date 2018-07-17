<?php
/*~ MetaLibrary.php
.---------------------------------------------------------------------------.
|  Software: Meta Library													|
|   Version: 1																|
|   Authors: Barış Babacanoğlu 												|
|      Date: 2016 															|
'---------------------------------------------------------------------------'
*/


defined('BASEPATH') OR exit('No direct script access allowed');


class MetaLibrary
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}


	public function getMetaTags($type=false,$contentId=false)
	{
		
		$default 	= $this->defaultMetaTags();
		$data 		= $this->defaultMetaTags();

		if(is_array($type)){
			$data = $this->arrayToMetaTags($type);
		}else{
			if($type=='page'){
				$data = $this->getPageMetaTags($contentId);
			}else{
				if($type){
					$data = new stdClass;
					$data->title = _r($type,true);
				}
			}
		}


		return $this->createMetaTags($default,$data);
	}


	public function createMetaTags($default,$data)
	{
		$response = new stdClass;

		if(!$data){
			$data = $default;
		}

			if($data->title==''){
				$data->title = $default->title;
			}

			if(isset($data->description)){
				if($data->description==''){
					$data->description = $default->description;
				}
			}else{
				$data->description = $default->description;
			}

			if(isset($data->keywords)){
				if($data->keywords==''){
					$data->keywords = $default->keywords;
				}
			}else{
				$data->keywords = $default->keywords;
			}

			if(isset($data->google_site_verification)){
				if($data->google_site_verification==''){
					$data->google_site_verification = $default->google_site_verification;
				}
			}else{
				$data->google_site_verification = $default->google_site_verification;
			}

			if(isset($data->analytics_code)){
				if($data->analytics_code==''){
					$data->analytics_code = $default->analytics_code;
				}
			}else{
				$data->analytics_code = $default->analytics_code;
			}


		$response->title 					= $data->title;
		$response->keywords 				= $data->keywords;
		$response->description 				= $data->description;
		$response->google_site_verification = $data->google_site_verification;
		$response->analytics_code 			= $data->analytics_code;

		$response->html  = '
		<!-- Meta Tags -->
		<title>'.$data->title.'</title>
		<meta charset="UTF-8">
		<base href="'.base_url().'">
		<meta name="description" content="'.$data->description.'" />
		<meta name="keywords" content="'.$data->keywords.'" />
	
		<!-- For Google -->
		<meta name="google-site-verification" content="'.$data->google_site_verification.'" />	
		';


		return $response;
	}


	public function arrayToMetaTags($data)
	{
		$response = new stdClass;

		
		if($data){

			if(isset($data['title'])){
				$response->title = $data['title'];
			}

			if(isset($data['description'])){
				$response->description = $data['description'];
			}

			if(isset($data['keywords'])){
				$response->keywords = $data['keywords'];
			}

			return $response;

		}else{
			return false;
		}


	}


	public function getPageMetaTags($pageId)
	{
		$response = new stdClass;

		$data = $this->ci->commonModel->getPageInfo($pageId);


		if($data){
			$response->title = $data->name;
			$response->description = $this->strToDescription($data->text);

			return $response;
		}else{
			return false;
		}


	}


	public function defaultMetaTags()
	{

		# Default site infos
			$default = $this->ci->db->where('languageId',0)->get('app')->row();
		
		# Active Language Data
			$data 	= $this->ci->db->where('languageId',$this->ci->_lng->languageId)->get('app')->row();

		# Default Language Data
			$dData	= $this->ci->db->where('languageId',$this->ci->defaultLng->languageId)->get('app')->row();

		# Controls
			if(!$data){
				$data = $dData;
			}

			if($data->title==''){
				$data->title = $dData->title;
			}

			if($data->description==''){
				$data->description = $dData->description;
			}

			if($data->keywords==''){
				$data->keywords = $dData->keywords;
			}

			if($data->google_site_verification==''){
				$data->google_site_verification = $default->google_site_verification;
			}

			if($data->analytics_code==''){
				$data->analytics_code = $default->analytics_code;
			}

		return $data;


	}


	public function strToDescription($data=fasle)
	{
		$data = str_ireplace('&ccedil;', 'ç', $data);
		$data = str_ireplace('&ouml;', 'ö', $data);
		$data = str_ireplace('&uuml;', 'ü', $data);
		$data = str_ireplace('&nbsp;', ' ', $data);
		$data = str_ireplace('\n', '', $data);
		$data = str_ireplace('\r', '', $data);
		$data = str_ireplace('\t', '', $data);


		$data = mb_substr(strip_tags($data),0,150,'utf-8');

		$data = trim(preg_replace('/\s\s+/', ' ', $data));

		return $data;

	}


}




?>