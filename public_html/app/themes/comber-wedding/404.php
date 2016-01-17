<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="primary" class="row" data-equalizer>
	<div class="large-9 columns">
      	<div class="panel" data-equalizer-watch>
			<h1>404 Page not found</h1>
			<?php get_template_part( 'content', 'none' );?>
		</div>
	</div>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>