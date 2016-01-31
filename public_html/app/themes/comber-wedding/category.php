<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>
<?php header( 'Location: '.home_url() ); die(); ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="primary" class="row blog-listing" data-equalizer>
	<div class="large-9 columns">
      	<div class="panel" data-equalizer-watch>
			<?php if ( have_posts() ): ?>
				<h1>Category Archive: <?php echo single_cat_title( '', false ); ?></h1>
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile; ?>
			<?php else: ?>
				<h1>No posts to display in <?php echo single_cat_title( '', false ); ?></h1>
				<?php get_template_part( 'content', 'none' );
			endif; ?>
		</div>
	</div>
	
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>