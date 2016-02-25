<?php
require_once('app/plugins/comber-wedding/database/connect.php');
try {
    $data = $ftoDB->query('SELECT * FROM music ORDER BY dateAdded DESC limit 10');
    //Check there are songs
    $songs = array();
    if ($data->rowCount() > 0) {
        foreach($data as $song) {
            array_push($songs, $song);
        }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}