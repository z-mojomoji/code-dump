<?php
include_once('jamsai.inc.php');

$url = jamsaiDoVote(true);
	$_title='เรียบร้อย!';
	$_msg = '<span class="f-m-pin" style=" font-size:24px">เราได้รับคะแนนของคุณแล้ว<br /><br /><input name="backstep1" type="button" id="step1" value="ปิด" onclick="window.close();"></span>';
	include('message_popup.php');