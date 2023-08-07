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
	    <a href="main.php">Home</a>
		<h1>ADD PATIENT</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">	
		<p align="center">Patient Unique ID</p>
		<label for="patient_id">Name:</label>
		<input type="text" name="patient_id" id="patient_id" value=""  />
		<br />
		<br />
		<a href="" data-role="button" data-inline="true" data-theme="a">ADD</a>
		<a href="patient_list.php" data-role="button" data-inline="true" data-theme="a">Cancel</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>