<?php

$conf = array();

# Site Config
	$conf['domain'] 	= 'sitelitik.com';
	$conf['template'] 	= 'default';


# Product & Category Image Options
	$conf['product_image'] 					= true;
	$conf['product_image_required'] 		= false;
	$conf['product_image_width'] 			= '800';
	$conf['product_image_height'] 			= '450';
	$conf['product_image_method'] 			= 'fill'; // fill: Doldur | fit: Sığdır | expand: Genişlet | none: Boyutlandırma
	
	$conf['product_category_image'] 			= true;
	$conf['product_category_image_required'] 	= false;
	$conf['product_category_image_width'] 		= '800';
	$conf['product_category_image_height'] 		= '450';
	$conf['product_category_image_method'] 		= 'fill'; // fill: Doldur | fit: Sığdır | expand: Genişlet | none: Boyutlandırma


# General Configs
	# Yönetim panelinden dil ekleyebilme özelliği
	$conf['language_addability'] = true;


# SMTP Mail Configuration
	$conf['smtp'] = array(
		'smtp_host' => 'smtp.yandex.com.tr',
		'smtp_port' => 465,
		'smtp_ssl' 	=> 'ssl',
		'smtp_user' => 'info@servistabagi.com',
		'smtp_pass' => 'AN20122014',
		'from_mail' => 'info@servistabagi.com',
		'from_name' => 'Sitemburada Noreply',
		'to_mail' 	=> 'baris.babacanoglu@analitikreklam.com',
		'to_name' 	=> 'Barış Babacanoğlu',
		'subject' 	=> 'Standart Mail Başlığı'
		/**
		 * -----------------------------------------------------------------------------------
		 * AÇIKLAMALAR
		 * 
		 * @param smtp_host		Mail sunucusu
		 * @param smtp_port		Smtp portu
		 * @param smtp_ssl 		SSL İsteyen durumlarda. Değerler:  ssl | false
		 * @param smtp_user 	Kullanılan kaynak mail adrsi
		 * @param smtp_pass 	Kullanılan kaynak mail şifresi
		 * @param from_mail 	Maili gönderen eposta adresi
		 * @param from_name 	Maili gönderen isim
		 * @param to_mail 		Maillerin standart gönderileceği eposta adresi
		 * @param to_name 		Maillerin standart gönderileceği kişi adı
		 * @param subject 		Başlık belirtilmediğinde standart olarak yazacak başlık
		 * 
		 */
		);




# Ayarları okumak için tüm yapılandırmaları system'e ata
$config['system'] = $conf;
