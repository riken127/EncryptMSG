<?php
require('../app/lig.conn.php');
$username = $_GET['username'];

    $sql = "SELECT user_id
            FROM users
            WHERE   username = '$username'";


	$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{

    while($row = $result->fetch_assoc()) {
        
        	echo $row['user_id'];
      	}
        	//echo " ".$row['user_1']. " | " .$row['user_2'];
    }else {
    echo "0";
	}
mysqli_close($conn); //acaba com a conecção com a base de dados


?>