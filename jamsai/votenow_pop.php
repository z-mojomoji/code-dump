<?php
include_once('jamsai.inc.php');

$url = jamsaiDoVote(true);
	$_title='���º����!';
	$_msg = '<span class="f-m-pin" style=" font-size:24px">������Ѻ��ṹ�ͧ�س����<br /><br /><input name="backstep1" type="button" id="step1" value="�Դ" onclick="window.close();"></span>';
	include('message_popup.php');