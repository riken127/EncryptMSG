<?php
//Conexão  à BD
require('../app/lig.conn.php');
$user = $_GET['username'];
$password = $_GET['password'];


	$sql  = "SELECT * FROM 
               users WHERE username= '$user'" ;


	//Execução do comando SQL
	$result=mysqli_query($conn,$sql);
	$nregistos=mysqli_num_rows($result);
	if ($nregistos>0) {
		$user=mysqli_fetch_assoc($result);
 		if (password_verify($password, $user['password'])) {
          	//se sim
          	$bool = "True";
            # redirect 'home.php'
          	echo 1;

          }else {
            //se não
          	$bool = "False";
          	echo 0;
          }
	}else{

		echo 0;
	}
mysqli_close($conn); //fecha conexão
?>

