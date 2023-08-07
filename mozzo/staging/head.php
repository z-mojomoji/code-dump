<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mozzo Responsive Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <script src="js/jquery-1.12.3.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
       <a class="navbar-brand" href="index.php"></a>
           <ul class="social-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.youtube.com/watch?v=Io0fBr1XBUA" class="video"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        <div class="container">
            <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>                 
        </div>
        <div class="collapse navbar-collapse navbar-default">
          <ul class="nav navbar-nav">                 
            <li class="scroll <?php echo ($pagename == 'main') ? 'active' : ''; ?>"><a href="index.php">Main</a></li>
            <li class="scroll <?php echo ($pagename == 'about') ? 'active' : ''; ?>"><a href="about.php">About Us</a></li>
            <li class="scroll <?php echo ($pagename == 'product') ? 'active' : ''; ?>"><a href="product.php">Products</a></li>                      
            <li class="scroll <?php echo ($pagename == 'price') ? 'active' : ''; ?>"><a href="price.php">Pricing</a></li>
            <li class="scroll <?php echo ($pagename == 'support') ? 'active' : ''; ?>"><a href="https://mozzo.zendesk.com/hc/en-us">Support</a></li>
            <li class="scroll <?php echo ($pagename == 'contact') ? 'active' : ''; ?>"><a href="contact.php">Contact</a></li>
            <li class="scroll <?php echo ($pagename == 'news') ? 'active' : ''; ?>"><a href="news.php">News</a></li>       
          </ul>
        </div>
        </div>
        
        <a class="navbar-login" href="#">Login</a>
    </header><!--/#header-->