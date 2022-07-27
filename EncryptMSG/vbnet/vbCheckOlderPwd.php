<?php
require('../app/lig.conn.php');

$username = $_GET['username'];
$password = $_GET['password'];


    $sql = "SELECT *
            FROM users
            WHERE username='$username'";
    $result = mysqli_query($conn, $sql);




    if($result->num_rows == 1)
    {
        while($row = $result->fetch_assoc())
        {
         if (password_verify($password ,$row['password']))
         {
             echo "1";
         }   else {
             echo "0";
         }
    }


    }else {
        echo "0";
    }




?>