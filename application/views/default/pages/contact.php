
<div class="container contact-page">
	<div class="row">
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d391768.35544666176!2d32.4825666418305!3d39.90356621864717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d347d520732db1%3A0xbdc57b0c0842b8d!2sAnkara%2C+T%C3%BCrkiye!5e0!3m2!1str!2s!4v1481011702529" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen></iframe>
		</div>
	</div>
	<div class="row">
		<form method="post" id="data_form" action="<?=base_url($lng.'/mail/contact/')?>" onsubmit="return false; send_form('data_form')" >
		<div class="col-md-6 contact-form">
			<h4>Bize Ulaşın</h4>

			<div class="row">
				<div class="col-md-6">
					<input type="text" name="name" class="form-control" placeholder="<?=_r("İsim Soyisim");?>">
				</div>
				<div class="col-md-6">
					<input type="text" name="phone" class="form-control" placeholder="<?=_r("Telefon No");?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="email" class="form-control" placeholder="<?=_r("E-Posta Adresi");?>">
				</div>
				<div class="col-md-6">
					<input type="text" name="subject" class="form-control" placeholder="<?=_r("Konu");?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea class="form-control" name="message" id="" placeholder="<?=_r("Mesajınız");?>"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="submit" onclick="send_form('data_form')" value="<?=_r('Gönder');?>">
				</div>
			</div>

		</div>
		<div class="col-md-6 contact-info">
			<h4>İletişim Bilgilerimiz</h4>
			

			<ul>
			<?php

				$bilgiler = get_contact_info();

				foreach ($bilgiler as $key => $value) {
					echo '
						<li> <strong>'.$value['name'].' :</strong> '.$value['value'].'</li>
					';
				}
			?>
			</ul>

		</div>
	</div>
</div>


<script>

	function send_form(form_id){

		// Form Bilgilerini Topla
		var form = $('#'+form_id);

		var formdata = false;
		if (window.FormData){
			formdata = new FormData(form[0]);
		}
		var formAction = form.attr('action');

		// Form Post
		$.ajax({
			url         : formAction,
			data        : formdata ? formdata : form.serialize(),
			cache       : false,
			contentType : false,
			processData : false,
			type        : 'POST',
			success     : function(data, textStatus, jqXHR){
				
				

			},
			error: function(data, textStatus, jqXHR){

				

			},
		});


	}

</script>