<?php

if (isset($_POST['fromid']) &&
    isset($_POST['toid']) &&
    isset($_POST['message']) &&
    isset($_POST['opened']))

    {
        include '../app/db.conn.php';
        include '../app/crypto.php';


        $fromid = $_POST['fromid'];
        $toid = $_POST['toid'];
        $message = $_POST['message'];
        $opened = $_POST['opened'];
        $encrypted_message = encryptthis($message, $key);
        
        $sql = "INSERT INTO
                chats (from_id, to_id, message)
                VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$fromid, $toid, $encrypted_message]);


    }else {
        echo "0";
    }

?>