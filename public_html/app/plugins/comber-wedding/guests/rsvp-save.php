<?php
ob_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
// TODO: Add proper wordpress Salt/Nonce check here
if (!empty($_POST['rsvpNonce']) && !empty($_POST['userId']) && !empty($_POST['userEmail']) && $_POST['rsvpNonce'] == '12r23tu2fg239urt287rbc278vc2bvc7') {
    $wpUser = $_POST['userId'];
    $userEmail = $_POST['userEmail'];
    require_once('../database/identifyGuest.php');
    foreach($_POST['guestId'] as $index => $null) {
        $guest = $_POST['guestId'][$index];
        $rsvp = $_POST['rsvp'][$index];
        $starter = $_POST['starter'][$index];
        $main = $_POST['main'][$index];
        $dessert = $_POST['dessert'][$index];
        echo $guest.'<br>'.$rsvp.'<br>'.$starter.'<br>'.$main.'<br>'.$dessert.'<br><br>';
        // TODO: Ensure this user can respond for this guest
        try {
            $rsvpInsert = 'UPDATE guests SET rsvp = '.$rsvp.', starter = '.$starter.', main = '.$main.', dessert = '.$dessert.' WHERE id = '.$guest;
            $insertRSVP = $ftoDB->prepare($rsvpInsert);
            $insertRSVP->execute();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            $ftoDB = null;
        }
    }
}
else {
    header( 'Location: /rsvp?alert=true&failed=identify');
}
var_dump($_POST);