<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('btn'))
{
	function btn($url=false,$text=false,$color=false,$icon=false)
	{
		
		$ci =& get_instance();

		if(!$icon){
			$icon = 'entypo-link';
		}

		if(!$color){
			$color = 'info';
		}
		
		if(!$text){
			$text = '&nbsp;';
		}


		echo '
			<a href="'.$url.'"  title="'.$text.'" class="btn btn-'.$color.' btn-icon icon-left"  data-toggle="tooltip" data-placement="top">
				'.$text.'
				<i class="'.$icon.'"></i>
			</a>
		';

	}
}


if ( ! function_exists('btn_add'))
{
	function btn_add($url=false,$text=false)
	{
		
		$ci =& get_instance();

		echo '
			<a href="'.$url.'"  title="'.$text.'" class="btn btn-success btn-icon icon-left"  data-toggle="tooltip" data-placement="top">
				'.$text.'
				<i class="entypo-plus"></i>
			</a>

		';

	}
}


if ( ! function_exists('btn_save'))
{
	function btn_save($formId=false)
	{
		
		$ci =& get_instance();

		echo '
			<a href="javascript::" onclick="form_gonder(\''.$formId.'\')"  title="Kaydet (CTRL+S)" class="btn btn-success" data-toggle="tooltip" data-placement="top">
				<i class="fa fa-save"></i>
			</a>

			<script>
				ctrls(\''.$formId.'\');
			</script>
		';

	}
}


if ( ! function_exists('btn_edit'))
{
	function btn_edit($url=false)
	{
		
		$ci =& get_instance();

		echo '
			<a href="'.$url.'" title="Düzenle" class="btn btn-info" data-toggle="tooltip" data-placement="top">
				<i class="entypo-pencil"></i>
			</a>
		';

	}
}


if ( ! function_exists('btn_back'))
{
	function btn_back($url=false)
	{
		
		$ci =& get_instance();

		if(!$url){
			$url = 'javascript:window.history.back();';
		}

		echo '
			<a href="'.$url.'"  title="Önceki Sayfa" class="btn btn-gold"  data-toggle="tooltip" data-placement="top">
				<i class="entypo-back"></i>
			</a>
		';

	}
}


if ( ! function_exists('btn_delete'))
{
	function btn_delete($url=false,$id)
	{
		
		$ci =& get_instance();
		$url = trim($url);

		$url = rtrim($url,'/');

		$url = $url.'/';

		echo '
			<a onclick="app.delete(\''.$url.'\','.$id.')" title="Sil" class="btn btn-red" data-toggle="tooltip" data-placement="top">
				<i class="entypo-trash"></i>
			</a>
		';

	}
}


if ( ! function_exists('btn_product_options'))
{
	function btn_product_options($productId=false)
	{
		$ci =& get_instance();

		$productGallery = $ci->commonModel->getProductGalleryCategory($productId);


		if($productGallery){
			btn('gallery/gallery/category/'.$productGallery->galleryId,'Galeri','info','entypo-picture');
		}else{
			
			echo '
				<div class="btn-group text-left">
				<button type="button" class="btn btn-default">Seçenekler</button>
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<i class="entypo-down"></i>
				</button>
				
				<ul class="dropdown-menu dropdown-default" role="menu">
					<li><a href="product/product/createGallery/'.$productId.'"><i class="entypo-right"></i>Fotoğraf Galerisi Oluştur</a></li>
				</ul>
			</div>
			';
		}

	}
}

if ( ! function_exists('btn_page_options'))
{
	function btn_page_options($pageId=false)
	{
		$ci =& get_instance();

		$pageGallery = $ci->commonModel->getPageGalleryCategory($pageId);


		if($pageGallery){
			btn('gallery/gallery/category/'.$pageGallery->galleryId,'Galeri','info','entypo-picture');
		}else{
			
			echo '
				<div class="btn-group text-left">
				<button type="button" class="btn btn-default">Seçenekler</button>
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<i class="entypo-down"></i>
				</button>
				
				<ul class="dropdown-menu dropdown-default" role="menu">
					<li><a href="pages/pages/createGallery/'.$pageId.'"><i class="entypo-right"></i>Fotoğraf Galerisi Oluştur</a></li>
				</ul>
			</div>
			';
		}

	}
}





?>