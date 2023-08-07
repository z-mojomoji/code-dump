<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://www.dek-d.com/resource/js/jquery-latest.min.js"></script>
<style>
body{padding:0; margin:0; font-family:Tahoma; font-size:12px;}
#wrapper{ width:550px; margin:auto; padding:15px}
#jslist20{width:860px; margin:auto; font-family:Tahoma;}
.liststory{border-bottom:1px solid #CCCCCC; padding:20px 0; width:550px;}
.liststory.failed {opacity: 0.3;}
.jstory{width:100%; float:left;}
.jstory img{ float:left; margin-right:10px;}
.jstory p{padding:0; margin:0; color:#656565; margin-left:80px; font-size:12px; margin-bottom:5px;}
.jstory p.upstory{font-size:12px; display:block; height:25px; line-height:25px; padding-left:25px; margin-bottom:0; background:url(image/icon_barj.gif) no-repeat left}
.jstory p.noup{color:#FF0000; background-position: left -25px;}
.jstory p.yesup{color:#00CC33; background-position: left 0px;}
.jstory p b{display:block; font-size:16px; color:#f05776;}
.jstory p span{color:#CCCCCC; font-size:11px;}

.jvote{float:right; width:470px; float:left; margin-left:80px; margin-top:15px;}
.jvote b{font-size:24px; font-weight:bold; display:inline-block; margin-left:15px; color:#cd1d41; width:70px}
a.btn-jvote{display:inline-block; height:40px; line-height:40px; text-align:center; font-size:20px; font-weight:bold; cursor:pointer; background: url(image/bg_btnj.gif) repeat-x top #f05776; color:#FFFFFF; border-bottom:2px solid #c83c59; width:210px; margin-left:10px;}
a.btn-jvote:hover{margin-top:2px; border-bottom:none;}

a.jvoted{background:url(image/bg_btnj2.gif) repeat-x #cccccc; margin-top:2px; border-bottom:none;cursor: default;}

.jper{background:url(image/bg_barj.gif) no-repeat; width:137px; height:16px; padding:1px 8px 0 9px; margin-bottom:20px; display:inline-block;}
.jper img{width:0%; height:15px;}
.clear{clear:both;}
#parttitle{display:none;}
</style>

</head>

<body>
<div id="wrapper">
<?
include('countdown.php');
include('list20.php');
?>
</div>
</body>
</html>
