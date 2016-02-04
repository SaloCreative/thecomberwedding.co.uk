<?php
// User RSVP form
function comber_rsvp_form() {

if(is_user_logged_in()) {
        $output = comber_rsvp_form_build();
} else {
    // could show some logged in user info here
    $output = '<p>You need to log in!</p>';
}
return $output;
}
add_shortcode('rsvp_widget', 'comber_rsvp_form');

// RSVP form fields
function comber_rsvp_form_build() {
    ob_start();
    require_once('guests.php');

    ?>
        <div class="rsvp-wrapper">
            <h2><?= $groupName; ?></h2>
            <?php
                foreach ($guests as $guest) {
                    $name = $guest['name'];
                    $rsvp = $guest['rsvp'];
                    $starter = $guest['starter'];
                    $main = $guest['main'];
                    $dessert = $guest['dessert']; ?>
            <?php }
            ?>

        </div>
    <?php
    // Get User group and return name
    // Get Users and check if RSVP'd
    return ob_get_clean();
}