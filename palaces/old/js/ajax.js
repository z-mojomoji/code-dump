
//$(window).load(function(){
$(".ajax_gallery_nav, .ajax_nav").off("click");

$('.ajax_nav').click(function(event) {
	$('div.map-marker a')
 	.popover('hide');
	//$( this ).click(function( event ) {
	  event.preventDefault();
	  window.history.replaceState({},document.domain,'/'+$(this).attr("data-html"));
	  $ ('ul.sidebar-nav > li').removeClass('active');
	  $( this ).parents('li').addClass('active');
	  $("#wrapper").removeClass("toggled");
	  //Factory Page
	  if ($( this ).attr( "href" ) == 'content.php#factory') {
		  //$('#side-text-id').show();
		  $('body').addClass('factory');
		  $('#page-content-wrapper').addClass('factory-page');
		  $( '.dropdown-menu-main, .side-arrow-gallery' ).hide();
	  } else {
		//$('#side-text-id').hide();
		  $('body').removeClass('factory');
		  $('#page-content-wrapper').removeClass('factory-page');
		  
	  }
	  //Location Page
	  if ($( this ).attr( "href" ) == 'content.php#locationp') {
		  $('body').addClass('location');
		  $( '.dropdown-menu-main, .side-arrow-gallery' ).hide();
		  $( "#main_content" ).load( $( this ).attr( "href" ));
		  $('#page-content-wrapper').addClass('location-page');
		  
	  } else {		  
		  	$( "#main_content" ).load( $( this ).attr( "href" ) );
			$('body').removeClass('location');
			$('#page-content-wrapper').removeClass('location-page');
			
	  }
	  //Contact Page
	  if ($( this ).attr( "href" ) == 'content.php#contact') {
		  $('body').addClass('contact');
		  $('#page-content-wrapper').addClass('contact-page');
		  $( '.dropdown-menu-main, .side-arrow-gallery' ).hide();
	  } else {
		$('body').removeClass('contact');
		$('#page-content-wrapper').removeClass('contact-page');
		
	  }
	//About Page
	  if ($( this ).attr( "href" ) == 'content.php#about') {
		  $('body').addClass('about-page');
		  $( '.dropdown-menu-main, .side-arrow-gallery' ).hide();
	  } else {
		$('body').removeClass('about-page');
		
	  }
	//Home Page
	  if ($( this ).attr( "href" ) == 'content-home.html') {
		  $('body').addClass('home');
		  $('#page-content-wrapper').removeClass('inner-page');
	  } else {
		$('body').removeClass('home');
		$('#page-content-wrapper').addClass('inner-page');
	  }
	  //Gallery Page	  
	  if (($( this ).attr( "href" ) == 'category.php?category=earings') || ($( this ).attr( "href" ) == 'category.php?category=rings') || ($( this ).attr( "href" ) == 'category.php?category=bracelets') || ($( this ).attr( "href" ) == 'category.php?category=pendants') || ($( this ).attr( "href" ) == 'category.php?category=necklaces')) {
			$('body').addClass('gallery');
			//setTimeout(function(){ $(window).trigger("resize"); }, 100);
			//console.log(23423);
	  }else{
			$('body').removeClass('gallery');
	  }
	  if (($( this ).attr( "href" ) == 'content-category.php?category=earings') || ($( this ).attr( "href" ) == 'content-category.php?category=rings') || ($( this ).attr( "href" ) == 'content-category.php?category=bracelets') || ($( this ).attr( "href" ) == 'content-category.php?category=pendants') || ($( this ).attr( "href" ) == 'content-category.php?category=necklaces')) {
		  $ ('ul.sidebar-nav > li.dropdown-main').addClass('active');
		}else{
			$ ('ul.sidebar-nav > li.dropdown-main').removeClass('active');
	  }
	  $( "#main_content" ).hide().fadeIn(1500);
	  
	  if ($( this ).attr( "href" ) == 'content-about-us.html') {
			$ ('ul.sidebar-nav > li.about_us').addClass('active');
	  }else{
		$ ('ul.sidebar-nav > li.about_us').removeClass('active');
	  }
	  if ($( this ).attr( "href" ) == 'content-store-locations.html') {
			$ ('ul.sidebar-nav > li.location').addClass('active');
	  }else{
		$ ('ul.sidebar-nav > li.location').removeClass('active');
	  }
	  if ($( this ).attr( "href" ) == 'content-our-factory.html') {
			$ ('ul.sidebar-nav > li.factory').addClass('active');
	  }else{
		$ ('ul.sidebar-nav > li.factory').removeClass('active');
	  }
	  if ($( this ).attr( "href" ) == 'content-contact-us.html') {
			$ ('ul.sidebar-nav > li.contact_us').addClass('active');
	  }else{
		$ ('ul.sidebar-nav > li.contact_us').removeClass('active');
	  }
	//});
});
$(".side-text").html("<div class='valign'><p>Our factory is located in Gemopolis Free Zone Industrial Estate in Bangkok, and has been granted BOI status approval by the Thailand Board of Investment.</p>\<p>Designed with Swiss standard quality and transparency in mind, our facility carries a ???see through??? look and is equipped with state of the art machinery and equipment.</p>\<p>We produce our own designs as well as manufacture on a contract for other brands, and every process along the way from rough stones to exquisite jewels is completed within our facilities so as to maintain the standards and quality.</p></div>")


$(".ajax_gallery_nav").on("click", function(event){
	event.preventDefault();
	$('div.map-marker a')
 	.popover('hide');
	window.history.replaceState({},document.domain,'/'+$(this).attr("data-html"));
	$("#wrapper").removeClass("toggled");
	$ ('ul.sidebar-nav > li').removeClass('active');
	$( '.main-gallery-nav' ).addClass('active');
//	$( '.dropdown-menu-main' ).animate({
//		width: "toggle"
//	});
	$( '.dropdown-menu-main' ).hide();
	if (($( this ).attr( "href" ) == 'category.php?category=earings') || ($( this ).attr( "href" ) == 'category.php?category=rings') || ($( this ).attr( "href" ) == 'category.php?category=bracelets') || ($( this ).attr( "href" ) == 'category.php?category=pendants') || ($( this ).attr( "href" ) == 'category.php?category=necklaces')) {
		$('body').addClass('gallery');
	}else{
		$('body').removeClass('gallery');
	}
	
	$("body").removeAttr("class");
	$('body').addClass('gallery');
	
	//Home Page
	  if ($( this ).attr( "href" ) == 'content-home.html') {
		  $('body').addClass('home');
		  $('#page-content-wrapper').removeClass('inner-page');
	  } else {
		$('body').removeClass('home');
		$('#page-content-wrapper').addClass('inner-page');
	  }

	  $( "#main_content").hide().fadeIn( 1500 );

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
	
});
$(window).load(function(){

	$("body")
	.tooltip('destroy')
	.popover('destroy')
	.tooltip({   
	    selector: "[data-toggle='tooltip']",
	    container: "body"
	  }).popover({
		    selector: "[data-toggle='popover']",
		    container: "body",
		    html: true
		  })
	    //Popover, activated by clicking
	     .parent().delegate('div.map-marker', 'click', function() {
	    	 var that = this;
	    	 var flag = $('.popover.in').hasClass("in");
	    	 
	    	 console.log(flag,that, $('.popover.in'))
	    	 $('div.map-marker a')
	    	 	.popover('hide'); 
	    	 setTimeout(function(){
	    		 if(!flag){
	    			 $(that).find('a').popover('hide');
	    		 }else{
	    			 $(that).find('a').popover('show');
	    		 }
	    	 },250);
	  });
	
});
//});