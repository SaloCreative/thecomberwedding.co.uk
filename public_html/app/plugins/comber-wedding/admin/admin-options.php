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
                <?php if($yesCount > 0) {
                    foreach($guestsComing as $guestInd) {
                        echo '
                        <div class="columns medium-4 left">
                            '.$guestInd['name'].' '.$guestInd['surname'].'
                        </div>';
                    }
                } else {
                    echo '<p>No responses yet...</p>';
                }?>
            </div>
            <div class="content" id="panel2">
                <?php if($noCount > 0) {
                    foreach($guestsNotComing as $guestInd) {
                        echo '
                        <div class="columns medium-4 left">
                            '.$guestInd['name'].' '.$guestInd['surname'].'
                        </div>';
                    }
                } else {
                    echo '<p>Everyone is coming so far...</p>';
                }?>
            </div>
            <div class="content" id="panel3">
                <?php if($waitCount > 0) {
                    foreach($guestsInvited as $guestInd) {
                        echo '
                        <div class="columns medium-4 left">
                            '.$guestInd['name'].' '.$guestInd['surname'].'
                        </div>';
                    }
                } else {
                    echo '<p>Everyone has responded...</p>';
                }?>              </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}