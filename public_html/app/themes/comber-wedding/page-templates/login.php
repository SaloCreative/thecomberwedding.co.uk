<?php
/**
 * Template Name: Login Page
 *
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */

if(is_user_logged_in()) { header( 'Location: '.home_url() ); die(); }

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header') );
    $background = '';
    $featured_image ='<img src="'.get_stylesheet_directory_uri().'/images/main-header.jpg" />';
    if (has_post_thumbnail( $post->ID ) ):
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
    $background = 'style="background-image: url('.$image.')"';
    $featured_image = '<img src="'.$image.'" />';
    endif;?>
    <div id="body-wrapper" class="row">
    <div id="masthead" data-equalizer>
        <div class="medium-8 columns intro-image">
            <div class="panel" data-equalizer-watch>
                <?= $featured_image; ?>
                <div class="header-wrapper">
                    <p class="intro">Welcome to...</p>
                    <h1>The Comber Wedding!</h1>
                </div>
            </div>
        </div>
        <div class="medium-4 columns">
            <div class="panel" data-equalizer-watch>
                <?php
                if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>

                <?php endwhile; ?>
            </div>
        </div>
    </div>




<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>