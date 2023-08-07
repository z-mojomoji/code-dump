<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="home";
$statName="ad_home";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising หน้าแรก เว็บ Dek-D";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="home">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา หน้าแรกเว็บ [Desktop - Mobile]</h2>
    </div>
    <div class="con-wrap2 clearfix" id="home-section">
        <a href="http://www.dek-d.com/" target="_blank" title="หน้าแรกเว็บ Dek-D" alt="หน้าแรกเว็บ Dek-D"><img src="images/home/ad-home01.jpg" class="shadow left img98"></a>
        
        <div class="box2-2 right line1 mg0 w100">
            <div class="box1 line2 leftm mg0 pb0m">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10 pt2d">
                หน้าแรกของเว็บ Dek-D<br class="showd">
                จะเป็นหน้าแรกที่วัยรุ่นทุกคนนึกถึง</p>
            </div>
            
            <div class="box1 line1 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10 pt2d">
                เหมาะสำหรับสินค้า และบริการทุกชนิด<br class="showd">
                ที่ต้องการเสริมสร้างภาพลักษณ์ให้ดูทันสมัย<br class="showd">
                และอินเทรนด์สำหรับวัยรุ่น</p>
            </div>
            
            <hr class="mb20">
            <p class="h5">สถิติผู้เข้าชมหน้านี้</p>
            <div class="picsidebox line1 leftm mg0">
                <img src="images/pageview.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">4.5 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                    <span class="small small-grey">ก.ค. - ก.ย. 58</span></p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block">
                <span class="num-big">1.2 ล้าน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20">
            <p class="h5">แสดงผลที่หน้านี้</p>
            
            <div class="box1 line1 leftm mg0">
                <img src="images/desktop-tablet.jpg" class="inline no-border">
                <p class="showspot inline-block">
                    หน้าแรกเว็บ<br class="showm">
                    Dek-D.com
                    Desktop
                </p>
            </div>
            
            <div class="box1 line1 leftm">
                <img src="images/iphone-android.jpg" class="inline no-border">
                <p class="showspot inline-block" id="iphone">
                    หน้าแรกเว็บ<br class="showm">
                    Dek-D.com
                    Mobile <span class="red">* </span><br>
                    <span class="red small">
                       * 
                   </span>
                   <span class="note">
                       เฉพาะ A3, A5<br>
                   </span>
                </p>
            </div>
            
        </div><!--content txt box-->
    
    </div><!--home-section-->
    
    <hr>
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? 
        if(!$isResponsive){
            include('subpages/home/position.php');
        }
    ?> 
    
    <div class="u-line fa fa-angle-right clearfix">
       <a id="tableBtn" href="#" target="_blank"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
        <? 
        if(!$isResponsive){
            include('subpages/table/home-table.php');
        }
         include_once ('stepandrules.php');?>
       
</section>
<? 
    include_once('foot.php');
?>       