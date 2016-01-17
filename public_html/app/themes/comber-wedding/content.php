<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_single() ) : 
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	?>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> 	
	<?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
	
	<?php 
		if ( is_single() ) : 
			the_content();
		else:
			the_excerpt();
		endif;
	?>
</article>
