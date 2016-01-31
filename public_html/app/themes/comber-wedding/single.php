<?php
/**
 * The Template for displaying all single posts
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

<div id="primary" class="row blog-page" data-equalizer>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="large-9 columns">
      	<div class="panel" data-equalizer-watch>
			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php /* if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h3>About <?php echo get_the_author() ; ?></h3>
			<?php the_author_meta( 'description' ); ?>
			<?php endif; ?>

			<?php //comments_template( '', true );*/ ?>
		</div>
	</div>
<?php endwhile; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>