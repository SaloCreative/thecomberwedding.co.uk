<?php
// Admin Are dashboard
function comber_admin_dash() {

    if(is_user_logged_in()) {
        if (isSiteAdmin() ) {
            $output = comber_admin_options_build();
        } else {
            $output = '<p>You are not an administrator!</p>';
        }
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('admin_options', 'comber_admin_dash');

// RSVP form fields
function comber_admin_options_build() {
    ob_start();
    echo 'Admin Panel';
}