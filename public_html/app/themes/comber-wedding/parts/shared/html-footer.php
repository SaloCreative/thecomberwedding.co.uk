
	<?php wp_footer(); ?>

	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/libraries/jquery-1.9.1.min.js"></script><![endif]-->
	<!--[if (gte IE 9) | (!IE)]><!-->
	<script src="<?php echo get_template_directory_uri(); ?>/js/libraries/jquery-2.1.4.min.js"></script>
	<!--<![endif]-->
	<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.min.js"></script>
	<script>
		$(document).foundation();
	</script>

	<!--[if lt IE 9]>
		<div class="browsehappy">
			<p> You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<span class="close">X</span>
		</div>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie8.js"></script>
	<![endif]-->
	</body>
</html>