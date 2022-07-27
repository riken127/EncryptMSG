<?php
	if (isSet($_POST['message'])) {
		echo $_POST['message']; //Should be 'hello'
	}else
		echo 'No key with the method of POST (key, "message") was found!';
?>