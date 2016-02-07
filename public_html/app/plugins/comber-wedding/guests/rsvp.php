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
    include('app/plugins/comber-wedding/guests/menu-trans.php');
    ?>
        <div class="rsvp-wrapper">
            <h2><?= $groupName; ?></h2><a class="button small" href="#" data-reveal-id="myMenu">View Menu</a>
            <div class="guests row">
                <?php if($groupResponse == 1) {
                    require_once('rsvp-summary.php'); ?>
                    <div id="myRSVP" class="reveal-modal" data-reveal aria-labelledby="RSVP" aria-hidden="true" role="dialog">
                        <h2 id="modalTitle">Change RSVP/Menu Choices</h2>
                        <p class="lead">You can change your meal choices up until 2 weeks prior to the wedding.</p>
                        <?php require_once('rsvp-form.php'); ?>
                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    </div>
                <?php
                } else {
                    require_once('rsvp-form.php');
                }?>
            </div>

        </div>
        <?php require_once('menu.php'); ?>
    <?php
    // Get User group and return name
    // Get Users and check if RSVP'd
    return ob_get_clean();
}