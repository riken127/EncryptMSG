<?php
if (isset($_POST['username']))
{
   include '../db.conn.php';
   
    $username = $_POST['username'];
    $currentUsername = $_POST['currentUsername'];
    $user_id = $_POST['userID'];
   if (empty($username))
   {
       $usernameEm = "É necessário escrever um nome";

       header("Location: ../../settings.php?Error=$usernameEm");
       exit;
   }else {
       
    $sql = "SELECT * FROM
            users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if($stmt->rowCount() > 0)
    {
        $usernameEm = "($username) não se encontra disponível";

        header("Location: ../../settings.php?Error=$usernameEm");
        exit;
    }else if($username == $currentUsername)
    {
        $usernameEm = "($username) é o nome de utilizador atual";

        header("Location: ../../settings.php?Error=$usernameEm");
        exit;
    }else {
        $sql = "UPDATE users
                SET username=?
                WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $user_id]);


    session_start();

    session_unset();
    session_destroy();
$usernameSuccess = "O seu nome foi alterado para $username com sucesso!";
header("Location: ../../index.php?success=$usernameSuccess");
exit;
    }
   }

}


?>