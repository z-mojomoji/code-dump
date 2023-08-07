
<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="โฆษณา, ads, ข่าวโฆษณา, banner, บริษัทโฆษณา, โฆษณาไทย, โฆษณาเว็บ, promote, โปรโมท, โปรโมทเว็บ, เป้าหมาย" />
	<meta name="viewport" content="initial-scale=1">
	<meta name="description" content="สื่อโฆษณา ออนไลน์ สำหรับวัยรุ่น ซึ่งผู้เข้าชมหลักนั้นได้แก่ กลุ่มวัยรุ่น วัยเรียน ตั้งแต่วัย 12-23 ปี  และกลุ่มผู้เข้าชมรอง ได้แก่ กลุ่มผู้ปกครอง ครูอาจารย์ และบุคคลทั่วไป"/>
	<link href="css/style.css?v=1" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	
	
	<link href="/assets/vendor/fontawesome4/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    
    <script type="text/javascript" src="js/script.js"></script>
    <!--footer-->
        <link href="http://www0.dek-d.com/assets/homepage/css/2015dekdSocialPopup.css?v=" rel="stylesheet" type="text/css" />
        <script src="http://www0.dek-d.com/assets/vendor/Swiper/dist/js/swiper.js"></script> <!--for inpage mobile -->
        <link rel="stylesheet" href="http://www0.dek-d.com/assets/vendor/Swiper/dist/css/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="css/mobile_menu.css">
         <? if($isResponsive) : ?>
            <link href="http://www0.dek-d.com/assets/toolbar/css/toolbar_mobile_2015.css?v=1.2" rel="stylesheet" type="text/css" />
        <? else: ?>
            <link href="http://www0.dek-d.com/assets/toolbar/css/toolbar_desktop_2015.css?v=1.2" rel="stylesheet" type="text/css" />
        <? endif; ?>
        <style>
       @import url("http://www0.dek-d.com/assets/homepage/css/footer.css");
       @import url("http://www0.dek-d.com/assets/homepage/css/footer_responsive.css") (max-width: 480px);
        
   </style>
        <script type="text/javascript" src="http://www0.dek-d.com/assets/homepage/js/2015dekdSocialPopup.js?v="></script>
               
    
</head>
<body>
    
   <?
        if(!$isResponsive){
            include('popup.php');
        }
    ?>
    <?if(!$isResponsive){ include('/webroot/www/main/application/modules/toolbar/views/index_2015.php');//toolbar desktop
    }else{ ?>
        <div class="toolbar-mobile-height">
        <? include('/webroot/www/main/application/modules/toolbar/views/mobile/index.php');  //toolbar mobile ?>
        </div>
    <? } ?>
    
    <div id="popupHeader" class="main_menu showm">
        <div class="closeBtn"><div class="line_1"></div><div class="line_2"></div></div>
        <p class="popTitle"></p>
    </div>

    <div class="popupDialog showm">
        <div class="popContent">

        </div>
    </div>
    
    <div class="container invoke">
        <? include ('menuLists.php');  
        //keep the menu lists both on desktop & mobile;
          
       ?>
    <div id="ads-wrapper">
       
        <?  
         include ('mobile_menu.php');
        $position_nested = $menu_advertising['position']['nested']; //variable from menuLists.php
            $profile_nested = $menu_advertising['profile']['nested'];
            include_once('nav.php');
        ?>
    <script type="text/javascript">
         
            var currslot = 0;
            var gptAdSlots = [];
            (function() {
                var useSSL = 'https:' == document.location.protocol;
                var src = (useSSL ? 'https:' : 'http:') +
                        '//www.googletagservices.com/tag/js/gpt.js';
                document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
            })();

          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-1726177-1', 'auto');
          ga('require', 'displayfeatures');
          ga('set', 'contentGroup1', 'advertising ');
          <? if (! empty ($_SESSION['dekdee']['user_id'])): ?>
          ga('set', '&uid', <?=$_SESSION['dekdee']['user_id']?>);
          <? endif; ?>
          ga('send', 'pageview');

</script>