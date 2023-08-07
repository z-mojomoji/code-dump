<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>.::Palace Jewelry::.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Your name" />
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<link rel="shortcut icon" 
		href="../favicon.ico"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css' />
		    <!-- Font Awesome Included -->
        <link href="css/font-awesome.css" rel="stylesheet">
	</head>
	<body>
		
		<div id="staging">
				
		<?php
            include('home.php');
        ?>
        
		</div>
        <script>
            $(document).ready(function(){
                
                var click;
                
                $(".home-menu li a").click(function(){
                    var p = $(this).attr('p-num');
                    
                    //p = click;
                    console.log('run');
                    
                    console.log(p);
                    
//                    if(p == 4){
//                        $('.home-menu ul.dropdown-menu').toggleClass('active');
//                    }else{
//                        $('#staging').empty();
//                        $('#staging').load('general.php');
//                    }
                });
                 
//    $('#staging').on('click', '.home-btn', function (){
//        var page = $(this).attr('page');
//        $("#navigation a#link-"+page).trigger('click');
//            });
                
         });
        </script>
        
        	<script>

</script>
	</body>
	
</html>
