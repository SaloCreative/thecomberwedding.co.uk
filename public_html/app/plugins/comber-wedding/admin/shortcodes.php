<?php

// Admin Area main Summary
function comber_admin_summary() {

    if(is_user_logged_in()) {
        if (isSiteAdmin() ) {
            $output = comber_admin_summary_build();
        } else {
            $output = '<p>You are not an administrator!</p>';
        }
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('admin_guest_summary', 'comber_admin_summary');

// Invite Status / Action
function comber_invite_action() {

    if(is_user_logged_in()) {
        if (isSiteAdmin() ) {
            $output = '<p>Invite action/status!</p>';
        } else {
            $output = '<p>You are not an administrator!</p>';
        }
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('admin_invite_action', 'comber_invite_action');

// RSVP Summary
function comber_rsvp_summary() {

    if(is_user_logged_in()) {
        if (isSiteAdmin() ) {
            $output = '<p>RSVP summary!</p>';
        } else {
            $output = '<p>You are not an administrator!</p>';
        }
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('admin_rsvp_status', 'comber_rsvp_summary');



//Include the functions required by shortcodes

require_once('functions/guest_full_summary.php');