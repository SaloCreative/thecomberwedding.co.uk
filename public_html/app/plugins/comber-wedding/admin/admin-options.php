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
        <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#panel1">Attending (<?= $yesCount; ?>)</a></li>
            <li class="tab-title"><a href="#panel2">Not Attending (<?= $noCount; ?>)</a></li>
            <li class="tab-title"><a href="#panel3">Awaiting Response (<?= $waitCount; ?>)</a></li>
        </ul>
        <div class="tabs-content">
            <div class="content active" id="panel1">
                <p>This is the first panel of the basic tab example. You can place all sorts of content here including a grid.</p>
            </div>
            <div class="content" id="panel2">
                <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
            </div>
            <div class="content" id="panel3">
                <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}