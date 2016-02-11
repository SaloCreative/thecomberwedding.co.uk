<?php
/**
 * Template Name: Admin pages
 *
 * @package WordPress
 * @subpackage comberwedding
 * @since 1.0
 */
if (!isSiteAdmin() ){ header( 'Location: '.home_url() ); die(); }
Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header-admin' ) ); ?>

    <section id="primary">
        <div class="medium-8 columns">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div class="panel">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="medium-4 columns">
            <div class="panel">
               <h3>Admin area</h3>
                <hr>
                <?= do_shortcode('[invite_status]'); ?>
            </div>
        </div>
    </section>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>