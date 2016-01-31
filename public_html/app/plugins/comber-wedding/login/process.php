<?php
ob_start();
// logs a member in after submitting a form
function comber_login_guest() {

    if(isset($_POST['comber_user_login']) && wp_verify_nonce($_POST['comber_login_nonce'], 'comber-login-nonce')) {

        // this returns the user ID and other info from the user name
        $user = get_userdatabylogin($_POST['comber_user_login']);

        if(!$user) {
            // if the user name doesn't exist
            comber_errors()->add('empty_username', __('Invalid username'));
        }

        if(!isset($_POST['comber_user_pass']) || $_POST['comber_user_pass'] == '') {
            // if no password was entered
            comber_errors()->add('empty_password', __('Please enter a password'));
        }

        // check the user's login with their password
        if(!wp_check_password($_POST['comber_user_pass'], $user->user_pass, $user->ID)) {
            // if the password is incorrect for the specified user
            comber_errors()->add('empty_password', __('Incorrect password'));
        }

        // retrieve all error messages
        $errors = comber_errors()->get_error_messages();

        // only log the user in if there are no errors
        if(empty($errors)) {

            wp_setcookie($_POST['comber_user_login'], $_POST['comber_user_pass'], true);
            wp_set_current_user($user->ID, $_POST['comber_user_login']);
            do_action('wp_login', $_POST['comber_user_login']);

            wp_redirect(home_url($_POST['current_page'])); exit;
        } else {
            wp_redirect(home_url($_POST['current_page'].'/?login=true&fail=true')); exit;
        }
    }
}
add_action('init', 'comber_login_guest');