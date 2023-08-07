jQuery(function($) {
    new WOW().init();
    $( "#accordion" ).accordion();
    
    
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000,
			pause: false
		});
	});
    
    smoothScroll.init();
    
    $('.video').magnificPopup({
          type: 'iframe',


          iframe: {
            patterns: {
              youtube: {
      index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

      id: 'v=', // String that splits URL in a two parts, second part should be %id%
      // Or null - full URL will be returned
      // Or a function that should return %id%, for example:
      // id: function(url) { return 'parsed id'; }

      src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
    }
            }
          }

        });
    
    
    $('#prev').click(function() {
      $('#main-slider.carousel').carousel('prev');
    });

    $('#next').click(function() {
      $('#main-slider.carousel').carousel('next');
    });

	//Ajax contact
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});
    
    //popup
    
    $('.navbar-login').click(function(){
        $('#bgblack, #popup').fadeIn();
    });
    
    $('#popup').on('click','.x-clos',function(){
        $('#bgblack, #popup').fadeOut();
    });
    
    $('#bgblack').click(function(){
        $('#bgblack, #popup').fadeOut();
    });

	//smooth scroll
//	$('.navbar-nav > li').click(function(event) {
//		event.preventDefault();
//		var target = $(this).find('>a').prop('hash');
//		$('html, body').animate({
//			scrollTop: $(target).offset().top
//		}, 500);
//	});
//
//	//scrollspy
//	$('[data-spy="scroll"]').each(function () {
//		var $spy = $(this).scrollspy('refresh')
//	})

//	//PrettyPhoto
//	$("a.preview").prettyPhoto({
//		social_tools: false
//	});
//
//	//Isotope
//	$(window).load(function(){
//		$portfolio = $('.portfolio-items');
//		$portfolio.isotope({
//			itemSelector : 'li',
//			layoutMode : 'fitRows'
//		});
//		$portfolio_selectors = $('.portfolio-filter >li>a');
//		$portfolio_selectors.on('click', function(){
//			$portfolio_selectors.removeClass('active');
//			$(this).addClass('active');
//			var selector = $(this).attr('data-filter');
//			$portfolio.isotope({ filter: selector });
//			return false;
//		});
//	});
});