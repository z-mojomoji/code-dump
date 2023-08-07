<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="writer";
$statName="ad_position_writer";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising  Novel + Writer";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="writer">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Novel + Writer</h2>
    </div>
    <div class="con-wrap2 clearfix" id="writer-section">
        <a href="http://www.dek-d.com/writer/" target="_blank" title="Dek-D's Writer" alt="Dek-D's Writer"><img src="images/writer/ad-writer01.jpg" class="shadow left img98 center"></a>
        
        <div class="box2-2 rightm line1 mg0 pb0m w100">
            <div class="box1 line2 leftm mg0">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10d pt2d">
                Novel + Writer หรือพื้นที่ส่วนตัวสำหรับ<br class="showd">
                วัยรุ่นในการนำเสนอความเป็นตัวของตัวเอง<br class="showd">
                อย่างเต็มพิกัด</p>
            </div>
            
            <div class="box1 line2 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10d pt2d">
                เข้าถึงกลุ่มผู้ใช้ที่สนใจอ่าน/<br class="showd">
                เขียน Novel+Writer เป็นคอลัมน์ที่ได้รับ<br class="showd">
                การเข้าถึงในเชิงลึก มากที่สุด</p>
            </div>
            
            <hr class="mb20">
            <p class="h5">สถิติผู้เข้าชมหน้านี้</p>
            <div class="picsidebox line1 leftm mg0">
                <img src="images/pageview.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block">
                <span class="num-big">80 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                <span class="small small-grey">ก.ค. - ก.ย. 58</span></p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">2.2 ล้าน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20">
            <p class="h5">แสดงผลที่ 5 กลุ่มหน้านี้</p>
            <div class="iconbox line1 leftm mg0 pb8">

                <i class="bubble-ic pen"></i>
                <p>หน้าแสดงรายชื่อกระทู้<br>
                   บอร์ดนักเขียน<br>
                   <span class="small-grey small">จะแสดงผลทุกหมวด ย่อยของบอร์ดนักเขียน</span></p>
            </div>
            
            <div class="iconbox line1 rightm pb8">
                <i class="bubble-ic speech"></i>
                <p>หน้าอ่านกระทู้บอร์ดนักเขียน<br>
                   <span class="small-grey small">จะแสดงผลทุกหมวด ย่อยของบอร์ดนักเขียน</span></p>
                    
            </div>
            
            <div class="iconbox line2 leftm mg0 pt2d pb8 clear">
                <i class="bubble-ic note"></i>
                <p>หน้าแสดงรายชื่อบทความ<br>
                    คอลัมน์นักเขียน</p>
            </div>
            
            <div class="iconbox line2 rightm  pt2d pb8">
                <i class="bubble-ic book"></i>
                <p>หน้าอ่านบทความ<br>
                    คอลัมน์นักเขียน</p>
            </div>
            
            
            <div class="iconbox line2 leftm pt2d pb8d clear">
                <i class="bubble-ic bookwithmark"></i>
                <p>หน้าอ่าน<br>
                    Novel + Writer</p>
            </div>
            
            
        </div><!--content txt box-->
    
    </div><!--writer-section-->
    
    <hr>
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? 
        if(!$isResponsive){
            include('subpages/writer/position.php');
        }
    ?> 
    
    <div class="u-line fa fa-angle-right clearfix">
        <a id="tableBtn" href="#" target="_blank"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
    <? 
    if(!$isResponsive){
        include('subpages/table/writer-table.php'); 
    }
    include_once('stepandrules.php');?>
       
</section>
<? 
    include_once('foot.php');
?>       