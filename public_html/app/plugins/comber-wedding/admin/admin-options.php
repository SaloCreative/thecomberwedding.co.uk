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

// Admin summary
function comber_admin_options_build() {
    ob_start();
    require_once('summary.php'); ?>
    <div class="container">
        <h2>Total Invited <em><?= $totalGuests ;?></em></h2>
        <li>Attending(<?= $yesCount; ?>)</li>
        <li>Not Attending(<?= $noCount; ?>)</li>
        <li>Invited(<?= $waitCount; ?>)</li>
    </div>
    <?php
    return ob_get_clean();
}