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
		<a href="patient_list.php">Back</a>
		<h1>PATIENT DETAILS</h1>
		<a href="main.php">Home</a>
	</div><!-- /header -->

	<div data-role="content" align="center">
		<br />
		<p>Patient Name</p>
		<br />
		<p>Status 1</p>
		<p>Status 2</p>
		<br />
		<a href="">Basic profile info for the patient</a>
		<br />
		<br />
		<br />
		<p>Patient To Do</p>
		<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<input type="checkbox" name="to_do1" id="to_do1" class="custom" />
				<label for="to_do1">KKKK</label>
				
				<input type="checkbox" name="to_do2" id="to_do2" class="custom" />
				<label for="to_do2">MMMMMMMMM</label>
			</fieldset>
		</div>
		<br />
		<a href="" data-role="button" data-inline="true" data-theme="a" data-corners="false">ADD</a>
		<a href="" data-role="button" data-inline="true" data-theme="a" data-corners="false">REMOVE</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>