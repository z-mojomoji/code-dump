<?php
	if ($_POST['status1']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "SLEEPING", time()+3600);
		setcookie("click2", "", time()-3600);
		setcookie("click2", "#status1", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status2']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "CATERING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status2", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status3']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "WATCHING TV", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status3", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status4']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "SHOWERING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status4", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status5']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "EXERCISING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status5", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status6']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "HAVING TEA", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status6", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status7']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "AT THE DOC", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status7", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status8']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "AT A FRIEND'S", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status8", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status9']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "SHOPPING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status9", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status10']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "GARDENING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status10", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status11']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "COOKING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status11", time()+3600);
		header('Location: status.php');
	}
	else if ($_POST['status12']) {
		setcookie("status", "", time()-3600);
		setcookie("status", "KNITTING", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#status12", time()+3600);
		header('Location: status.php');
	}

?>