
<div id="homepage" class="panel panel2">
    <div class="row">
      	<div class="logo text-center">
      		<a href="index.php"><img alt="Logo" src="images/logo.png"></a>
      		<span>Look regal. Feel royal.</span>
      	</div>
      	<ul class="sidebar-nav home-menu">                
	        <li class="about_us">
	            <a id="link-about" page="about" href="#about" class="home-btn"><span>About us</span></a>
	        </li>
	        <li class="factory">
	              <a id="link-factory" page="factory" href="#factory" class="home-btn"><span>Our Factory</span></a>
	        </li>
	        <li class="location">
	             <a id="link-location" page="location" href="#location" class="home-btn"><span>Store Locations</span></a>
	        </li>
	        <li class="dropdown">
	            <a id="link-gallery" page="gallery" class="home-btn"><span>Gallery</span></a>
	           	<ul class="dropdown-menu">
			       <li class="gallery">
			       	<a page="earrings" p-num="4-1">Earrings</a>
			       </li>
			       <li>
			       	<a page="pendants" p-num="4-2">Pendants</a>
			       </li>
			       <li>
			       	<a page="rings" p-num="4-3">Rings</a>
			       </li>
			       <li>
			       	<a page="bracelets" p-num="4-4">bracelets</a>
			       </li>
			       <li>
			       	<a page="necklaces" p-num="4-5">necklaces</a>
			       </li>
			   </ul>
        </li>

        <li class="media">
            <a id="link-media" page="media" href="#media" class="home-btn"><span>Media</span></a>
        </li>
        <li class="event">
            <a id="link-event" page="event" href="#event" class="home-btn"><span>Events</span></a>
        </li>
        <li class="contact_us">
            <a id="link-contact" page="contact" href="#contact" class="home-btn"><span>Contact Us</span></a>
        </li>
    </ul>
  	<div class="visible-xs mobile-img">
<!--    	<img alt="Home Image" src="images/home-img.png" class="img-responsive">-->
    </div>
	<ul class="bottom-nav clearfix">
    	<li>
            <ul class="socials">
                    <li class="twitter">
                    <a href="#" target="_blank">
                         <i class="fa fa-twitter"></i>
                    </a></li>
                    <li class="fb">
                    <a href="#" target="_blank">
                        <i class="fa fa-facebook-f"></i>
                    </a></li>
                    <li class="pinit">
                    <a href="#" target="_blank">
                         <i class="fa fa-pinterest-p"></i>
                    </a></li>
                    <li class="gp">
                    <a href="#" target="_blank">
                        <i class="fa fa-google-plus"></i>
                    </a></li>
                </ul>
    	</li>
    	<li class="site-info">Copyright © 2016.<br> Palaces Jewellery. All Rights Reserved.</li>
    </ul>
    
	    
    <a class="home-left arrow" btn-num="0" id="left-ar"></a>
    <a class="home-right arrow" btn-num="1" id="right-ar"></a>
    
	</div>
	
    
    <ul class="bg-slider clearfix">
       <li class="bg bg1"></li>
       <li class="bg bg2"></li>
       <li class="bg bg3"></li>
    </ul>
</div>

<style>
    #homepage .arrow{
        width: 20px;
        height: 71px;
        background: url("../images/arrows.png") no-repeat;
        display: block;
        position: absolute;
        top: 40%;
        left: 20px;
        cursor: pointer;
    }
    
    #homepage .arrow.home-right{
        background-position: -24px 0;
        left: auto;
        right: 20px;
    }
    
    #homepage ul.bg-slider{
        width: 300%;
        height: 100%;
        margin: 0 !important;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1;
    }
    
    #homepage ul.bg-slider li{
        width: 33.33%;
        height: 100%;
        display: block;
        position: relative;
        float: left;
    }
    
    #homepage ul.bg-slider li.bg1{
        
    background: url("../images/home-img.png") no-repeat center bottom;
    background-size: 85vh;
    }
    
    #homepage ul.bg-slider li.bg2{
        
    background: url("../images/home-img2.png") no-repeat center bottom 88px;
    background-size: 85vh;
    }
    
    
    #homepage ul.bg-slider li.bg3{
        
    background: url("../images/home-img3.png") no-repeat center bottom 88px;
    background-size: 85vh;
    }
    
    @media (max-width: 768px){
        #homepage .arrow{
            display: none;
        }
        
        #homepage ul.bg-slider li.bg1{
        
            background: url("../images/home-img.png") no-repeat center bottom 30%;
            background-size: 75vh;
        }

        #homepage ul.bg-slider li.bg2{

            background: url("../images/home-img2.png") no-repeat center bottom 30%;
            background-size: 75vh;
        }

        #homepage ul.bg-slider li.bg3{

            background: url("../images/home-img3.png") no-repeat center bottom 30%;
            background-size: 75vh;
        }
    }
    
    @media (max-width: 768px) and (max-height: 600px){
        #homepage ul.bg-slider li.bg1{
        
            background: url("../images/home-img.png") no-repeat center bottom 16%;
            background-size: 46vh;
        }

        #homepage ul.bg-slider li.bg2{

            background: url("../images/home-img2.png") no-repeat center bottom 16%;
            background-size: 46vh;
        }

        #homepage ul.bg-slider li.bg3{

            background: url("../images/home-img3.png") no-repeat center bottom 16%;
            background-size: 46vh;
        }
    }
    
    @media (max-width: 480px){
        
        #homepage ul.socials li a i.fa{
            font-size: 6vw;
        }
        .home-menu li a span			{ font-size: 3.2vw;}
    }

</style>

<script>
    var clicknum= 0;
    var listLenth = ($("#homepage ul.bg-slider li").length)-1;
    console.log(listLenth);
    $('#homepage').on('click', '.arrow', function () {
            var p = parseInt($(this).attr('btn-num'));
//            console.log("clicked "+p);
            
            if (p == 0) {
//                console.log('left button '+ p);
                if(clicknum == 0){
                    clicknum = listLenth;
                }else{
                    clicknum = clicknum-1;
                }
            } else if(p == 1){
                // console.log('right button '+ p);
                if(clicknum == listLenth){
                    clicknum = 0;
                }else{
                    clicknum = clicknum+1;
                }
            }
            $('#homepage ul.bg-slider').fadeOut();
        
            $('#homepage ul.bg-slider').animate({
                left: -(clicknum * 100) + "%"
            });
        
            $('#homepage ul.bg-slider').fadeIn();
        });
    
    // clear auto slide
$('#homepage ul.bg-slider').on('mouseover',function(){
	window.clearInterval(timerA);
}).on('mouseout',function(){
	timerA = window.setInterval("autoslide()", 5000);
});    

// auto slide1
var btnnum = 0;
var timerA;
timerA = window.setInterval("autoslide()", 5000);
function autoslide(){ 
	btnnum = parseInt(btnnum)+1;
	if(btnnum>listLenth){btnnum=0;}//change page number accordingly
//	jQuery('#right-ar').click();
    if(clicknum == listLenth){
        clicknum = 0;
    }else{
        clicknum = clicknum+1;
    }
    $('#homepage ul.bg-slider').fadeOut();
        
    $('#homepage ul.bg-slider').animate({
        left: -(clicknum * 100) + "%"
    });

    $('#homepage ul.bg-slider').fadeIn();
}

</script>
