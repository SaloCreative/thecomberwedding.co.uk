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
            <h2><?= $groupName; ?></h2><a class="button small" href="#" data-reveal-id="myMenu">View Menu</a>
            <div class="guests row">
                <form id="rsvp-guests" action="<?= get_home_url(); ?>/app/plugins/comber-wedding/guests/rsvp-save.php" method="post">
                <?php
                    $rsvpStatus = array('0' => 'Not Responded...', '1' => 'Attending', '2' => 'Not Attending');
                    foreach ($guests as $guest) {
                        $name = $guest['name'];
                        $rsvp = $guest['rsvp'];
                        $starter = $guest['starter'];
                        $main = $guest['main'];
                        $dessert = $guest['dessert'];
                        $guestID = $guest['id']; ?>
                        <div class="guest">
                            <div class="columns medium-3">
                                <?= $name; ?>
                                <input name="guestId[]" value="<?= $guestID; ?>" />
                            </div>
                            <div class="columns medium-3">
                                <select name="rsvp[]" required>
                                    <option value=""><?= $rsvpStatus['0']; ?></option>
                                    <option value="1" <?= ($rsvp === '1') ? 'selected' : '';?>><?= $rsvpStatus['1']; ?></option>
                                    <option value="2" <?= ($rsvp === '2') ? 'selected' : '';?>><?= $rsvpStatus['2']; ?></option>
                                </select>
                            </div>
                            <div class="columns medium-6">
                                <div class="row">
                                    <div class="columns small-4">
                                        <select name="starter[]" required>
                                            <option value="">Select a starter...</option>
                                            <option value="1" <?= ($starter === '1') ? 'selected' : '';?>>Starter 1</option>
                                            <option value="2" <?= ($starter === '2') ? 'selected' : '';?>>Starter 2</option>
                                            <option value="3" <?= ($starter === '3') ? 'selected' : '';?>>Starter 3</option>
                                        </select>
                                    </div>
                                    <div class="columns small-4">
                                        <select name="main[]" required>
                                            <option value="">Select a main...</option>
                                            <option value="1" <?= ($main === '1') ? 'selected' : '';?>>Starter 1</option>
                                            <option value="2" <?= ($main === '2') ? 'selected' : '';?>>Starter 2</option>
                                            <option value="3" <?= ($main === '3') ? 'selected' : '';?>>Starter 3</option>
                                        </select>
                                    </div>
                                    <div class="columns small-4">
                                        <select name="dessert[]" required>
                                            <option value="">Select a dessert...</option>
                                            <option value="1" <?= ($dessert === '1') ? 'selected' : '';?>>Starter 1</option>
                                            <option value="2" <?= ($dessert === '2') ? 'selected' : '';?>>Starter 2</option>
                                            <option value="3" <?= ($dessert === '3') ? 'selected' : '';?>>Starter 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                    //Pass user details to save action to crudely verify
                    $current_user = wp_get_current_user();
                    $userEmail = $current_user->user_login;
                    $wpUser = $current_user->ID; ?>
                    <input name="userId" value="<?= $wpUser; ?>" />
                    <input name="userEmail" value="<?= $userEmail; ?>" />

                    <!-- TODO: Add proper wordpress Salt here -->
                    <input name="rsvpNonce" value="<?= '12r23tu2fg239urt287rbc278vc2bvc7' ?>" />
                    <input type="submit" class="button" value="RSVP" />
                </form>
            </div>

        </div>
        <?php require_once('menu.php'); ?>
    <?php
    // Get User group and return name
    // Get Users and check if RSVP'd
    return ob_get_clean();
}