<?php
/*
Plugin Name: The Comber Wedding
Description: plugin to enable all the functionality for our wedding
Plugin URI: http://elementalwebdesign.co.uk/
Author URI: http://elementalwebdesign.co.uk/
Author: Rich Comber
License: Public Domain
Version: 1.1
*/



require_once('login/form.php');
require_once('login/process.php');
require_once('errors/errors.php');
require_once('guests/rsvp.php');
require_once('admin/shortcodes.php');

function isSiteAdmin(){
    $currentUser = wp_get_current_user();
    return in_array('administrator', $currentUser->roles);
}
show_admin_bar(false);