<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<!--<script type="text/javascript" sre="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {
	
	var wi = $('body').width();
	
	$('body').mousemove(function(event){
		
		var MouseX = event.clientX; //no clientX //pageY
		var wiper = (((MouseX*100)/wi)/25)-15;
		$('#mbg1').css({left:wiper+'%'},1000);
		$('#mbg2').css({right:wiper+'%'},1000);
		
	});
	
	mpup1();
	
	$('.btnohide').live('click',function(){
		$('#boxmoretour').animate({height:'24px'},500);
		$('.btnontour').addClass('btnoshow').removeClass('btnohide');
		$('#calentour').animate({height:'240px'},500);
		$('.btnontour').text('ดูบรรยากาศ On Tour ทั้งหมด');
	});
	
	$('.btnoshow').live('click',function(){
		$('#boxmoretour').animate({height:'230px'},500);
		$('.btnontour').addClass('btnohide').removeClass('btnoshow');
		$('#calentour').animate({height:'0px'},500);
		$('.btnontour').text('ซ่อนรายการทั้งหมด');
	});
	
});


	function mpup1(){
		$('#mbg1').animate({top:'15px'},1000);
		$('#mbg2').animate({top:'0px'},800);
		//mpdown1();
		setTimeout(mpdown1,100);
	}
	function mpdown1(){
		$('#mbg1').animate({top:'0px'},1000);
		$('#mbg2').animate({top:'15px'},800);
		setTimeout(mpup1,100);
	}
	

	
	

</script>
</head>

<body id="<?=$jpage;?>">
<div id="hbar1"></div>
<div id="head">
	<div id="boxhead">
    	<div id="logo"><a href="index.php"><img src="/jamsai/image/logo1.png" /></a></div>
        <div id="toon"><img src="/jamsai/image/catoon1.png" /></div>
        
        <div id="mbg1"></div>
    	<div id="mbg2"></div>
      </div>
      
<?
if($jpage!='view'){
	include('menu.php');
}
?>
      
    </div>
<div id="wrapper">