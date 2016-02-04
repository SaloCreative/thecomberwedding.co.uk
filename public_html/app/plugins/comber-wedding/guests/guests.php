<?php
require_once('app/plugins/comber-wedding/database/return.php');

$user_ID = get_current_user_id();

try {
    $data = $ftoDB->query('SELECT * FROM guests_group WHERE user_id ='.$user_ID);
    //Check there are orders
    if ($data->rowCount() > 0) {
        $guests = array();
        foreach($data as $guestGroup) {
            $groupName = $guestGroup['name'];
            $groupID = $guestGroup['id'];
            $guestData = $ftoDB->query('SELECT * FROM guests WHERE group_id ='.$groupID);
            if ($guestData->rowCount() > 0) {
                foreach ($guestData as $guest) {
                    array_push($guests, $guest);
                }
            }
        }
    } else {
        $groupName =  'Not Found';
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}