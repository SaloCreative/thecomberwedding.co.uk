<?php
ob_start();
// TODO: Add proper wordpress Salt/Nonce check here
if (!empty($_POST['inviteNonce']) && !empty($_POST['userId']) && !empty($_POST['userEmail']) && $_POST['inviteNonce'] == '12r23tu2erwhyetr863546g87%*&%^£fg239urt287rbc278vc2bvc7') {
    $wpUser = $_POST['userId'];
    $userEmail = $_POST['userEmail'];
    //Validate user
    require_once('../database/identifyGuest.php');
    //generate list to mail to
    require_once('invite/guestList.php');
    foreach($guests as $guest) {
        $groupId = $guest[0];
        $email = $guest[1];
        $names = $guest[3];
        $authToken = $guest[2];
        //include email and send stuff
        require('invite/sendEmail.php');
        //mark guest as invited in DB
        require('invite/inviteGuestSent.php');
    }
    //Mark in DB that all invites are sent
    require('invite/invitesSent.php');
    //return success
    //header( 'Location: /admin-area?alert=true&success=invites');
}
else {
    header( 'Location: /admin-area?alert=true&failed=identify');
}