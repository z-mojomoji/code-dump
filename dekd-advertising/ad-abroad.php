<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="abroad";
$statName="ad_position_studyabroad";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising คอลัมน์  Study Abroad";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>

<style>
@-moz-document url-prefix() {
    
    table.more-table{
        width: 838px;
    }
    
    table.more-table thead th{
        padding: 14px 0px;
    }
    table.more-table tbody tr:first-child td:first-child{
        padding: 37px 0px !important;
    }
    table.more-table tbody tr td{
        padding: 29px 0px 28.5px!important;
    }

    table.more-table tbody tr:last-child td:first-child{
        padding: 37.5px 0px !important;
    }
}
</style>

<section class="content content3" page="abroad">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Study Abroad</h2>
    </div>
    <div class="con-wrap2 clearfix" id="studyabroad-section">
        <a href="http://www.dek-d.com/studyabroad/" target="_blank" title="Dek-D's Study Abroad" alt="Dek-D's  Study Abroad"><img src="images/studyabroad/ad-studyabroad01.jpg" class="shadow left img98"></a>
        
        <div class="box2-2 right line1 mg0 w100">
            <div class="box1 line2 leftm mg0 pb0m">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10 pt2d">
                รวมเรื่องชวนติดตาม, เรียนต่อ, ศึกษาต่อ,
                เรียนต่อต่างประเทศ, work and travel</p>
            </div>
            
            <div class="box1 line2 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10 pt2d">
                กลุ่มเว็บเพจที่เข้าถึงวัยรุ่นที่สนใจเรื่อง
                การศึกษา แอดมิชชั่น โรงเรียน
                มหาวิทยาลัย สถาบันกวดวิชา
                การฝึกอบรมต่างๆ</p>
            </div>
            
            <hr class="mb20">
            <p class="h5">สถิติผู้เข้าชมหน้านี้</p>
            <div class="picsidebox line1 leftm mg0">
                <img src="images/pageview.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block">
                <span class="num-big">5 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                <span class="small small-grey">ก.ค. - ก.ย. 58</span>
                </p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">1.2 ล้าน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20">
            <p class="h5">แสดงผลที่ 4 กลุ่มหน้านี้</p>
            <div class="iconbox line1 leftm mg0 pb8">
                <i class="bubble-ic pen"></i>
                <p>หน้าแสดงรายชื่อกระทู้<br>
                คอลัมน์เรียนต่อนอก</p>
            </div>
            
            <div class="iconbox line1 rightm pb8">
                <i class="bubble-ic speech"></i>
                <p>หน้าอ่านกระทู้<br>
                    คอลัมน์เรียนต่อนอก</p>
            </div>
            
            
            <div class="iconbox line2 leftm mg0 pt2 pb8d clear">
                <i class="bubble-ic note"></i>
                <p>หน้าแสดงรายชื่อบทความ<br>
                    คอลัมน์เรียนต่อนอก</p>
            </div>
            
            <div class="iconbox line2 rightm pt2 pb8d">
                <i class="bubble-ic book"></i>
                <p>หน้าอ่านบทความ<br>
                    คอลัมน์เรียนต่อนอก</p>
            </div>
            
            
        </div><!--content txt box-->
    
    </div><!--studyabroad-section-->
    
    <hr>
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? 
        if(!$isResponsive){
            include('subpages/abroad/position.php');
        }
    ?> 
    
    <div class="u-line fa fa-angle-right clearfix">
       <a id="tableBtn" href="#" target="_blank"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
    <? 
        if(!$isResponsive){
            include('subpages/table/abroad-table.php');
        }
    
        include_once ('stepandrules.php');
    
    ?>
       
</section>

<? 
    include_once('foot.php');
?>       
