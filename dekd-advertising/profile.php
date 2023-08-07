<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="aboutDek";
$pageName="profile";
$title="Dek-D.com : ทำไมต้องโฆษณาที่เว็บ Dek-D";
$statName="ad_profile";
$subpageName="profile";
addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>
<section class="content content3" page="profile">
<!--content starts-->
<div class="u-line">
    <h2 class="p1 dekd">กว่าจะเป็นเว็บ Dek-D.com </h2>
</div>
<div class="con-wrap clearfix" id="profile-section">
   
    <img src="images/dekd1.jpg" class="right img98 center">
    <div id="profilebox" class="left">
       <p class="in">
           <strong class="g">ใครจะรู้ว่า? เว็บที่ได้รับความนิยมจากวัยรุ่น เป็นอันดับหนึ่ง</strong>
        ของประเทศ อย่างเว็บ DeK-D ในทุกวันนี้นั้น เริ่มต้นจากไอเดียเล็กๆ
        สนุกๆ มุมหนึ่งของวัยรุ่นมัธยมปลาย 4 คน เมื่อ 12 ปีที่แล้ว จากคน
        ที่ชอบเล่นเว็บไซต์ เข้าเว็บนู้นทะลุเว็บนี้ นั่งแชท ICQ กันสนุกสนาน
       </p> 
       
       <p class="in">
           ก็มีความคิดว่า เอ..ทำไมไม่เห็นมีเว็บไซต์ที่รวมตัวสำหรับพวกเรา
วัยมัธยมฯ เหมือนกันเลยนะ เห็นมีแต่เว็บที่ คุยกันแบบผู้ใหญ่ ถ้ามีเว็บ
ที่เข้าไปแล้วได้รู้จักเพื่อนโรงเรียนอื่น หรือได้รู้ว่าเพื่อนวัยรุ่นคนอื่นๆ 
คิดยังไง สนใจเรื่องอะไรกันบ้าง คงจะดีไม่น้อย <span class="o">ณ วันนั้นเอง ที่ทำให้
เว็บ Dek-D.com ถือกำเนิดขึ้น ( 31 ธันวาคม 2542 )</span>
       </p>
       
       <p class="in">
       จากเว็บเล็กๆ กับเว็บมาสเตอร์หลัก 4 คน ที่ทำให้เว็บ Dek-D.com 
ก้าวขึ้นมาทุกวันนี้ ณ วันนี้ที่มีผู้เข้าชมจำนวนมาก เว็บได้ขยายความ
นิยมใหญ่โต เราจึงได้เตรียมทีมพัฒนาเว็บไซต์ที่เป็นมืออาชีพ ภายใต้
           การบริหารงานในนาม <span class="o">บริษัท Dek-D Interactive co.,Ltd.</span> ซึ่งทุกคน
ต่างมีเป้าหมายเหมือนกัน คือ การสร้างสังคมที่มี ความสุขให้แก่ชาว
เว็บ Dek-D โดยเฉพาะ 
        </p>
    </div>
    <img src="images/dekd2.jpg" class="left clear img98">
    <img src="images/dekd3.jpg" class="right img98">
    
    <div class="box1 leftm line2 clear mg0 pt15">
        <img src="images/vision.jpg">
        <h4>
            Vision</h4>
        <p class="small">ผู้นำในการใช้สื่อออนไลน์ เพื่อสร้างคุณค่า<br class="showd">
ในชีวิตให้แก่วัยรุ่น</p>
    </div>
    
    <div class="box1 leftm line2 pt15">
        <img src="images/mission.jpg">
        <h4>
            Mission</h4>
        <p class="small">ภารกิจในการเป็นสื่อกลางบูรณาการความรู้<br class="showd">
        ในการใช้ชีวิต ร่วมกับผู้อื่นทั้งด้าน ออนไลน์<br class="showd">
        และออฟไลน์สร้างเสริมโอกาสทางการศึกษา<br class="showd">
        ค้นหาความสามารถเฉพาะบุคคล</p>
    </div>
    
    <div class="box1 leftm line2 pt15">
        <img src="images/value.jpg">
        <h4>
            Value</h4>
        <p class="small">    สร้างแนวคิดและวิธีการสื่อสารที่เป็นเอกลักษณ์<br class="showd">
            ของตนเองให้การตอบสนองเสียงจากผู้ใช้อย่าง<br class="showd">
            ทั่วถึง และเท่าเทียมกันเป็นผู้รับผิดชอบด้าน<br class="showd">
            จริยธรรมในฐานะ เป็นสื่อสำหรับวัยรุ่น</p>
    </div>
    
<!--
    <div class="box1 leftm line2 pt15">
        <img src="images/--.jpg">
        <h4>
           NONONONONONONONONO</h4>
        <p class="small">NONONONONONONONONO</p>
    </div>
-->
</div><!--end profile-section-->

<hr>

<div class="u-line fa fa-angle-right fBtn" section="personality">
    <h2 class="p2 paperplane">บุคลิกของเว็บ Dek-D</h2>
</div>

<?
    if(!$isResponsive){
        include("subpages/profile/personality.php");
    }
?>

<div class="u-line fa fa-angle-right fBtn" section="portfolio">
    <h2 class="p2 rocket">ผลงานต่างๆ ของเรา</h2>
</div>
<?
    if(!$isResponsive){
        include("subpages/profile/portfolio.php");
    }
?>

</section>
<? 
    include_once('foot.php');
?>         