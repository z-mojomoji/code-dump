<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';

$navpage="positionNav";
$subpageName="admission";
$statName="ad_position_admission";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising คอลัมน์  Admission";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="admission">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Admission</h2>
    </div>
    <div class="con-wrap2 clearfix" id="admission-section">
        <a href="http://www.dek-d.com/admission/" target="_blank" title="Dek-D's Admission" alt="Dek-D's Admission"><img src="images/admission/ad-admission01.jpg" class="shadow left img98"></a>
        
        <div class="box2-2 right line1 mg0">
            <div class="box1 line2 leftm mg0 pb0m">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10 pt2">
                กลุ่มเว็บเพจที่เข้าถึงวัยรุ่นที่สนใจเรื่อง<br class="showd">
                การศึกษา แอดมิชชั่น โรงเรียน<br class="showd">
                มหาวิทยาลัย สถาบันกวดวิชา<br class="showd">
                การฝึกอบรมต่างๆ </p>
            </div>
            
            <div class="box1 line2 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10 pt2">
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
                <span class="num-big">6 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                    <span class="small small-grey">ก.ค. - ก.ย. 58</span></p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">1.5 ล้าน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20">
            <p class="h5">แสดงผลที่ 4 กลุ่มหน้านี้</p>
            <div class="iconbox line1 leftm mg0 pb8">
                <i class="bubble-ic pen"></i>
                <p>หน้าแสดงรายชื่อกระทู้<br class="showd">
                    หมวด Admission</p>
            </div>
            
            <div class="iconbox line1 rightm pb8">
                <i class="bubble-ic speech"></i>
                <p>หน้าอ่านกระทู้<br class="showd">
                    หมวด Admission</p>
            </div>
            
            
            <div class="iconbox line2 leftm mg0 pt2 pb8 clear">
                <i class="bubble-ic note"></i>
                <p>หน้าแสดงรายชื่อบทความ<br class="showd">
                    หมวด Admission*</p>
            </div>
            
            <div class="iconbox line2 rightm  pt2 pb8">
                <i class="bubble-ic book"></i>
                <p>หน้าอ่านบทความ<br class="showd">
                    หมวด Admission</p>
            </div>
            
            
            <p class="small small-grey clear pt5">
                <span class="red">*</span>
                ตำแหน่ง EA3 และ TA1 จะแสดงเฉพาะหน้าแสดงรายชื่อ<br class="showd">
บทความคอลัมน์ Admission และในทุกหมวดย่อย
            </p>
            
            
        </div><!--content txt box-->
    
    </div><!--admission-section-->
    
    <hr>
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? 
        if(!$isResponsive){
            include('subpages/admission/position.php');
        }
?>
    
    <div class="u-line fa fa-angle-right clearfix">
       <a id="tableBtn" href="#" target="_blank"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
    <? 
        if(!$isResponsive){
            include('subpages/table/admission-table.php');
        }
    
        include_once ('stepandrules.php');?>
       
</section>
<? 
    include_once('foot.php');
?>       