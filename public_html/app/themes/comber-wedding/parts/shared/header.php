<?php if(!is_user_logged_in()) { header( 'Location: '.home_url('/login') ); die(); }
$background = '';
$featured_image ='';
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
            </div>
        </div>
        <div class="medium-4 columns">
            <div class="panel" data-equalizer-watch>
                <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/nav') ); ?>
            </div>
        </div>
    </div>