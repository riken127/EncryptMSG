<?php
//Conexão  à BD
require('../app/lig.conn.php');
$user_id = $_GET['user_id'];
$from_id = $_GET['from_id'];

	$sql  = "SELECT * FROM 
               chats WHERE from_id = '$user_id'";


	//Execução do comando SQL
	$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "".$row['chat_id']. "|" .$row['message']. "|" .$row['to_id']. "|";
				$sql2 = "SELECT * FROM users
				WHERE user_id =".$row['to_id'];
				$result2=mysqli_query($conn, $sql2);

				if ($result2->num_rows >= 1) {
					while ($row2 = $result2->fetch_assoc()) {
					echo $row2['username'] ."&<br>";
					}
				}
					
					
    }
} else {
    echo "0 results";
	}
mysqli_close($conn); //acaba com a conecção com a base de dados
?>

