$(document).ready(function(){
    
var slnum=0; //pagenumber-1
$('#banner-slider').on('click','#right-ar',function(){
	slnum = parseInt(slnum)+1;
	if(slnum>4){slnum=0;}//change page number accordingly
	var lefarrnum = -(parseInt(slnum)*990);
	$('ul#inslide').animate({left:lefarrnum},{queue: false, duration: 300});
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
});

$('#banner-slider').on('click','#left-ar',function(){
	slnum = parseInt(slnum)-1;
	if(slnum<0){slnum=4;} //change page number accordingly
	var lefarrnum = -(parseInt(slnum)*990);
	$('ul#inslide').animate({left:lefarrnum},{queue: false, duration: 300});
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
});
    
$('#banner-slider').on('click','.page',function(){
    var getPage=$(this).attr('pagenum');
    slnum = parseInt(getPage);
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
    var lefarrnum = -(parseInt(slnum)*990);
    $('ul#inslide').animate({left:lefarrnum},{queue: false, duration: 300});
});
    
// clear auto slide
$('#banner-slider').on('mouseover',function(){
	window.clearInterval(timerA);
}).on('mouseout',function(){
	timerA = window.setInterval("autoslide()", 5000);
});    

});

// auto slide1
var btnnum = 0;
var timerA;
timerA = window.setInterval("autoslide()", 5000);
function autoslide(){ 
	btnnum = parseInt(btnnum)+1;
	if(btnnum>4){btnnum=0;}//change page number accordingly
	jQuery('#right-ar').click();
}
    