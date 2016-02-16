<?php
try {
    $isSent = $ftoDB->query('SELECT * FROM wedding WHERE meta_key = "invites_sent"');
    $todaysDate = time();
    $key = 'invites_sent';
    if ($isSent->rowCount() > 0) {
        $markSent = 'UPDATE wedding SET meta_value = 1, timestamp = '.$todaysDate.' WHERE meta_key = "'.$key.'"';
        $sentMark = $ftoDB->prepare($markSent);
        $sentMark->execute();
    } else {
        $markSent = 'INSERT INTO wedding (meta_value, meta_key, timestamp) VALUES (?, ?, ?)';
        $sentMark = $ftoDB->prepare($markSent);
        $sentMark->execute(array(1, $key, $todaysDate));
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    $ftoDB = null;
}

