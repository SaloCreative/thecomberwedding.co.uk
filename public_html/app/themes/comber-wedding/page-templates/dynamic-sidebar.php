<?php
/**
 * Template Name: Default (Sidebar)
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

    <section id="primary" data-equalizer>
        <div class="large-8 columns">
            <?php
            if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div class="panel" data-equalizer-watch>
                    <?php the_content(); ?>
                    <form action="<?= plugins_url();?>/comber-wedding/gallery/upload.php" class="dropzone" id="myWeddingGallery">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                        <?php //Pass user details to save action to crudely verify
                        $current_user = wp_get_current_user();
                        $userEmail = $current_user->user_login;
                        $wpUser = $current_user->ID; ?>
                        <input type="hidden" name="userId" value="<?= $wpUser; ?>" />
                        <input type="hidden" name="userEmail" value="<?= $userEmail; ?>" />
                        <input type="hidden" name="galleryNonce" value="12r23tfwegwqt4yefew1^$@36gfu2fg239urt287rbc278vc2bvc7" />
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="large-4 columns">
            <div class="panel" data-equalizer-watch>
                <? the_field('sidebar'); ?>
            </div>
        </div>
    </section>



<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>