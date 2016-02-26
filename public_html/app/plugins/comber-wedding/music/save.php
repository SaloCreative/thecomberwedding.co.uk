<?php
ob_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
// TODO: Add proper wordpress Salt/Nonce check here
if (!empty($_POST['musicNonce']) && !empty($_POST['userId']) && !empty($_POST['userEmail']) && $_POST['musicNonce'] == '12r23tfwegwqt4y36gfu2fg239urt287rbc278vc2bvc7') {
    $wpUser = $_POST['userId'];
    $userEmail = $_POST['userEmail'];
    $todaysDate = time();
    require_once('../database/identifyGuest.php');
    foreach($_POST['song'] as $index => $null) {
        $song = $_POST['song'][$index];
        $artist = $_POST['artist'][$index];
        try {
            $songInsert = 'INSERT INTO music (song, artist, userID, dateAdded) VALUES (?, ?, ?, ?)';
            $insertSong = $ftoDB->prepare($songInsert);
            $insertSong->execute(array($song, $artist, $wpUser, $todaysDate));
            header( 'Location: /music?alert=true&success=save');
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            $ftoDB = null;
        }
    }
} else {
    header( 'Location: /music?alert=true&failed=identify');
}