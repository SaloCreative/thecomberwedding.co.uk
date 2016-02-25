<?php
// User Request form
function comber_music_form() {

    if(is_user_logged_in()) {
        $output = comber_music_form_build();
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('music_request', 'comber_music_form');

function comber_music_form_build() {
    ob_start();
    ?>
    <div class="music-wrapper">
        <form action="<?= plugins_url();?>/comber-wedding/music/save.php" method="post" data-abide>
            <div class="form-field-insert">
                <div class="row music-insert">
                    <div class="column medium-6">
                        <input type="text" name="song[]" placeholder="Song Name" class="song" required>
                        <small class="error">Enter a song name</small>
                    </div>
                    <div class="column medium-6">
                        <input type="text" name="artist[]" placeholder="Artist" class="artist" required>
                        <small class="error">Enter an artist</small>
                    </div>
                    <span class="remove-row"></span>
                </div>
            </div>
            <span class="add-new-row">Add another</span>
            <?php //Pass user details to save action to crudely verify
            $current_user = wp_get_current_user();
            $userEmail = $current_user->user_login;
            $wpUser = $current_user->ID; ?>
            <input type="hidden" name="userId" value="<?= $wpUser; ?>" />
            <input type="hidden" name="userEmail" value="<?= $userEmail; ?>" />
            <input type="hidden" name="musicNonce" value="<?= '12r23tfwegwqt4y36gfu2fg239urt287rbc278vc2bvc7' ?>" />
            <input type="submit" value="Send Request" class="button"/>
        </form>
    </div>
    <?php
    return ob_get_clean();
}