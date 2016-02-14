<?php

// Admin summary
function comber_admin_summary_build() {
    ob_start();
    require('guest_summary.php'); ?>
    <div class="container">
        <h2>The Comber Wedding</h2>
        <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#panel1">Attending <em>(<?= $yesCount; ?>)</em></a></li>
            <li class="tab-title"><a href="#panel2">Not Attending <em>(<?= $noCount; ?>)</em></a></li>
            <li class="tab-title"><a href="#panel3">Awaiting Response <em>(<?= $waitCount; ?>)</em></a></li>
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