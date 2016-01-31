<?php
/**
 * The template for displaying Author Archive pages
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
			<?php if ( have_posts() ): the_post(); ?>
				<h2>Author Archives: <?php echo get_the_author() ; ?></h2>

				<?php if ( get_the_author_meta( 'description' ) ) :
					echo get_avatar( get_the_author_meta( 'user_email' ) );
					<h3>About <?php echo get_the_author() ; ?></h3>
					<?php the_author_meta( 'description' );
				endif;

				rewind_posts(); while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile; ?>
			<?php else: ?>
				<h1>No posts to display for <?php echo get_the_author() ; ?></h1>
				<?php get_template_part( 'content', 'none' );
			endif; ?>
		</div>
	</div>
	
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
	
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>