<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>.: Palaces Jewellery :.</title>
<!--Favicon Included-->
    <link rel="shortcut icon" href="images/favicon.ico" /> 
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Font Awesome Included -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Slider Included -->
    <link href="css/slick.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- Loader Included -->
    <link href="css/introLoader.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
</head>
<body class="gallery">
<div id="element2" class="introLoading"></div>
	<div id="wait" style="display:none;position:absolute;top:0;left:0; width: 100%; height: 100%; background: #000000; z-index: 100000;"><img src="images/spinner.gif"/></div>
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="visible-xs mobile-header">
        	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a>
        </div>
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php"><img alt="Logo" src="images/logo.png"></a>
                </li> 
                <li>
                    <a  class="ajax_nav" href="content-home.html" data-html="index"><span>Home</span></a>
                </li>               
                <li>
                    <a  class="ajax_nav" href="content-about-us.html" data-html="about-us"><span>About us</span></a>
                </li>
                <li class="dropdown">
                    <a class="ajax_nav" href="content-our-factory.html" data-html="our-factory"><span>Our Factory</span></a>
                </li>
                <li>
                    <a class="ajax_nav" href="content-store-locations.html" data-html="store-locations"><span>Store Locations</span></a>
                </li>
                <li class="dropdown dropdown-main active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Gallery</span></a>
                    <div class="visible-xs">
                    	<ul class="dropdown-menu">
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php?category=earings" data-html="category.php?category=earings">
                                    <span>Earrings</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php?category=pendants" data-html="category.php?category=pendants">
                                    <span>Pendants</span>
                                </a>
                            </li>
                            <li class="active">
                                <a class="ajax_gallery_nav" href="content-category.php?category=rings" data-html="category.php?category=rings">
                                    <span>Rings</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php?category=bracelets" data-html="category.php?category=bracelets">
                                    <span>bracelets</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php?category=necklaces" data-html="category.php?category=necklaces">
                                    <span>necklaces</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="ajax_nav" href="content-contact-us.html" data-html="contact-us"><span>Contact Us</span></a>
                </li>
            </ul>
            <ul class="bottom-nav">
            	<li>
            		<ul class="socials">
            			<li class="twitter"><a href="#" target="_blank"></a></li>
            			<li class="fb"><a href="#" target="_blank"></a></li>
            			<li class="pinit"><a href="#" target="_blank"></a></li>
            			<li class="gp"><a href="#" target="_blank"></a></li>
            		</ul>
            	</li>
            	<li class="site-info">Copyright © 2016. Palaces <br>Jewellery. All Rights Reserved.</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->  
        <div class="side-arrow"></div> 
        <div class="side-arrow-gallery"></div>     
        <div id="page-content-wrapper" class="animsition inner-page">
        	<div class="hidden-xs">
	        	<ul class="dropdown-menu-main">
                    <li>
                        <a class="ajax_gallery_nav" href="content-category.php?category=earings" data-html="category.php?category=earings">
                            <span class="bg-image earing"></span>
                            <span>Earrings</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax_gallery_nav" href="content-category.php?category=pendants" data-html="category.php?category=pendants">
                            <span class="bg-image pendant"></span>
                            <span>Pendants</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax_gallery_nav" href="content-category.php?category=rings" data-html="category.php?category=rings">
                            <span class="bg-image ring"></span>
                            <span>Rings</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax_gallery_nav" href="content-category.php?category=bracelets" data-html="category.php?category=bracelets">
                            <span class="bg-image bracelet"></span>
                            <span>bracelets</span>
                        </a>
                    </li>
                    <li>
                        <a class="ajax_gallery_nav" href="content-category.php?category=necklaces" data-html="category.php?category=necklaces">
                            <span class="bg-image necklace"></span>
                            <span>necklaces</span>
                        </a>
                    </li>
                </ul>
		    </div>
            <span id="main_content">
                
            </span>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <div class="side-text"></div>
    <!-- /#wrapper -->
	<div class="side-text"></div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script type="text/javascript">
	    $("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });
	    $(document).ready(function(){
	        $(".dropdown-main").click(function(){
	            $(".dropdown-menu-main, .side-arrow-gallery").animate({
	                width: "toggle"
	            });
	        });
	    });
	    //$('.gallery-slider').slick();
	    $('.dropdown').on('show.bs.dropdown', function(e){
	        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	   	});	
	    // ADD SLIDEUP ANIMATION TO DROPDOWN //
	    $('.dropdown').on('hide.bs.dropdown', function(e){
	        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	    });
    </script>
    <script src="js/animsition.min.js" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.animsition').animsition({
			      inClass:'zoom-in-sm',
			      outClass:'zoom-out-sm'
		    })
		  });
	</script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/spin.min.js"></script>
    <script src="js/jquery.introLoader.js"></script>
		<script>
			$(document).on('ready', function() {
				$("#element2").introLoader({
                    animation: {
                        name: 'gifLoader',
                        options: {
                            ease: "easeInOutCirc",
                            style: 'dark bubble',
                            delayBefore: 500,
                            delayAfter: 0,
                            exitTime: 200
                        }
                    }
                });
				$( ".dropdown-main" ).click(function() {
			  		$(".side-arrow-gallery").toggleClass( "gallery" );
			  	});
			});
			$(document).ajaxStart(function(){
		        $("#wait").css("display", "block");
		    });
		    $(document).ajaxComplete(function(){
		        $("#wait").css("display", "none");
		    });
		</script>
		<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="js/jquery.loupe.min.js"></script>
		<script type="text/javascript">			
			$( "#main_content" ).load( "content-"+location.href.split("/").slice(-1), function() {
			    $('.gallery-slider').slick();
				$(".fancybox").fancybox({
					openEffect: 'none',
					closeEffect: 'none',
				});
				//$('#single_1').loupe();
				$(document).ready(function () {
					$(".fancy").fancybox({
						helpers: {
							title: {
								type: 'float'
							}
						},
						afterShow: function () {
							$('.fancybox-image').loupe();
						}
					});
				});
			});
		</script>
		<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
