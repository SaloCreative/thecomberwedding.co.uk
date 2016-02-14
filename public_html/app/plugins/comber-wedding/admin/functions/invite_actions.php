<?php
// Invite actions
function comber_invite_action_build() {
    ob_start();
    require('invite_status.php'); ?>
    <div class="container">
        <div class="panel">
            <h3>Admin actions</h3>
            <?php if($invitesSent) : ?>
                Invites sent!!
            <?php else : ?>
                <a class="button" href="#">Send Invites</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}