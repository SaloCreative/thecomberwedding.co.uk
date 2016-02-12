<?php
require_once('app/plugins/comber-wedding/database/connect.php');

try {
    $data = $ftoDB->query('SELECT * FROM guests ORDER BY surname ASC');
    //Check for all guests
    $totalGuests = $data->rowCount();
    $guestsComing = array();
    $guestsNotComing = array();
    $guestsInvited = array();
    if ($data->rowCount() > 0) {
        foreach($data as $guest) {
            $rsvp = $guest['rsvp'];
            if($rsvp == 1) {
                array_push($guestsComing, $guest);
            } else if($rsvp == 2) {
                array_push($guestsNotComing, $guest);
            } else {
                array_push($guestsInvited, $guest);
            }
        }
    } else {
        $totalGuests =  'No guests Yet!';
    }
    $yesCount = count($guestsComing);
    $noCount = count($guestsNotComing);
    $waitCount = count($guestsInvited);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}