<?php
require_once('app/plugins/comber-wedding/database/return.php');

$user_ID = get_current_user_id();

try {
    $data = $ftoDB->query('SELECT * FROM guests_group WHERE user_id ='.$user_ID);
    //Check there are orders
    if ($data->rowCount() > 0) {
        foreach($data as $guestGroup) {
            $groupName = $guestGroup['name'];
            $groupID = $guestGroup['id'];
        }
    } else {
        $groupName =  'Not Found';
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}