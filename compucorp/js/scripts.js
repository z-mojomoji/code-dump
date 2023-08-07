// Sticky Header
$(window).scroll(function() {

    if ($(window).scrollTop() > 100) {
        $('.Header').addClass('Header--sticky');
    } else {
        $('.Header').removeClass('Header--sticky');
    }
});

// Mobile Navigation
$('.NavigationBar-toggle').click(function() {
    if ($('.Header').hasClass('NavigationBar--open')) {
        $('.Header').removeClass('NavigationBar--open');
    } else {
        $('.Header').addClass('NavigationBar--open');
    }
});

$('.NavigationBar-link').click(function() {
    if ($('.Header').hasClass('NavigationBar--open')) {
        $('.Header').removeClass('NavigationBar--open');
    }
});


$(document).ready(function(){
    $(".Members-container").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });   

    $(".Blog-container").owlCarousel({
        loop:true,
        responsiveClass:true,
        nav:true,
        navText: ["<i class='fa fa-angle-left Blog-arrow Blog-arrowLeft'></i>","<i class='fa fa-angle-right Blog-arrow Blog-arrowRight'></i>"],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:4,
            }
        }
    }); 
});
 