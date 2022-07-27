<?php
if (isset($_POST['username']) &&
    isset($_POST['name']) &&
    isset($_POST['password']) &&
    isset($_POST['pp']))
    {
        include '../app/db.conn.php';
        
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $pp = $_POST['pp'];
        echo $pp;
        $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users
                    (name, username, password, p_p)
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $password, $pp]);
    }else {
        echo "0";
    }











?>