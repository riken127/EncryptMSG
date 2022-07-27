<?php
//Conexão  à BD
require('../app/lig.conn.php');
$user_id = $_GET['user_id'];

	$sql1  = "SELECT user_1,user_2 FROM 
               conversations
               WHERE 
               user_1 = '$user_id' OR user_2 = '$user_id'" ;


	//Execução do comando SQL
	$result1=mysqli_query($conn,$sql1);

if ($result1->num_rows > 0) {

    while($row1 = mysqli_fetch_assoc($result1)) {

			if ($row1['user_1']!= $user_id){

				$sql2 = "SELECT * FROM users
				WHERE user_id =".$row1['user_1'];
				$result2=mysqli_query($conn, $sql2);

				if ($result2->num_rows >= 1) {
					while ($row2 = $result2->fetch_assoc()) {
					echo $row2['user_id']. "|".$row2['name']. "|". $row2['username']. "|".$row2['p_p']. "|" .$row2['last_seen']. "&";
					}
				}
			}else{
			//echo " ".$row2['user_2'];

				$sql3 = "SELECT * FROM users
				WHERE user_id =".$row1['user_2'];
 
				$result3=mysqli_query($conn, $sql3);

				if ($result3->num_rows >=1) {
					while ($row3 = $result3->fetch_assoc()) {
					echo $row3['user_id']. "|".$row3['name']. "|". $row3['username']. "|".$row3['p_p']. "|" .$row3['last_seen']. "&";  }
				}
      	}
        	//echo " ".$row['user_1']. " | " .$row['user_2'];
    }
} else {
    echo "0 results";
	}
mysqli_close($conn); //acaba com a conecção com a base de dados
?>


