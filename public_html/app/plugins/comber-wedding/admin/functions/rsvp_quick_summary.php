<?php
// RSVP Quick summary
function comber_rsvp_summary_build() {
    ob_start();
    require('guest_summary.php'); ?>
    <div class="container">
        <div class="panel">
            <h3>RSVP Summary</h3>
            <p><strong><?= $yesCount; ?></strong>/<?= $totalGuests ;?><br><span>Attending</span></p>
            <p><strong><?= $noCount; ?></strong>/<?= $totalGuests ;?><br><span>Not Attending</span></p>
            <p><strong><?= $waitCount; ?></strong>/<?= $totalGuests ;?><br><span>Awaiting Response</span></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}