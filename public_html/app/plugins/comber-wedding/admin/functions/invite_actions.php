<?php
// Invite actions
function comber_invite_action_build() {
    ob_start();
    require('invite_status.php'); ?>
    <div class="container">
        <div class="panel">
            <h3>Admin actions</h3>
            <?php if($invitesSent) : ?>
                <p><strong>Invites sent:</strong> <?= $invite_date; ?></p>
            <?php else : ?>
                <a class="button" href="#" data-reveal-id="myInvites">Send Invites</a>
                <?php require('invite_form.php'); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}