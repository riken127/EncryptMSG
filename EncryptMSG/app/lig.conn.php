<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'chat_app_db';
$porta=3306;

$conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $porta);
if (mysqli_connect_errno()) {    
    echo "Erro na ligação à base de dados.";
    exit();
}
mysqli_set_charset ( $conn , "utf8" );
?>