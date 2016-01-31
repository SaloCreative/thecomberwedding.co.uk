<?php if(!is_user_logged_in()) { header( 'Location: '.home_url('/login') ); die(); } ?>
<div id="body-wrapper" class="row">
    <div id="masthead">
        <div class="large-6 medium-6 columns">
            <a class="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/nav') ); ?>
        </div>
    </div>