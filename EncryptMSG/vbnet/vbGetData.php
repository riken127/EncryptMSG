<?php
//Conexão  à BD
require('../app/lig.conn.php');
$user = $_GET['username'];

	$sql  = "SELECT * FROM 
               users WHERE username= '$user'" ;


	//Execução do comando SQL
	$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    // output do registo
    while($row = $result->fetch_assoc()) {
        /*echo " <p id="user_id"> " . $row["user_id"]. " </p><br><p id="name"> "
         . $row["name"]. 
        "</p><br><p id="p_p"> " . $row["p_p"]
        "</p><br><p id="last_seen">" . $row["last_seen"]
        "</p>";*/

        /*$useridcat = " id='user_id'";
        $namecat = " id='name'";
        $usernamecat = " id='username'";
        $ppcat = " id='p_p'";
        $lastseencat = " id='last_seen'";
        echo "<p". $useridcat.">". $row["user_id"]."</p>";
        echo "<p". $namecat.">". $row["name"]."</p>";
        echo "<p". $usernamecat.">". $row["username"]."</p>";
        echo "<p". $ppcat.">". $row["p_p"]."</p>";
        echo "<p". $lastseencat.">". $row["last_seen"]."</p>";
*/        echo " ".$row['user_id']. "|" .$row['name']. "|" . $row['username']. "|" . $row['p_p']. "|". $row['last_seen'];
    }
} else {
    echo "0 results";
	}
mysqli_close($conn); //acaba com a conecção com a base de dados
?>

