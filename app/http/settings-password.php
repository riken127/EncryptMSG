<?php
if (isset($_POST['password']) && isset($_POST['confPassword']))
{
    include '../db.conn.php';

    $password = $_POST['password'];
    $confPassword = $_POST['confPassword'];
    $userid = $_POST['userID'];
    $username = $_POST['currentUsername'];


    if (empty($password))
    {
        $error = "É necessário preencher o campo palavra-passe!";

        header("Location: ../../settings.php?Error=$error");
        exit;
    }else if(empty($confPassword))
    {
        $error = "É necessário preencher o campo confirmar palavra-passe!";

        header("Location: ../../settings.php?Error=$error");
        exit;
    }
    
    if($password == $confPassword)
    {

    $sql = "SELECT * FROM users WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userid]);

    if($stmt->rowCount() > 0)
    {

    $user = $stmt->fetch();
    if(password_verify($password, $user['password']))
    {
        $error = "A nova palavra-passe não pode ser igual á antiga!";

        header("Location: ../../settings.php?Error=$error");
        exit;
        
    }else {
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users
                SET password=?
                WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$hashedpwd, $userid]);
        
    session_start();

    session_unset();
    session_destroy();
    $Success = "A sua palavra-passe foi alterada com sucesso";
    header("Location: ../../index.php?success=$Success");
    exit;
    }

    }
}else {
    $error = "As palavra-passes não coincidem!";
        
    header("Location: ../../settings.php?Error=$error");
    exit;
}



}
?>