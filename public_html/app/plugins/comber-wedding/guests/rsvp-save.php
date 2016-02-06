<?php
ob_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
// TODO: Add proper wordpress Salt/Nonce check here
if (!empty($_POST['rsvpNonce']) && !empty($_POST['userId']) && !empty($_POST['userEmail']) && $_POST['rsvpNonce'] == '12r23tu2fg239urt287rbc278vc2bvc7') {
    echo 'post valid<br>';
    $wpUser = $_POST['userId'];
    $userEmail = $_POST['userEmail'];
    require_once('../database/saveRSVP.php');
}
else {
    echo 'fail';
}
var_dump($_POST);