<form id="rsvp-guests" action="<?= get_home_url(); ?>/app/plugins/comber-wedding/guests/rsvp-save.php" method="post">
    <?php
    foreach ($guests as $guest) {
        $name = $guest['name'];
        $surname = $guest['surname'];
        $rsvp = $guest['rsvp'];
        $starter = $guest['starter'];
        $main = $guest['main'];
        $dessert = $guest['dessert'];
        $guestID = $guest['id']; ?>
        <div class="guest">
            <div class="columns medium-3">
                <?= $name.' '.$surname; ?>
                <input type="hidden" name="guestId[]" value="<?= $guestID; ?>" />
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
                            <option value="1" <?= ($starter === '1') ? 'selected' : '';?>><?= $transStarter['1']; ?></option>
                            <option value="2" <?= ($starter === '2') ? 'selected' : '';?>><?= $transStarter['2']; ?></option>
                            <option value="3" <?= ($starter === '3') ? 'selected' : '';?>><?= $transStarter['3']; ?></option>
                        </select>
                    </div>
                    <div class="columns small-4">
                        <select name="main[]" required>
                            <option value="">Select a main...</option>
                            <option value="1" <?= ($main === '1') ? 'selected' : '';?>><?= $transMain['1']; ?></option>
                            <option value="2" <?= ($main === '2') ? 'selected' : '';?>><?= $transMain['2']; ?></option>
                            <option value="3" <?= ($main === '3') ? 'selected' : '';?>><?= $transMain['3']; ?></option>
                        </select>
                    </div>
                    <div class="columns small-4">
                        <select name="dessert[]" required>
                            <option value="">Select a dessert...</option>
                            <option value="1" <?= ($dessert === '1') ? 'selected' : '';?>><?= $transDessert['1']; ?></option>
                            <option value="2" <?= ($dessert === '2') ? 'selected' : '';?>><?= $transDessert['2']; ?></option>
                            <option value="3" <?= ($dessert === '3') ? 'selected' : '';?>><?= $transDessert['3']; ?></option>
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
    <div class="columns large-12">
        <input type="hidden" name="userId" value="<?= $wpUser; ?>" />
        <input type="hidden" name="userEmail" value="<?= $userEmail; ?>" />

        <!-- TODO: Add proper wordpress Salt here -->
        <input type="hidden" name="rsvpNonce" value="<?= '12r23tu2fg239urt287rbc278vc2bvc7' ?>" />
        <input type="submit" class="button" value="RSVP" />
    </div>
</form>