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
		showConfirmErr('���Ѻ�����ŵ͹��� ' . $currentChapter .' ���º��������','<a href="index.php" target="_self" title="�͡�ҡ�к�">��Ѻ˹���á</a>');
	}else{
		showConfirmErr('�Դ��ͼԴ��Ҵ ��س��ͧ�����ա���� !! ');
	}
?>