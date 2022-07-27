<?php

if (isset($_POST['pp'])
    && isset($_POST['userid']))
    {
        
        $pp = $_POST['pp'];
        $userid = $_POST['userid'];

        include '../app/db.conn.php';

        $sql = "UPDATE users
                SET p_p=?
                WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pp, $userid]);
        echo "1";
    }else {
        echo "0";
    }

?>