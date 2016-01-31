<?php
// used for tracking error messages
function comber_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function comber_show_error_messages() {
    if($codes = comber_errors()->get_error_codes()) {
        echo '<div class="comber_errors">';
        // Loop error codes and display errors
        foreach($codes as $code){
            $message = comber_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        echo '</div>';
    }
}