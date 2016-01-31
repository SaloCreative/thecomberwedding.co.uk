<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */

$background = '';
if (has_post_thumbnail( $post->ID ) ):
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    $background = 'style="background-image: url('.$image.')"';
endif;

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

    <section id="primary">
        <div class="large-12 columns">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div class="panel">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>