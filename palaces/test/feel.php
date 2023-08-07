<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head> 
	<title>Care Aware</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
</head>

<script type="text/javascript">
	
	function getCookie(c_name) {
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++) {
			x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
			y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
			x=x.replace(/^\s+|\s+$/g,"");
			if (x==c_name) {
				return unescape(y);
			}
		}	
	}
	
	$("#feelPage").live('pageinit',function() {
        var u = getCookie("click");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});

	$("#feelPage").live('pageload',function() {
        var u = getCookie("click");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
	$("#feelPage").bind('pageinit',function() {
        var u = getCookie("click");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
	$("#feelPage").bind('pageload',function() {
		var u = getCookie("click");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
</script>

<body> 

<div data-role="page" id="feelPage">

	<div data-role="header">
		<h1>I FEEL ...</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">
		<br />
		<form data-ajax="false" action="feel_con.php" method="post">
			<input id="mood1" name="mood1" type="submit" value="HAPPY" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood2" name="mood2" type="submit" value="SAD" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood3" name="mood3" type="submit" value="CRANKY" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood4" name="mood4" type="submit" value="SLEEPY" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood5" name="mood5" type="submit" value="UNWELL" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood6" name="mood6" type="submit" value="UPSET" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood7" name="mood7" type="submit" value="WORRIED" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood8" name="mood8" type="submit" value="HUNGRY" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood9" name="mood9" type="submit" value="TIRED" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood10" name="mood10" type="submit" value="HOT" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood11" name="mood11" type="submit" value="COLD" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="mood12" name="mood12" type="submit" value="EXCITED" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
		</form>
		<br />
		<br />
		<br />
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a" data-corners="false">OK</a>
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a" data-corners="false">CANCEL</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>