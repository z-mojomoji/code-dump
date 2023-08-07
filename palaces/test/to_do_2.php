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
		<h1>MY TO-DO</h1>
	</div>

	<div data-role="content" align="center">
		<a href="" data-role="button" data-inline="true" data-theme="a" data-corners="false">ADD</a>
		<a href="" data-role="button" data-inline="true" data-theme="a" data-corners="false">REMOVE</a>
		
		<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<input type="checkbox" name="to_do1" id="to_do1" class="custom" />
				<label for="to_do1">Meds at 10 am</label>
				
				<input type="checkbox" name="to_do2" id="to_do2" class="custom" />
				<label for="to_do2">Doctors at 12 pm</label>
				
				<input type="checkbox" name="to_do3" id="to_do3" class="custom" />
				<label for="to_do3">Physio at 2 pm</label>
				
				<input type="checkbox" name="to_do4" id="to_do4" class="custom" />
				<label for="to_do4">Groceries at 3:30 pm</label>
			</fieldset>
		</div>
		
		<br />
		<br />
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a" data-corners="false">SAVE</a>
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a" data-corners="false">CANCEL</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>