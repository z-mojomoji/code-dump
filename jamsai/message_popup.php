<?php
if (!isset($_title)){
	$_title=$_GET['title'];
	$_msg = '<span class="f-m-pin" style=" font-size:24px">' . $_GET['msg'] . '</span>';
	$_msg .='<br /><input name="backstep1" type="button" id="step1" value="ปิด" onclick="window.close();">';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="
"><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>นักเขียนหน้าใส ปี 6</title>

<link rel="stylesheet" type="text/css" href="/2011toolbar/toolbar.min.css">
<link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/resource/css/11dekdhome.min.css">
<link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/resource/css/2010pagetab.css">
<link rel="stylesheet" type="text/css" href="/08dekd.css">
<link rel="stylesheet" type="text/css" href="stylejs1.css">
<link rel="stylesheet" type="text/css" href="listlasttopic.css">
<script type="text/javascript" src="http://www.dek-d.com/resource/js/jquery-latest.min.js"></script>

<style>
#popupbox h1 {
margin: 0;
padding: 0;
color: #FF0000;
padding-top: 50px;
}

#popupbox p {
font-size: 18px;
margin: 0;
padding: 0;
}
</style>
</head>

<body id="message_popup" style="
    text-align: center;
    padding: 10px;
    margin-top: -20px;
">
<div id="popupbox">
<h1 style="text-align: center;"><?=$_title;?></h1>
<p><?=$_msg;?></p>
</div>
</body></html>
<!--html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>นักเขียนหน้าใส ปี 6</title>

<link rel="stylesheet" type="text/css" href="/2011toolbar/toolbar.min.css" />
<link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/resource/css/11dekdhome.min.css" />
<link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/resource/css/2010pagetab.css" />
<link rel="stylesheet" type="text/css" href="/08dekd.css" />
<link rel="stylesheet" type="text/css" href="stylejs1.css">
<link rel="stylesheet" type="text/css" href="listlasttopic.css">
<script type="text/javascript" src="http://www.dek-d.com/resource/js/jquery-latest.min.js"></script>

<style>
#popupbox h1 {
margin: 0;
padding: 0;
color: #FF0000;
padding-top: 50px;
}

#popupbox p {
font-size: 18px;
margin: 0;
padding: 0;
}
</style>
</head>

<body id="home">
<div id="popupbox">
<h1><?=$_title;?></h1>
<p><?=$_msg;?></p>
</div>

</body>
</html-->