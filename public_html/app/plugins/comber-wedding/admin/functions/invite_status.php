<?php
require('app/plugins/comber-wedding/database/connect.php');

try {
    $data = $ftoDB->query('SELECT * FROM wedding WHERE meta_key = "invites_sent" AND meta_value = 1');
    if ($data->rowCount() > 0) {
        $invitesSent = true;
    } else {
        $invitesSent = false;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}