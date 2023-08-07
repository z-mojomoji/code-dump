<?
	$pageStat = 'jamsai_y5_postComment';
	include_once('jamsai.inc.php');
	include_once('/webroot/www/main/myLib/board.inc.php');
	include_once('/webroot/www/main/myLib/stdlib.inc.php');
	include_once('/webroot/www/main/myLib/authenticate.php');
	
	jamsaiAddComment();	
	$_msg = '<span class="f-m-pin" style=" font-size:30px">เราได้รับข้อความของคุณแล้ว<br /><a href="view.php?id=' . $_POST['refer_id'] . '" target="_self" title="กลับไปดูข้อความ">กลับไปดูข้อความ</a></span>';
	include('message.php');
?>