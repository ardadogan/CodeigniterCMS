<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
				
	}
	

	public function contact()
	{
		$formData = $this->input->post();

		$this->mailLibrary->checkRequire($formData,'name,email,message','İsim,E-Posta,Mesaj');

		$html = '

			<table>
				<tr>
					<td>İsim Soyisim</td>
					<td>:</td>
					<td>'.$formData['name'].'</td>
				</tr>
				<tr>
					<td>Telefon</td>
					<td>:</td>
					<td>'.$formData['phone'].'</td>
				</tr>
				<tr>
					<td>E-Posta Adresi</td>
					<td>:</td>
					<td>'.$formData['email'].'</td>
				</tr>
				<tr>
					<td>Konu</td>
					<td>:</td>
					<td>'.$formData['subject'].'</td>
				</tr>
				<tr>
					<td>Mesaj</td>
					<td>:</td>
					<td>'.$formData['message'].'</td>
				</tr>

				<tr> <td colspan="3">----------</td> </tr>
				<tr>
					<td>Tarih</td>
					<td>:</td>
					<td>'.date('d.m.Y H:i').' <small>(Sunucu saati yerel saat ile farklılık gösterebilir)</small></td>
				</tr>
				<tr>
					<td>Gönderildiği Adres</td>
					<td>:</td>
					<td><a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER['HTTP_REFERER'].'</a></td>
				</tr>

			</table>

		';

		$config = array(
			'html' => $html,
			'to_mail' 	=> 'baris.babacanoglu@analitikreklam.com',
			'to_name' 	=> 'Barış Babacanoğlu',
			'subject' 	=> 'İletişim Formu',
			'from_name' => 'Websitesi İletişim Formu'
			);

		$this->mailLibrary->send($config);

	}



}
