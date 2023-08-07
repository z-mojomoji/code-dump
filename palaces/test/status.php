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
	
	$("#statusPage").live('pageinit',function() {
        var u = getCookie("click2");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});

	$("#statusPage").live('pageload',function() {
        var u = getCookie("click2");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
	$("#statusPage").bind('pageinit',function() {
        var u = getCookie("click2");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
	$("#statusPage").bind('pageload',function() {
		var u = getCookie("click2");
		$(u).buttonMarkup({ theme: 'b' }).button('refresh');
	});
	
</script>

<body> 

<div data-role="page" id="statusPage">

	<div data-role="header">
		<h1>I AM ...</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">
		<br />
		<form data-ajax="false" action="status_con.php" method="post">
			<input id="status1" name="status1" type="submit" value="SLEEPING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status2" name="status2" type="submit" value="CATERING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status3" name="status3" type="submit" value="WATCHING TV" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status4" name="status4" type="submit" value="SHOWERING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status5" name="status5" type="submit" value="EXERCISING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status6" name="status6" type="submit" value="HAVING TEA" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status7" name="status7" type="submit" value="AT THE DOC" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status8" name="status8" type="submit" value="AT A FRIEND'S" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status9" name="status9" type="submit" value="SHOPPING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status10" name="status10" type="submit" value="GARDENING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status11" name="status11" type="submit" value="COOKING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
			<input id="status12" name="status12" type="submit" value="KNITTING" data-inline="true" data-corners="false" data-mini="true" data-icon="star" />
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