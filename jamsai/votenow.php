<?php
include_once('jamsai.inc.php');

$url = jamsaiDoVote();	
	$_msg = '<span class="f-m-pin" style=" font-size:24px">เราได้รับคะแนนของคุณแล้ว<br /><br /><a href="' . $url . '" target="_self" title="กลับไปอ่านต่อ">กลับไปอ่านต่อ</a></span>';
	include('message.php');