<?php
require_once('app/plugins/comber-wedding/database/connect.php');

try {
    $data = $ftoDB->query('SELECT * FROM guests');
    //Check for all guests
    $totalGuests = $data->rowCount();
    $guestsComing = array();
    $guestsNotComing = array();
    $guestsInvited = array();
    if ($data->rowCount() > 0) {
        foreach($data as $guest) {
            $rsvp = $guest['rsvp'];
            $guestID = $guest['id'][0];
            if($rsvp == 1) {
                array_push($guestsComing, $guestID);
            } else if($rsvp == 2) {
                array_push($guestsNotComing, $guestID);
            } else {
                array_push($guestsInvited, $guestID);
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