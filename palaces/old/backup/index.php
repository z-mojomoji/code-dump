<!DOCTYPE html>
<html lang="en" class="home">
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
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- Loader Included -->
    <link href="css/introLoader.css" rel="stylesheet" />
    <link href="css/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
</head>
<body class="home">
<!-- 	<div id="element2" class="introLoading"></div> -->
	<div id="wait" style="display:none;position:absolute;top:0;left:0; width: 100%; height: 100%; background: #000000; z-index: 100000;"><img src="images/spinner.gif"/></div>
    <div id="wrapper">
    <div class="visible-xs mobile-header">
        	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a>
        </div>
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php"><img alt="Logo" src="images/logo.png"></a>
                </li>
                <li>
                    <a  class="ajax_nav" href="content-home.html#home" data-html="index" data-class="home"><span>Home</span></a>
                </li>
                <li class="about_us">
                    <a class="ajax_nav" href="content-about-us.html#about" data-html="about-us" data-class="about-us"><span>About us</span></a>
                </li>
                <li class="factory">
                    <a class="ajax_nav" href="content-our-factory.html#factory" data-html="our-factory" data-class="our-factory"><span>Our Factory</span></a>
                </li>
                <li class="location">
                    <a class="ajax_nav" href="content-store-locations.html#locationp" data-html="store-locations"><span>Store Locations</span></a>
                </li>
                <li class="dropdown dropdown-main">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Gallery</span></a>
                    <div class="visible-xs">
                    	<ul class="dropdown-menu">
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php#category?category=earings" data-html="category.php?category=earings">
                                    <span>Earrings</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php#category?category=pendants" data-html="category.php?category=pendants">
                                    <span>Pendants</span>
                                </a>
                            </li>
                            <li class="active">
                                <a class="ajax_gallery_nav" href="content-category.php#category?category=rings" data-html="category.php?category=rings">
                                    <span>Rings</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php#category?category=bracelets" data-html="category.php?category=bracelets">
                                    <span>bracelets</span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax_gallery_nav" href="content-category.php#category?category=necklaces" data-html="category.php?category=necklaces">
                                    <span>necklaces</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="contact_us">
                    <a class="ajax_nav" href="content-contact-us.html#contact" data-html="contact-us"><span>Contact Us</span></a>
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
        <!-- Page Content -->
        <div class="side-arrow"></div>
        <div class="side-arrow-gallery"></div>
        <div id="page-content-wrapper" class="animsition">
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
            <span id="main_content"></span>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <div class="side-text"></div>
    <!-- /#wrapper -->

	    <!-- jQuery -->
	    <script src="js/jquery.js"></script>
	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>
	    <!-- Menu Toggle Script -->
	    <script type="text/javascript">
		    $("#menu-toggle").click(function(e) {
		        e.preventDefault();
		        $("#wrapper").toggleClass("toggled");
		    });
		    /* $(".dropdown").click(function() {
		        $("body").toggleClass("open");
		    }); */
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
		      });
			  $(".dropdown-main, .dropdown-menu-main li a").off("click");
		      $(".dropdown-main, .dropdown-menu-main li a").click(function(){
		            $(".dropdown-menu-main, .side-arrow-gallery").animate({
		                width: "toggle"
		            });
		      });
		  });
		</script>
	<!-- jQuery, Helpers and jqueryIntrLoader -->
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
				$(document).ajaxStart(function(){
			        $("#wait").css("display", "block");
			    });
			    $(document).ajaxComplete(function(){
			        $("#wait").css("display", "none");
			    });
				$( "#main_content" ).load( "content-home.html");
			});
		</script>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/jquery.loupe.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.gallery-slider').slick();
			$(".fancybox").fancybox({
				openEffect: 'none',
				closeEffect: 'none',
			});
			//$('#single_1').loupe();
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
	</script>
</body>
</html>
