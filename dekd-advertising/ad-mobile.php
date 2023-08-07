<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="mobile";
$statName="ad_position_app";
$pageName="position";
$title="Dek-D.com : Mobile Site & APP Ad";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="mobile">
   <!--content starts-->
     
         
  <div class="u-line showd">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Mobile Site & APP Ad</h2>
  </div>
    <div class="con-wrap clearfix" id="mobile-section">
        <p class="h6 showm">Mobile Site & APP Ad</p>
        <img src="images/mobile-web.jpg" class="img100 center showm">
        <p class="h6-sub">
            ใหม่ พื้นที่โฆษณาที่แสดงสำหรับผู้ใช้ที่เข้า Dek-D.com บน Smartphone<br class="showd">
ทั้งในรูปแบบ Mobile site ( เว็บไซต์บนมือถือ ) และ APP (Dek-D Writer APP)
        </p>
    
    </div><!--mobile-section-->
       
    <hr class="showm">
       
   <div class="u-line fa fa-angle-right fBtn showm" section="position">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Mobile Site & APP Ad</h2>
    </div>
        
    <? 
        if(!$isResponsive){
            include('subpages/mobile/position.php');
        }
    ?> 
    
    
    <div class="u-line fa fa-angle-right clearfix">
      <a id="tableBtn" href="#" target="_blank"></a>

        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
    <? if(!$isResponsive){
            include('subpages/table/mobile-table.php'); 
        }
        
        include_once ('stepandrules.php');
    ?>
       
</section>
<? 
    include_once('foot.php');
?>       