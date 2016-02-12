<?php
require_once('../database/return.php');
ob_start();
try {
    $data = $ftoDB->query('SELECT * FROM guests_group ORDER BY name ASC');
    //Check there are orders
    if ($data->rowCount() > 0) {
        foreach($data as $guest) {
            echo 'Guest'.$guest['name'].'<br>';
        }
    } else {
        echo 'No Guests found';
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}