<!-- Modal  -->
<div class="modal"></div>
<!-- Modal  -->


				<footer class="main">
			
			&copy; <?=date('Y');?> - Yönetim Paneli - <a href=" " target="_blank"> </a>
		
		</footer>
	</div>

	
	
</div>


	<link rel="stylesheet" href="assets/css/font-icons/font-awesome/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	
	<script src="assets/js/jquery.validate.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
	<script src="assets/js/sweetalert.min.js"></script>

	<!-- Notifications Js -->
	<script src="assets/js/toastr.js"></script>

	<script src="assets/js/tocify/jquery.tocify.min.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>

	


	<script src="assets/js/select2/select2.min.js"></script>
	<script src="assets/js/jquery-confirm.min.js"></script>

	<script src="assets/yardimci.js"></script>


	<script>

	

		jQuery(document).ajaxSend(function(event, request, settings) {

			jQuery("input[type=submit]").attr('disabled','disabled');

			show_loading_bar({
				pct: 50,
				delay: 4,
				finish: function(pct)
				{
					show_loading_bar({
						pct: 70,
						delay: 3,
						finish: function(pct)
						{
							show_loading_bar({
								pct: 95,
								delay: 7,
								finish: function(pct)
								{
									show_loading_bar({
										pct: 100,
										delay: 25
									});
								}
							});
						}
					});
				}
			});

		});



		jQuery(document).ajaxComplete(function(event, request, settings) {
		  
		  show_loading_bar({
				pct: 100,
				delay: 0.1
			});

		  jQuery("input[type=submit]").removeAttr('disabled');
		  hide_loading_bar();

		});


		
	</script>




</body>
</html>