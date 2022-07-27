<?php 
include("..\crypto.php");
session_start();

# verificar se o utilizador está logado
if (isset($_SESSION['username'])) {

	if (isset($_POST['message']) &&
        isset($_POST['to_id'])) {
	

	include '../db.conn.php';

	# guardar mensagens do pedido xhr em variaveis
	$message = $_POST['message'];
	$to_id = $_POST['to_id'];

	# receber o id do utilizador através da sessions
	$from_id = $_SESSION['user_id'];
	
	/**
	 * Encryptação
	 *
	 */
	$encrypted_message = encryptthis($message, $key);
	 //echo $encrypted_message;
	$sql = "INSERT INTO 
	       chats (from_id, to_id, message) 
	       VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$res  = $stmt->execute([$from_id, $to_id, $encrypted_message]);
    
    # se a mensagem for inserida
    if ($res) {
    	/**
       verificar se é a primeira mensagem entre os dois
       **/
       $sql2 = "SELECT * FROM conversations
               WHERE (user_1=? AND user_2=?)
               OR    (user_2=? AND user_1=?)";
       $stmt2 = $conn->prepare($sql2);
	   $stmt2->execute([$from_id, $to_id, $from_id, $to_id]);

		// verificar a localizção da mensagem 
		define('TIMEZONE', 'Europe/Lisbon');
		date_default_timezone_set(TIMEZONE);

		$time = date("h:i:s a");

		if ($stmt2->rowCount() == 0 ) {
			# inserir na tabela conversations
			$sql3 = "INSERT INTO 
			         conversations(user_1, user_2)
			         VALUES (?,?)";
			$stmt3 = $conn->prepare($sql3); 
			$stmt3->execute([$from_id, $to_id]);
		}
		?>

		<p class="rtext align-self-end
		          border rounded p-2 mb-1">
		    <?=$message?>  
		    <small class="d-block"><?=$time?></small>      	
		</p>

    <?php 
     }
  }
}else {
	header("Location: ../../index.php");
	exit;
}