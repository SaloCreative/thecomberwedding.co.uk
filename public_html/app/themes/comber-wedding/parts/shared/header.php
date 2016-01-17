<div id="masthead" class="medium-hide-custom">
	<div class="row">
		<div class="large-6 medium-6 columns">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
		<div class="large-6 medium-6 columns">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/nav') ); ?>