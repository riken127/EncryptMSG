<?php
require('../app/lig.conn.php');
$user_id1 = $_GET['user_id1'];
$user_id2 = $_GET['user_id2'];

    $sql = "SELECT *
            FROM conversations
            WHERE user_1= '$user_id1' AND user_2 = '$user_id2' 
            OR user_1 = '$user_id2' AND user_2 = '$user_id1'";


	$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{

    while($row = $result->fetch_assoc()) {
        
        	echo "1";
      	}
        	//echo " ".$row['user_1']. " | " .$row['user_2'];
    }else {
    echo "0";
	}
mysqli_close($conn); //acaba com a conecção com a base de dados


?>