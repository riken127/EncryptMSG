<?php
/*
if (isset($_GET['username'])
	&& isset($_GET['newUsername']))
	{
*/
		include '../app/db.conn.php';
		include '../app/helpers/user.php';

		$username = $_GET['username'];
		$newUsername = $_GET['newUsername'];
		$user = getUser($username, $conn);


		$user_id = $user['user_id'];

		$sql = "UPDATE users
				SET username=?
				WHERE user_id=?";

		$stmt = $conn->prepare($sql);
		$stmt->execute([$newUsername, $user_id]);
		echo "1";
/*
	}else
{
	echo "0";
}
*/
?>