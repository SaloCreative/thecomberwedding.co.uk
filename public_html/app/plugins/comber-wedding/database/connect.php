<?php
require('database.php');

try {
    $ftoDB = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
    $ftoDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessages;
    $ftoDB = null;
}