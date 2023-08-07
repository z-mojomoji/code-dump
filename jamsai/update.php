<?
	include_once('jamsai.inc.php');
	$pageStat = 'jamsai_y6_addchapter_done';
	$hasSession = array_key_exists('jamsai2013', $_SESSION);
	if( ! $hasSession ) header("Location: /jamsai/");

	checkLogin();
	if (!$isGod)
	checkSendClose();
	$story_id = checkCandidate();
	
	if( addChapter( $story_id ) ){
		unset($_SESSION['jamsai2013']);	
		showConfirmErr('ได้รับข้อมูลตอนที่ ' . $currentChapter .' เรียบร้อยแล้ว','<a href="index.php" target="_self" title="ออกจากระบบ">กลับหน้าแรก</a>');
	}else{
		showConfirmErr('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !! ');
	}
?>