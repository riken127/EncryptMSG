<?php
if (isset($_POST['username']))
    {
        $username = $_POST['username'];

        include '../app/db.conn.php';

        $sql = "SELECT *
                FROM users 
                WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if ($stmt->rowCount() == 0)
        {
            echo "0";
        }else {
            echo "1";
        }

    }else {
        echo "1";
    }





?>