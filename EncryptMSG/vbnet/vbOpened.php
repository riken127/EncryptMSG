<?php
if (isset($_POST['user_id']) &&
    isset($_POST['friend_id']))
    {
        include '../app/db.conn.php';
        
        $userid = $_POST['user_id'];
        $friendid = $_POST['friend_id'];
        $opened = "1";
        $sql = "UPDATE chats
                set opened=?
                WHERE from_id =? AND to_id =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$opened, $friendid, $userid]);
    }else {
        echo "0";
    }

?>