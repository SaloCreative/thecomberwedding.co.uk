<div id="myInvites" class="reveal-modal" data-reveal aria-labelledby="Invites" aria-hidden="true" role="dialog">
    <h2 id="modalTitle">Send out invites</h2>
    <p>Please check the guest list below is correct</p>
    <form action="<?= get_home_url(); ?>/app/plugins/comber-wedding/admin/invite_send.php" method="post">
        <?php
        //Pass user details to save action to crudely verify
        $current_user = wp_get_current_user();
        $userEmail = $current_user->user_login;
        $wpUser = $current_user->ID; ?>
        <input type="hidden" name="userId" value="<?= $wpUser; ?>" />
        <input type="hidden" name="userEmail" value="<?= $userEmail; ?>" />

        <!-- TODO: Add proper wordpress Salt here -->
        <input type="hidden" name="inviteNonce" value="<?= '12r23tu2erwhyetr863546g87%*&%^£fg239urt287rbc278vc2bvc7' ?>" />
        <input type="submit" class="button" value="Send Invites" />
    </form>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>