<?php
	if ($_POST['mood1']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "HAPPY", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood1", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood2']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "SAD", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood2", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood3']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "CRANKY", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood3", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood4']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "SLEEPY", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood4", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood5']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "UNWELL", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood5", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood6']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "UPSET", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood6", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood7']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "WORRIED", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood7", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood8']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "HUNGRY", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood8", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood9']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "TIRED", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood9", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood10']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "HOT", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood10", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood11']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "COLD", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood11", time()+3600);
		header('Location: feel.php');
	}
	else if ($_POST['mood12']) {
		setcookie("feel", "", time()-3600);
		setcookie("feel", "EXCITED", time()+3600);
		setcookie("click", "", time()-3600);
		setcookie("click", "#mood12", time()+3600);
		header('Location: feel.php');
	}

?>


