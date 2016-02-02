<?php if(!is_user_logged_in()) { header( 'Location: '.home_url('/login') ); die(); } ?>
<div id="body-wrapper" class="row">
    <div id="masthead" data-equalizer>
        <div class="medium-8 columns intro-image">
            <div class="panel" data-equalizer-watch style="background-image: url(<?= $background; ?>);">
            </div>
        </div>
        <div class="medium-4 columns">
            <div class="panel" data-equalizer-watch>
                <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/nav') ); ?>
            </div>
        </div>
    </div>