<?php
/**
 * Template Name: Login Page
 *
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */

if(is_user_logged_in()) { header( 'Location: '.home_url() ); die(); }

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header') ); ?>

    <div id="primary" class="row" data-equalizer>
        <div class="large-12 columns">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div class="panel">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>