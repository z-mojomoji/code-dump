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
		<h1>PROFILE DETAILS</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">	
		<p align="center">Personal Details</p>
		<br />
		<br />
		<div data-role="fieldcontain">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value=""  />
			<br />
			<br />
			<label for="password1">Password:</label>
			<input type="password" name="password1" id="password1" value=""  />
			<br />
			<br />
			<label for="password2">Confirm-Password:</label>
			<input type="password" name="password2" id="password2" value=""  />
			<br />
			<br />
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" value=""  />
			<br />
			<br />
			<label for="age">Age:</label>
			 <input type="number" name="age" pattern="[0-9]*" min="0" max="100" id="age" value="" placeholder="" />
			<br />
			<br />
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" value=""  />
		</div>
		<br />
		<br />
		<br />
		<a href="index.php" data-role="button" data-inline="true">Back</a>
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a">Save</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>