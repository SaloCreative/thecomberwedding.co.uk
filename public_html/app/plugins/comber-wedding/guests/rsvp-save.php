<?php
ob_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
if (!empty($_POST['rsvpNonce']) && !empty($_POST['userId']) && $_POST['rsvpNonce'] == '12r23tu2fg239urt287rbc278vc2bvc7') {
    require_once('../database/connect.php');
    $wpUser = $_POST['userId'];
    echo 'succeed';
}
else {
    echo 'fail';
}
var_dump($_POST);