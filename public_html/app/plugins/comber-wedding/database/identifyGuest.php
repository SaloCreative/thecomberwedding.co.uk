<?php
require_once('connect.php');
//Check user can save

try {
    //Check user ID exists and matches email
    $data = $ftoDB->query('SELECT * FROM wp_users WHERE ID = '.$wpUser.' AND user_login = "'.$userEmail.'"');
    if ($data->rowCount() > 0) {
    } else {
        header( 'Location: /?alert=true&failed=identify');
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}
