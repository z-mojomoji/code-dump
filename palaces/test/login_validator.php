<?php
	
	if ($_POST['username'] == "ahmed" && $_POST['password'] == "1212") {
		header('Location: main.php');
	}
	else if ($_POST['username'] == "MJ" && $_POST['password'] == "1212") {
		header('Location: main_2.php');
	}
	else {
		header('Location: login.php');
	}

?>


