<div class="contact-page">
	<div class="container">
		<div class="row">

			<?php

				$contactGroups = get_contact_category();

				foreach ($contactGroups as $gkey => $gval) {
					
				$maps = array(
					'1' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d391768.35544666176!2d32.4825666418305!3d39.90356621864717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d347d520732db1%3A0xbdc57b0c0842b8d!2sAnkara%2C+T%C3%BCrkiye!5e0!3m2!1str!2s!4v1481011702529',
					
					'2' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385398.5898741358!2d28.731987906032746!3d41.0049822710558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVsLCBUw7xya2l5ZQ!5e0!3m2!1str!2s!4v1481171598559'
					);

			?>

				<div class="col-md-4">
					<h4><?=$gval->name;?></h4>
					<iframe src="<?=$maps[$gval->categoryId];?>" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen></iframe>

					<div class="contact-info">
						<ul>
						<?php

							$bilgiler = get_contact_info($gval->categoryId);

							foreach ($bilgiler as $key => $value) {
								echo '
									<li> <strong>'.$value['name'].' :</strong> '.$value['value'].'</li>
								';
							}
						?>
						</ul>

					</div>

				</div>
			<?php } ?>
		</div>
	</div>
</div>