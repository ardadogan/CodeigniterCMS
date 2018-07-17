<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if(!function_exists('list_img_ratio')){

	function list_img_ratio($selected=false)
	{
		$ratios = array(
			'fill' 		=> 'Doldur',
			'fit' 		=> 'Sığdır',
			'expand' 	=> 'Genişlet',
			'none' 		=> 'Boyutlandırma',
			);

		foreach ($ratios as $key => $value) {
			if($key==$selected){
				echo '<option value="'.$key.'" selected>'.$value.'</option>';
			}else{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
		}

	}

}



if(!function_exists('formOption')){

	function form_options($list=array(),$selected=false)
	{
		foreach ($list as $key => $value) {
			if($key==$selected){
				echo '<option value="'.$key.'" selected>'.$value.'</option>';
			}else{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
		}

	}

}





?>