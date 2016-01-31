<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

    <div id="primary" class="row" data-equalizer>
        <div class="large-12 columns">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post();
                get_template_part( 'content', 'page' );
            endwhile;
            ?>
        </div>
    </div>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>