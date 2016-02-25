<?php
// Return requests
function comber_music_feed() {

    if(is_user_logged_in()) {
        $output = comber_music_feed_build();
    } else {
        // could show some logged in user info here
        $output = '<p>You need to log in!</p>';
    }
    return $output;
}
add_shortcode('music_request_feed', 'comber_music_feed');

function comber_music_feed_build() {
    ob_start();
    require_once('feedBuild.php');
    ?>
    <h2>Latest Requests</h2>
    <div class="request-feed">
        <?php if(count($songs) > 0) {
            foreach($songs as $request) {
                echo '<p>'.$request['song'].' - '.$request['artist'].'</p>';
            }
        } else {
            echo '<p>No songs yet!</p>';
        }?>
    </div>

    <?php return ob_get_clean();
}
