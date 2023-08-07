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
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>LOGIN PAGE</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">	
		<p align="center">Login Form:</p>
		<br />
		<br />
		<div data-role="fieldcontain">
		<form data-ajax="false" action="login_validator.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value=""  />
			<br />
			<br />
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" value="" />
			<br />
			<br />
			<br />
			<input id="submit" name="submit" type="submit" value="Log in" data-role="button" data-inline="true" data-corners="true" />
			<a href="index.php" id="sign" name="sign" data-role="button" data-inline="true" data-corners="true" data-theme="a">Sign up</a>
		</form>
		</div>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>