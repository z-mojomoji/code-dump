<?php
include_once('jamsai.inc.php');

$url = jamsaiDoVote();	
	$_msg = '<span class="f-m-pin" style=" font-size:24px">������Ѻ��ṹ�ͧ�س����<br /><br /><a href="' . $url . '" target="_self" title="��Ѻ���ҹ���">��Ѻ���ҹ���</a></span>';
	include('message.php');