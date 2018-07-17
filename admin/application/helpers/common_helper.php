<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	FUNCTION LIST

	language_tabs 	: İçerik için dil tabları oluşturur
	text_editor 	: Gelişmiş metin editörü
	image_uploader 	: Görsel yüklemek için form alanını oluşturur
	image_upload 	: Resim yükleme işlemini yapar

 */



if ( ! function_exists('language_tabs'))
{
	function language_tabs($name=false,$text=false)
	{
		
		$ci =& get_instance();

		foreach ($ci->langs as $key => $value) {
					
			$activeClass="";
			if($ci->_lang->languageId==$value->languageId){
				$activeClass="active";
			}

			if($value->default){
				$defaultLang = '<i class="entypo-check"></i>';
			}else{
				$defaultLang = '';
			}

			echo '
				<li class="'.$activeClass.'">
					<a href="#tab-'.$value->code.'" data-toggle="tab">
						<span class="visible-xs"> '.$defaultLang.' <img src="assets/images/flag/'.$value->code.'.png" alt=""></span>
						<span class="hidden-xs"> '.$defaultLang.' <img src="assets/images/flag/'.$value->code.'.png" alt=""> '.$value->alias.'</span>
					</a>
				</li>
			';
		}

	}
}


if ( ! function_exists('text_editor'))
{
	function text_editor($name=false,$id=false,$text=false)
	{
		
		$ci =& get_instance();

		echo '

			<input name="editorFileInput" type="file" id="upload" onchange="" style="display:none;">
			<style>
				.hidden{display:none;}
			</style>

			<script>

				tinymce.init({
					selector: ".text_editor",
					theme: "modern",
					paste_data_images: true,
					plugins: [
						"advlist autolink lists link image charmap print preview hr anchor pagebreak",
						"searchreplace wordcount visualblocks visualchars code fullscreen",
						"insertdatetime media nonbreaking save table contextmenu directionality",
						"emoticons template paste textcolor colorpicker textpattern"
					],
					toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",
					image_advtab: true,
					file_picker_callback: function(callback, value, meta) {


						jQuery("#upload").trigger("click");
						jQuery("#upload").on("change", function() {

						var file = this.files[0];

						var formData = new FormData();
						formData.append("file", file);


						jQuery.ajax({
							url         : "'.base_url("tools/editor/upload").'",
							data 		: formData,
							cache       : false,
							contentType : false,
							processData : false,
							type        : "POST",
							success     : function(data, textStatus, jqXHR){

								callback(data, {
									alt: ""
								});

								jQuery("#upload").val("");

							},
							error: function(data, textStatus, jqXHR){

							},
						});


						});

					}
				});

			</script>



		';

	}
}


if ( ! function_exists('image_uploader'))
{
	/**
	 * @param  int 		$width
	 * @param  int 		$height
	 * @param  string 	$url
	 * @param  string 	$currentImg
	 * @param  string 	$inputName
	 * @return string 	html codes
	 */
	function image_uploader($data)
	{
		
		$width 		= $data['width'];
		$height 	= $data['height'];
		$currentImg = $data['currentImg'];
		$inputName 	= $data['inputName'];

		$ci =& get_instance();

			static $calls = 0;

		$postMaxSize = (int)(str_replace('M', '', ini_get('post_max_size')) * 1024 * 1024);


		if($width<=200 and $height<=200){
			$factor = 70;
		}elseif($width<=1000 and $height<=1000){
			$factor = 20;
		}elseif($width<=2000 and $height<=2000){
			$factor = 15;
		}elseif($width<=3000 and $height<=3000){
			$factor = 10;
		}else{
			$factor = 5;
		}

		$lastWidth = ($width/100)*$factor;
		$lastHeight = ($height/100)*$factor; 


		if(!$currentImg){
			$currentImg = 'http://placehold.it/'.$width.'x'.$height;
		}
		
		echo '




				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: '.$lastWidth.'px; height: '.$lastHeight.'px;" data-trigger="fileinput">
						<img src="'.$currentImg.'" alt="...">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: '.$lastWidth.'px; max-height: '.$lastHeight.'px;"></div>
					<div>
						<span class="btn btn-white btn-file">
							<span class="fileinput-new">Dosya Seç</span>
							<span class="fileinput-exists">Değiştir</span>
							<input type="file" name="'.$inputName.'" class="input_'.$inputName.'" accept="image/*">
						</span>
						<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Sil</a>
					</div>
				</div>


				<script>
				
					jQuery(".input_'.$inputName.'").bind("change", function() {

						var size = this.files[0].size;
						var dSize = '.$postMaxSize.';

						if(size>=dSize){
							alert("Yüklenebilecek max dosya boyutu aşıldı ('.ini_get('post_max_size').')");
							this.clear;
						}


					});
				</script>


		';


		++$calls;

		if($calls==1){
			echo '<script src="assets/js/fileinput.js"></script>';
		}

	}
}


if ( ! function_exists('image_upload'))
{
	
	function image_upload($data=false)
	{

		$ci =& get_instance();

		# Cheeck file
			if(!$data['fileInput']){ $ci->error('empty input file'); }

		# Check file error
			if($data['required']){
				if($data['fileInput']['error']==4){ $ci->error("Resim dosya seçilmedi"); }
			}


		$ci =& get_instance();

		$ci->load->library('upload/my_upload');


			$ci->my_upload->upload($data['fileInput']);


			if ( $ci->my_upload->uploaded == true  ) {

				$logo_boyutlari = $ci->config->item('general');

				$ci->my_upload->allowed = array('image/*');

				if($data){

					if(isset($data['name'])){
						$ci->my_upload->file_new_name_body = $data['name'];
					}

					if(isset($data['width']) or isset($data['height'])){

						$ci->my_upload->image_x = $data['width'];
						$ci->my_upload->image_y = $data['height'];

						if(!isset($data['ratio'])){ exit("Oran belirtilmedi"); }

						if($data['ratio']=='fill'){
							$ci->my_upload->image_resize 		= true;
							$ci->my_upload->image_ratio 		= true;
							$ci->my_upload->image_ratio_crop 	= true;
							$ci->my_upload->image_ratio_fill 	= false;
						}elseif($data['ratio']=='fit'){
							$ci->my_upload->image_resize 		= true;
							$ci->my_upload->image_ratio 		= true;
							$ci->my_upload->image_ratio_crop 	= false;
							$ci->my_upload->image_ratio_fill 	= true;
						}elseif($data['ratio']=='expand'){
							$ci->my_upload->image_resize 		= true;
							$ci->my_upload->image_ratio 		= false;
							$ci->my_upload->image_crop 			= true;
							$ci->my_upload->image_ratio_fill 	= false;
						}elseif($data['ratio']=='none'){
							$ci->my_upload->image_x = false;
							$ci->my_upload->image_y = false;
						}

					}

				}

				
				$ci->my_upload->process($data['path']);

				if($ci->my_upload->processed == true){
					
					return $ci->my_upload->file_dst_name;

				}else{

					exit($ci->my_upload->error."||error");

				}

			}else{
				return 'default.png';	
			}

	}
}


if(!function_exists('sef_url')){

	function sef_url($string)
	{
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '&');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', 've');
		$string = strtolower(str_replace($find, $replace, $string));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	}

}


if(!function_exists('app_url')){

	function app_url($url=false)
	{
		$appUrl  = str_replace('/admin', '', base_url());

		if($url){
			$appUrl .= $url;
		}

		return $appUrl;
	}

}


if(!function_exists('block_message')){

	function block_message($title=false,$text=false)
	{
		
		echo '
			<blockquote class="blockquote-blue">
				<p>
					<strong>'.$title.'</strong>
				</p>
				<p>
					'.$text.'
				</p>
			</blockquote>

			<script>
				setTimeout(function(){ jQuery("blockquote").fadeOut(); }, 5000);
			</script>	
		';
	}

}





?>