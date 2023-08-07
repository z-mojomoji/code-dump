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
		<meta name="keywords" content="palace, jewelry, palace jewelry" />
		<meta name="author" content="Moji Anusirikul" />
	        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="magnify.css" />
       
       <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Lato:300,100' rel='stylesheet' type='text/css'>
       
        <!-- slick Included -->
        <script type="text/javascript" src="slick/slick.js"></script>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        
        <!-- Font Awesome Included -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!--gallery Included-->
        
        <!--media gallery-->
        
        <link rel="stylesheet" href="css/main.css">
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>-->
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/global.min.js"></script>
        <script type="text/javascript" src="magnify.js"></script>
	</head>
	<body>
		<div id="wait" style="display:none;position:absolute;top:0;left:0; width: 100%; height: 100%; background: #000000; z-index: 100000;"><img src="images/spinner.gif"/></div>
		<div id="staging">
				
		<?php
            include('general.php');
            include('popup.php');
        ?>
        
            <div id="bgblack"></div>
		</div>

<script type="text/javascript">
    
    //direct to homepage once the page load without hashtag
    if(!window.location.hash){
        window.location.replace("http://bearrior.com/caveofweb/palaces#homepage");
    }

    var clickNum;
$(document).ready(function(){
    
    clickNum = 0;
    
    //show nav and homepage btn when user load page from # other than homepage
    if(window.location.hash != "#homepage"){
        $('#general a#index-btn').addClass('active');
        $('#nav-side').addClass('active');
    }
    
    $(document.body).on('click', '#gal-list a' ,function(){

        $('.zoom').hide();
        $('.zoom').attr('src', $(this).attr('data-image'));
        $('.zoom').attr('data-magnify-src', $(this).attr('data-image'));
        $('.zoom').fadeIn();
	$('.zoom').magnify();

    });

    $(document.body).on('click', '.gallery-btn' ,function(){
          var id = $(this).attr('data');

	  var type = $(this).attr('href');

  	  $.ajax({
            method: "GET",
            url: "getpost.php",
            data: { id: id }
          })
          .done(function( msg ) {
                var obj = JSON.parse(msg);
                $('#gal-pop h2').html(obj.title);
		$('#gal-content').html(obj.desc);
		//$('#showarea').attr('src', obj.thumb);
		var i = 1;

		var rows = '';
	        rows += '<a href="'+type+'" data-image="'+obj.thumb+'" ><img id="img_0'+i+'" src="'+obj.thumb+'" class="thumbnail" /></a>';
		i++;
		
                 $.each(obj.image, function(k, v) {
			if(i <= 3){
			   rows += '<a href="'+type+'" data-image="'+v+'" ><img id="img_0'+i+'" src="'+v+'" class="thumbnail" /></a>';
			}
			i++;
                });

		$('#gal-list').html(rows);
        	$('.zoom').attr('src', obj.thumb);
	        $('.zoom').attr('data-magnify-src', obj.thumb);
		$('.zoom').magnify();

        	$('#bgblack, #gal-pop').fadeIn();


         });
    });
    
    $('#gal-pop').on('click','.x-clos',function(){
        $('#bgblack, #gal-pop').fadeOut();
    });
    
    $('#bgblack').click(function(){
        $('#bgblack, #gal-pop').fadeOut();
    });
    
    
    
    //gallery slider
    
    $('.gallry-content').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive:
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        }
    });
    
    //clickable factory page
    $('ul.factory-details li a').click(function(e){
        e.preventDefault(); 
        var url = $(this).attr('href');
        window.open(url);
    });
    
    //link click on slidebar
    $('.side-btn').click(function(){

        var navID= $(this).attr('id');
        var page = $(this).attr('page');
        var ref = $(this).attr('href');
        $(".panel").removeClass('active');
        $(".side-btn").removeClass('active');
        $("#homepage").removeClass('inactive');
        $('#homepage .home-menu ul.dropdown-menu').removeClass('active');
        $('#gal-side.sidebar').removeClass('active');
        $("#staging").removeClass("toggled");
        
        if(navID == 'link-gallery'|| navID == 'link-gallery-m'){
            if(clickNum == 0){
                $('#gal-side.sidebar').addClass('active');
                clickNum = 1;
                
            }else if(clickNum == 1){
                 $('#gal-side.sidebar').removeClass('active');
                clickNum = 0;
                
            }
           
            $('.sub-sidem').click(function(){

                $("#staging").toggleClass("toggled");
            });
        }else{
            $('#nav-side #navigation a').removeClass('galactive');
            $("#nav-side #navigation a#link-gallery").removeClass('active');
            $("#staging").toggleClass("toggled");
        }
        
        if(ref != "#homepage"){
            $('#general a#index-btn').addClass('active');
            $('#nav-side').addClass('active');
        }else{
            $('#general a#index-btn').removeClass('active');
            $('#nav-side').removeClass('active');
        }
        
    });
    
    //close gallery slidebar on outer click
     $('.panel').click(function(){
        $('#gal-side.sidebar').removeClass('active');
         $('#nav-side #navigation a').removeClass('galactive');
        clickNum = 0;
    });
    
    //close gallery slidebar after click the selected category
    $('.sub-sided').click(function(){
        $('#gal-side.sidebar').removeClass('active');
        $('#nav-side #navigation a').removeClass('galactive');
        clickNum = 0;
    });
//    
//    //fix bugs on gallery submenu
//                $('.sub-btn').mousedown(function(){
//                    clickNum = 0;
//                    console.log('open sub and after click sub '+clickNum);
//                });
    
    $('#logo').click(function(){

        $('#general a#index-btn').removeClass('active');
            $('#nav-side').removeClass('active');
        $(".panel").removeClass('active');
        $("#homepage").removeClass('inactive');
    });
    
    $('#index-btn').click(function(){
        $('#general a#index-btn').removeClass('active');
            $('#nav-side').removeClass('active');
        $(".panel").removeClass('active');
        $("#homepage").removeClass('inactive');
    });
    
    //active color on gallery if click the selected category
    $('.sub-btn').click(function(){

        $("#nav-side #navigation a#link-gallery").toggleClass('active');
    });
    
    
    $('.sub-sided a').click(function(){

	
	var id = $(this).attr('data');	
	var type = $(this).attr('href');
	$.ajax({
	  method: "GET",
	  url: "getgallery.php",
	  data: { id: id }
	})
	  .done(function( msg ) {

		var rows = '';

		var obj = JSON.parse(msg);
 		 $.each(obj, function(post_id, data) {

		var title = data.title;
		var thumb = data.thumb;
		rows += '<li><a class="gallery-btn" href="'+type+'" rel="group" data="'+post_id+'"><img width="344" height="258" alt="Slide" src="'+thumb+'" class="img-responsive"></a><h5>' +title+ '</h5></li>';
				
    		});	

		$('#result-' + type.slice(1)).html(rows);

 	 });
        clickNum = 0;
        $('#gal-side.sidebar').removeClass('active');
    });
    
    //link click on homepage
    $('.home-menu li a').click(function(){


        var navID= $(this).attr('id');
        var page = $(this).attr('page');
        $('#nav-side #navigation .side-btn').removeClass('active');
            
            //toggle dropdown on gallery category
            if(navID == "link-gallery"){
                $('.home-menu ul.dropdown-menu').toggleClass('active');
                
                $('.dropdown-menu').click(function(){
                    $("#nav-side #navigation a#link-gallery").addClass('active');
                });
                
            }else{
                $('.home-menu ul.dropdown-menu').removeClass('active');
                
                if(window.location.hash != "homepage"){
                    
                    $('#general a#index-btn').addClass('active');
                    $('#nav-side').addClass('active');
                    window.location.hash = '#'+page;
                    $("#homepage").addClass('inactive');
                    $("#"+page).addClass('active');
                    
                    $("#nav-side #navigation a#"+navID).addClass('active');
                    $("#staging").toggleClass("toggled");
                    
                }else{
                    $('#general a#index-btn').removeClass('active');
                    $('#nav-side').removeClass('active');
                    $("#homepage").removeClass('inactive');
                    $("#"+page).addClass('active');
                    
                }
            }
        
    });
    
    //responsive on gallery category
    $('#link-gallery-m').click(function(e){
        e.preventDefault();
        $('ul.sub-sidem').slideToggle();
      });
    
    
    
    $('a#link-gallery').mousedown(function(){
        $('#nav-side #navigation a').toggleClass('galactive');
        
        var checkActive = $('#nav-side #navigation a').hasClass('galactive');
        
        if(!checkActive){
            $('#gal-side.sidebar').addClass('active');
            clickNum=1;
            
        }else{
            $('#gal-side.sidebar').removeClass('active');
            clickNum=0;
        }
        
    });
    
    $('.panel').mousedown(function(){
        $('#nav-side #navigation a').removeClass('galactive');
        $('#gal-side.sidebar').removeClass('active');
        clickNum = 0;
    });
    
    
});

</script>

<!--<script>

    $(document).ready(function(){
        
                    
            //           } else{
//            $(".side-btn").removeClass('active');
//            $(".panel").removeClass('active');
//            $("#"+page).addClass('active');
//            $("#"+navID).addClass('active');
//            $("#staging").toggleClass("toggled");
//  

        //ajax to load general page
        $(".home-menu li a").click(function(){
            var p = $(this).attr('p-num');
            var page = $(this).attr('page');


            if(p == 4){
                $('.home-menu ul.dropdown-menu').toggleClass('active');
            }else{
                $(document).ajaxStart(function(){
                    $("#wait").css("display", "block");
                    $('#staging').empty();
                });
                $(document).ajaxComplete(function(){
                    $("#wait").css("display", "none");
                });

                $('#staging').load('general.php',function(){
                $("#"+page).addClass('active');
                $("#link-"+page).addClass('active');
                    if(page == "gallery"){
                        $('#gallery .sidebar').toggleClass('active');
   $('ul.sub-sided').toggleClass('active');
                    }
                  });
            }
        });
        
        
        
        //information
        $('#pop-gal #gal-con h2').html(pNum);
        if(clickNum == 0){
             $('#nav-side #navigation #link-'+currentPage+'::after').css(
                'background', 'none'
             );
            $('#nav-side #navigation #link-gallery::after').css({
                    width: "23px",
                    height: "46px",
                    content: "",
                    background: 'url("../images/side-arrow.png") no-repeat',
                    position: 'absolute',
                    top: 0,
                    right: '-68px'
            });
            
            clickNum = 1;
        }else if (clickNum == 1){
            $('#nav-side #navigation #link-gallery::after').css(
                'background', 'none'
            );
            $('#nav-side #navigation #link-'+currentPage+'::after').css({
                width: "23px",
                height: "46px",
                content: "",
                background: 'url("../images/side-arrow.png") no-repeat',
                position: 'absolute',
                top: 0,
                right: '-68px'
            });
            clickNum = 0;
        }

 });

</script>-->
</body>
	
</html>
