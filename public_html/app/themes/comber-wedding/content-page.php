<?php
/**
 * The default template for displaying content on pages
 *
 * @package 	WordPress
 * @subpackage 	EWD Foundation Theme
 * @since 		1.0
 */
?>

<div class="panel" data-equalizer-watch>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<?php // comments_template( '', true ); ?>
</div>