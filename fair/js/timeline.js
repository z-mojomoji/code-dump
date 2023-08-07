// JavaScript Document

$(document).ready(function(){
	
	//ควรมางานนี้กี่โมง
	$('#box-timeline').on('click','.time-box a',function(){
		$('#popup-timeline, #bgblack').fadeIn();
		var timenum= $(this).attr('timeline');
		$('.timeline'+timenum).fadeIn();
	});
    
	$('#popup-timeline').on('click','a.x-clo',function(){
		$('#popup-timeline').fadeOut();
		$('#bgblack').fadeOut();
		$('.timeline').fadeOut();
	});
	
	
	//ปิด bgblack
	$('#bgblack').on('click',function(){
		$(this).fadeOut();
		$('#popup-timeline').fadeOut();
		$('.timeline').fadeOut();
	
	});
    
    //for right banner
    
    
    $(window).scroll(function(){
                
        var social = $("#social-box").offset().top;

        if ($(this).scrollTop() > social) {
            $('#fixed-banner').fadeOut();
        } else {
            $('#fixed-banner').fadeIn();  
        }
    });
});