<?php

// user login form
function comber_login_form() {

    if(!is_user_logged_in()) {

        $output = comber_login_form_fields();
    } else {
        // could show some logged in user info here
        $output = '<p>You are already logged in!</p>';
    }
    return $output;
}
add_shortcode('login_form', 'comber_login_form');


// login form fields
function comber_login_form_fields() {

    ob_start(); ?>

    <?php if(isset($_GET['fail']) && ($_GET['fail'] == 'true')) : ?>
        <small class="error">Your username and password were not recognised, please try again</small>
    <?php endif;
    require_once('username.php'); ?>

    <form id="comber_login_form" class="comber_form" action="" method="post">

        <label for="comber_user_Login">Username</label>
        <input name="comber_user_login" id="comber_user_login" class="required" type="text" value="<?= $username; ?>"/>
        <label for="comber_user_pass">Password</label>
        <input name="comber_user_pass" id="comber_user_pass" class="required" type="password"/>
        <input class="button radius" id="comber_login_submit" type="submit" value="Login"/>
        <p><a class="forgotton-password" href="/forgotten-password">Forgotton Password?</a></p>
        <input type="hidden" name="comber_login_nonce" value="<?php echo wp_create_nonce('comber-login-nonce'); ?>"/>
        <input type="hidden" name="current_page" value="<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>" />

    </form>
    <?php
    return ob_get_clean();
}