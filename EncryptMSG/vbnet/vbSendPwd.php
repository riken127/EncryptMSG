<?php

include '../app/db.conn.php';
include '../app/helpers/user.php';

    $username = $_GET['username'];
    $password = $_GET['password'];
    $user = getUser($username, $conn);


    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $user_id = $user['user_id'];
        $sql_2 = "UPDATE users
                  SET password=?
                  WHERE user_id=?";

        $stmt = $conn->prepare($sql_2);
        $stmt->execute([$hashedPwd, $user_id]);
        


?>