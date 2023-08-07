<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="education";
$statName="ad_position_edu";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising คอลัมน์ Dek-D's Tutor Center";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="education">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Education</h2>
    </div>
    <div class="con-wrap2 clearfix" id="education-section">
        <a href="http://www.dek-d.com/education/" target="_blank" title="Dek-D's Education" alt="Dek-D's Admission"><img src="images/education/ad-education01.jpg" class="shadow left img98 center"></a>
        
        <div class="box2-2 rightm line1 mg0 w100">
            <div class="box1 line2 leftm mg0 pb0m">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10 pt2d">
                กลุ่มเว็บเพจที่เข้าถึงวัยรุ่นที่สนใจเรื่อง<br class="showd">
                การศึกษา ติวเตอร์ สถาบันกวดวิชา<br class="showd">
                การฝึกอบรม</p>
            </div>
            
            <div class="box1 line2 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10 pt2d">
                สถาบันการศึกษา โรงเรียน มหาวิทยาลัย<br class="showd">
                สถาบันกวดวิชา กิจกรรมรับสมัครนักเรียน<br class="showd">
                กิจกรรมเข้าค่าย การติว การฝึกอบรมต่างๆ<br class="showd">
                กิจกรรมของสถาบัน ฯลฯ</p>
            </div>
            
            <hr class="mb20">
            <p class="h5">สถิติผู้เข้าชมหน้านี้</p>
            <div class="picsidebox line1 leftm mg0">
                <img src="images/pageview.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block">
                <span class="num-big">2 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                    <span class="small small-grey">ก.ค. - ก.ย. 58</span></p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">8 แสน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20d">
            
        </div><!--content txt box-->
        
        
    </div><!--education-section-->

       
        
    <? if(!$isResponsive){
    include('subpages/table/education-show-table.php');
    }else{
        ?>
        <a href="tabledis.php?table=education&num=1" target="_blank" class="new-table">ตารางแสดงผล 6 กลุ่มหน้านี้</a>
        <hr class="mb20">
        <?
    } 
    ?>
        
    
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? if(!$isResponsive){
        include('subpages/education/position.php');
        }
    ?>
   
    <div class="u-line fa fa-angle-right clearfix">
       <a id="tableBtn2" href="tabledis.php?table=education&num=2" target="_blank" section="education-table"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
    <? if(!$isResponsive){
        include('subpages/table/education-table.php');
        }
    
        include_once ('stepandrules.php');?>
       
</section>
<? 
    include_once('foot.php');
?>       