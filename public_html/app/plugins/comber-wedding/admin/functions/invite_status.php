<?php
require('app/plugins/comber-wedding/database/connect.php');

try {
    $data = $ftoDB->query('SELECT * FROM wedding WHERE meta_key = "invites_sent" AND meta_value = 1');
    if ($data->rowCount() > 0) {
        $invitesSent = true;
        foreach($data as $invite) {
            $invite_date_unix = $invite['timestamp'];
            $invite_date = date('jS M Y - G:i:s', $invite_date_unix);
        }
    } else {
        $invitesSent = false;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}