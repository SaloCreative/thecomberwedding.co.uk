<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="primary" class="row blog-page" data-equalizer>
	<div class="large-9 columns">
      	<div class="panel" data-equalizer-watch>
			<?php if ( have_posts() ) : ?>
				<h1>Search Results for: <?php echo get_search_query(); ?></h1>	
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
				else : ?>
				<h1>No results found for: <?php echo get_search_query(); ?></h1>	
				<?php
					get_template_part( 'content', 'none' );
				endif;
			?>
		</div>
	</div>
	
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
	
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>