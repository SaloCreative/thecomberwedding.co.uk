<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="primary" class="row blog-listing" data-equalizer>
	<div class="large-9 columns">
      	<div class="panel" data-equalizer-watch>
			
			<?php if ( have_posts() ): ?>

				<?php if ( is_day() ) : ?>
					<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
				<?php elseif ( is_month() ) : ?>
					<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
				<?php elseif ( is_year() ) : ?>
					<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>								
				<?php else : ?>
					<h1>Archive</h2>	
				<?php endif;

				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
			else: ?>
				<h1>No posts to display</h1>	
				<?php get_template_part( 'content', 'none' );
			endif; ?>
		</div>
	</div>
	
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>