$(document).ready(function(){

var slnum= 0; //current Slide
var toSlide = $("ul#inslide li").innerWidth(); //width per slide
var maxnum = ($("ul#inslide li").length)-1; //number of all slides   

$(window).resize(function() {
    toSlide = $("ul#inslide li").innerWidth(); //width per slide
});
    
$('#banner-slider').on('click','#right-ar',function(){
	slnum = parseInt(slnum)+1;
	if(slnum>maxnum){slnum=0;}
	var lefarrnum = -(parseInt(slnum)*toSlide);//change width of a li
	$('ul#inslide').animate({left:lefarrnum},{queue: false, duration: 300});
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
});
    

$('#banner-slider').on('click','#left-ar',function(){
	slnum = parseInt(slnum)-1;
	if(slnum<0){slnum=maxnum;}
	var lefarrnum = -(parseInt(slnum)*toSlide);//change width of a li
	$('ul#inslide').animate({left:lefarrnum},{queue: false, duration: 300});
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
});
    
$('#banner-slider').on('click','.page',function(){
    var getPage=$(this).attr('pagenum');
    slnum = parseInt(getPage);
    $('.page').removeClass('active');
    $('.page'+slnum).addClass('active');
    var lefarrnum = -(parseInt(slnum)*toSlide);//change width of a li
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
    var lastSlide = ($("ul#inslide li").length)-1; //number of all slides 
	btnnum = parseInt(btnnum)+1;
	if(btnnum>lastSlide){btnnum=0;}//change page number accordingly
	jQuery('#right-ar').click();
}
    