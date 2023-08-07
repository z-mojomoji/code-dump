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
		<a href="main_2.php">Back</a>
		<h1>MY CARERS</h1>
	</div><!-- /header -->

	<div data-role="content" align="center">
		<br />
		<p>My Unique ID: 123456789</p>
		<br />
		<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<input type="checkbox" name="carer1" id="carer1" class="custom" />
				<label for="carer1">Default Carer</label>
				
				<input type="checkbox" name="carer2" id="carer2" class="custom" />
				<label for="carer2">Second Carer</label>
				
				<input type="checkbox" name="carer3" id="carer3" class="custom" />
				<label for="carer3">Third Carer</label>
			</fieldset>
		</div>
		
		<a href="main_2.php" data-role="button" data-inline="true" data-theme="a" data-corners="false">OK</a>
		<a href="" data-role="button" data-inline="true" data-theme="a" data-corners="false">Set Default</a>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>