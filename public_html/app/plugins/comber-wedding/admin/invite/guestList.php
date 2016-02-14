<?php
try {
    $data = $ftoDB->query('SELECT * FROM guests_group WHERE id = 1');
    //Check there are guests
    if ($data->rowCount() > 0) {
        $guests = array();
        foreach($data as $guestGroup) {
            $groupedGuests = array();
            array_push($groupedGuests, $guestGroup['id'], $guestGroup['email']);
            $guestData = $ftoDB->query('SELECT * FROM guests WHERE group_id ='.$guestGroup['id']);
            if ($guestData->rowCount() > 0) {
                $groupedGuestsInd = array();
                foreach ($guestData as $indGuest) {
                    $name = $indGuest['name'];
                    array_push($groupedGuestsInd, $name);
                }
                array_push($groupedGuests,$groupedGuestsInd );
            }
            array_push($guests, $groupedGuests );
        }
    } else {
        header( 'Location: /admin-area?alert=true&failed=noguestinvite');
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}