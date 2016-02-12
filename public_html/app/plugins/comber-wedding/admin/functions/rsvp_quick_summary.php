<?php
// RSVP Quick summary
function comber_rsvp_summary_build() {
    ob_start();
    require('guest_summary.php'); ?>
    <div class="container">
        <h2>The Comber Wedding <em><?= $totalGuests ;?> invited</em></h2>
        <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#panel1">Attending <em>(<?= $yesCount; ?>)</em></a></li>
            <li class="tab-title"><a href="#panel2">Not Attending <em>(<?= $noCount; ?>)</em></a></li>
            <li class="tab-title"><a href="#panel3">Awaiting Response <em>(<?= $waitCount; ?>)</em></a></li>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}