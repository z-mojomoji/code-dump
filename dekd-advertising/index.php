<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$pageName="index";
$statName="ad_why_dek-d";
$title="Dek-D.com : ทำไมต้องโฆษณาที่เว็บ Dek-D";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>
<section class="content content0" page="index">
       <!--content starts-->
        <div class="u-line">
            <h2 class="p1 dekd">เว็บ Dek-D.com คืออะไร</h2>
        </div>
        <div class="con-wrap clearfix" id="dekd-section">
            <div class="box1 line2 leftm mg0">
                <img src="images/wh1.jpg">
                <h4 class="norm">
                เว็บไซต์วัยรุ่นที่<span>ได้รับความนิยม<br class="showd">
                    มากที่สุด</span>ในประเทศไทย</h4>
            </div>
             <div class="box1 line2 leftm">
                <img src="images/wh2.jpg">
                <h4 class="norm longdesc">
                    มีผู้เข้าเยี่ยมชม<span>มากกว่า12 ล้านคน</span><br class="showd">
(visitors) ต่อเดือน 3.5 ล้าน uip ต่อเดือน</h4>
            </div>
            <div class="box1 line2 leftm">
                <img src="images/wh3.jpg">
                <h4 class="norm">
                    <span>ช่องทางการสื่อสารที่ใหญ่ที่สุด</span><br class="showd">
ในการเข้าถึงวัยรุ่น</h4>
            </div>
            <div class="box1 line2 leftm">
                <img src="images/wh4.jpg">
                <h4 class="norm">
                    มีผู้เข้าเยี่ยมชม* <span>สูงสุดเป็นอันดับ 6</span><br class="showd">
                ของประเทศไทย</h4>
                <p class="note">* อันดับที่ 4 จาก เว็บไซต์ทุกหมวด<br class="showd">
จัดอันดับโดย truehits.net/awards2014</p>
            </div>
        </div><!--end dekd-section-->
        
        <hr>
        
        <div class="u-line fa fa-angle-right fBtn" section="stat">
            <h2 class="p1 stat">ข้อมูลสถิติวันนี้</h2>
        </div>
        
        <?
            if(!$isResponsive){
                include("subpages/index/stat.php");
            }
        ?>
        
        <div class="u-line fa fa-angle-right fBtn" section="why">
            <h2 class="p1 why">ทำไม Dek-D ถึงเป็นขวัญใจของวัยรุ่น</h2>
        </div>
        
        <?
            if(!$isResponsive){
                include("subpages/index/why.php");
            }
        ?>
        
        
        <div class="u-line expand" section="teen">
            <h2 class="p1 teens">Dek-D เข้าถึงวัยรุ่น ได้หลายรูปแบบ</h2>
        </div>
        
        <?
//            if(!$isResponsive){
//                include("subpages/index/teen.php");
//            }
            include("subpages/index/teen.php");
        ?>
        
        
        <div class="u-line fa fa-angle-right fBtn" section="conclude">
            <h2 class="p1 conclude">ทำไม Dek-D ถึงเหมาะกับคุณ</h2>
        </div>
        
        <?
            if(!$isResponsive){
                include("subpages/index/conclude.php");
            }
        ?>
        
        
        <div class="u-line fa fa-angle-right fBtn" section="example">
            <h2 class="p1 example">ตัวอย่าง ผู้ที่เคยให้การสนับสนุน</h2>
        </div>
         
           <?
            if(!$isResponsive){
                include("subpages/index/example.php");
            }
            ?>
        
        <div class="u-line fa fa-angle-right fBtn" section="rule">
            <h2 class="p2 rules">เงื่อนไขการลงโฆษณา</h2>
        </div>
        
        <?
            if(!$isResponsive){
                include("subpages/rule.php");
            }
        ?>
</section>
<? 
    include_once('foot.php');
?>         