<?php
require('../app/lig.conn.php');
require('../app/crypto.php');


$user_id = $_GET['user_id'];
$friend_id = $_GET['friend_id'];

    $sql1 = "SELECT from_id, to_id, message, created_at
    FROM chats
    WHERE from_id = '$user_id' AND to_id = '$friend_id'
    OR from_id = '$friend_id' AND to_id = '$user_id'";

    $result1 = mysqli_query($conn, $sql1);

    
if ($result1->num_rows > 0)
{
    while($row1 = $result1->fetch_assoc())
    {
    //echo $row1['from_id'] . "|". $row1['message']. "&";
    $sql2 = "SELECT username, p_p, user_id 
    FROM users
    WHERE user_id =". $row1['from_id'];
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0)
    {
        while($row2 = $result2->fetch_assoc())
        {
        echo $row2['user_id']. "|".$row2['username'] . "|". decryptthis($row1['message'], $key). "|".$row1['created_at']. "|".$row2['p_p']."&";
        }

    }

    }
} else {
    echo "0";
}
    

?>