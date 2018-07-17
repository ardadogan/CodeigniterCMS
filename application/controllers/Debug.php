<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends MY_Controller {
	

	public function clearHtml()
	{
		
		$text = "Barış Babacacnoğlu Türkçe Karakter<b>Buraya</b> html içeren <i>Bir Yazı</i> Eklensin";

		echo '<hr>';
		echo $text;
		echo '<hr>';
		echo strip_tags($text);


	}



}
