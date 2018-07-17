<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {

	
	public function index()
	{

		echo '<pre>';
			print_r($this->getDirContents('./assets/'));
		echo '</pre>';

	}


	public function getDirContents($dir, &$results = array()){
	    $files = scandir($dir);

	    foreach($files as $key => $value){
	        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
	        if(!is_dir($path)) {
	            $results[] = $path;
	        } else if($value != "." && $value != "..") {
	            $this->getDirContents($path, $results);
	            $results[] = $path;
	        }
	    }

	    return $results;
	}


}
