<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="primary" class="row" data-equalizer>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="large-9 columns">
		<?php get_template_part( 'content', 'page' ); ?>
      	
	</div>
	<?php endwhile; ?>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
	
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>