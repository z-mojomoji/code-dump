<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="fair";
$statName="ad_position_fair";
$pageName="position";
$title="Dek-D.com : Admission Fair";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="fair">
        <!--content starts-->

        <div id="fair-head">
            <img src="images/fair/fair-logo.png" class="" id="fair-logo">
            <img src="images/fair/fair-txt.png" id="fair-txt">
            <img src="images/fair/badge.png" class="abs" id="badge">

            <img src="images/fair/strap.jpg" title="โอกาสในการเข้าถึง เด็ก ม.ปลายสุดฟิต! เตรียมพร้อมเข้ามหา'ลัย" id="strap" class="showd">
            <img src="images/fair/strap-m.jpg" title="โอกาสในการเข้าถึง เด็ก ม.ปลายสุดฟิต! เตรียมพร้อมเข้ามหา'ลัย" id="strapm" class="showm img100">

            <p>
                <strong>แฟร์แอดมิชชั่นสุดคึกคัก ถูกใจเด็ก ม.ปลาย คนร่วมงานเกิน  30,000 คน* ต่อวัน</strong>
                <br> สนใจร่วมออกบูธในราคาสุดคุ้ม<br class="showm">
                ติดต่อ คุณบอส <span>0-2860-1142</span> ต่อ <span>231</span><br class="showm">
                หรือทางอีเมล์ <span>event@dek-d.com</span>
            </p>

        </div>
        <div class="con-wrap pd0">
            <p class="small-grey small a-right">*ยอดนับผู้เข้างานจากงานล่าสุด 3 พ.ค. 58</p>
        </div>
        
        <hr class="showm mobile mt10">

        <div class="u-line fa fa-angle-right mt40m fBtn" section="benefit">
            <h2 class="p1 dekd">งานของ Dek-D นี้ดีอย่างไร?</h2>
        </div>
        <? 
            if(!$isResponsive){
                include('subpages/fair/benefit.php');
            }
        ?> 
        <div class="u-line fa fa-angle-right fBtn" section="history">
            <h2 class="p3 mic">งานนี้เกิดขึ้นมาได้อย่างไร?</h2>
        </div>
        <? 
            if(!$isResponsive){
                include('subpages/fair/history.php');
            }
        ?> 

        <div class="u-line fa fa-angle-right fBtn" section="stuffs">
            <h2 class="p3 blackbook">งานนี้มีอะไรบ้าง?</h2>
            <span class="subtitle">บูธบริการแอดมิชชั่น ถูกใจ ม.ปลาย มีเฉพาะงาน Dek-D เท่านั้น</span>
        </div>
        
        <? 
            if(!$isResponsive){
                include('subpages/fair/stuffs.php');
            }
        ?> 
        
        <div class="u-line fa fa-angle-right clearfix fBtn" section="map">
            <h2 class="p3 pin">แผนผังการจัดงานครั้งที่ผ่านๆมา</h2>
        </div>
        <? 
            if(!$isResponsive){
                include('subpages/fair/map.php');
            }
        ?> 
        

        <div class="u-line fa fa-angle-right clearfix">
           <a id="tableBtn" href="#" target="_blank"></a>
            <h2 class="p3 graph left">
            ราคาแพคเกจพื้นที่บูธ Dek-D's Admission Fair 
            </h2>
            <span class="effected">Effective : 1 Jan 2016</span>
        </div>
        <? 
        if(!$isResponsive){
            include('subpages/table/fair-table.php');
        }
        ?>

        <div class="u-line fa fa-angle-right clearfix fBtn" section="feedback">
            <h2 class="p3 conver left">
            มีใครพูดถึงงานนี้บ้าง?
            </h2>
        </div>
        
        <? 
            if(!$isResponsive){
                include('subpages/fair/feedback.php');
            }
        ?> 
        
        <div class="u-line fa fa-angle-right clearfix fBtn" section="sponsor">
            <h2 class="p1 example left">
            สินค้าและบริการที่เคยมาออกบูธกับเรา
            </h2>
        </div>
        
        <? 
            if(!$isResponsive){
                include('subpages/fair/sponsor.php');
            }
        ?>

    </section>
    <? 
    include_once('foot.php');
?>