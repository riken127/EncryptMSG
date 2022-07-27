<?php
if (isset($_POST['username']) &&
    isset($_POST['name']) &&
    isset($_POST['password']))
{


    include '../app/db.conn.php';

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users
                (name, username, password)
                VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $username, $password]);

}

?>