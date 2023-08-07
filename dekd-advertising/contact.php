<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';

$title="Dek-D.com : ติดต่อฝ่ายขายโฆษณา";
$pageName="contact";
$statName="ad_contactus";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>

   <!--content starts-->
      
<section class="content content2" page="contact">
      
  <div class="u-line">
        <h2 class="p2 gear">ขั้นตอนเมื่อสนใจลงโฆษณา</h2>
    </div>

       <? include('subpages/contact.php');?>
        
        <div class="u-line expand" section="rule">
            <h2 class="p2 rules">เงื่อนไขการลงโฆษณา</h2>
        </div>
        
        <?
//            if(!$isResponsive){
//                include("subpages/rule.php");
//            }
                include("subpages/rule.php");
        ?>
<!--
        <div class="con-wrap clearfix" id="rule-section">
            <ul class="g-num">
                
                <li>
                  <span>โปรดตรวจสอบโปรโมชั่นล่าสุด</span>
                   <p>ข้อมูลบนเว็บไซต์อาจยังไม่ได้รับการอัพเดทล่าสุด  ผู้ที่สนใจลงโฆษณาโปรด
โทรติดต่อเพื่อสอบถามตำแหน่ง ราคาและโปรโมชั่นล่าสุด เว็บไซต์ขอสงวนสิทธิ์
ในการเปลี่ยนแปลงราคา และโปรโมชั่น โดยไม่ต้องแจ้งให้ทราบล่วงหน้า 
</p>
                    
                </li>
                <li>
                <span>เว็บไซต์ Dek-D.com ขอสงวนสิทธิ์ในการไม่รับ
ลงโฆษณาดังต่อไปนี้ ในทุกตำแหน่ง</span>
               <ul class="g-bul">
                    <li>ไม่รับลงโฆษณาสินค้าประเภทเครื่องสำอางทุกชนิด</li>
                    <li>ไม่รับลงโฆษณาสินค้าหรือบริการเกี่ยวกับการผลิตภัณฑ์ควบคุมน้ำหนัก ลดความอ้วน</li>
                    <li>ไม่รับลงโฆษณาที่เกี่ยวข้องกับ งาน-ตำแหน่งงาน รายได้เสริม <br class="showd">
รายได้พิเศษ ประเภท MLM<br class="showd">
                    <li>โฆษณาประเภทอื่นๆ ที่มีการโพสข้อมูลที่เยอะเกินไป<br class="showd">จนทำให้เกิดความรำคาญต่อผู้เข้าชม</li>
                    <li>ไม่รับลงโฆษณาทุกประเภทที่ไม่เหมาะสำหรับเยาวชน</li>
                    <li>ไม่รับลงโฆษณาประเภทผิดกฎหมายแพ่ง อาญา กฎหมายลิขสิทธิ์ ศีลธรรม ของไทย</li>
                </ul>
               </li>
            </ul>
        </div>end rule-section
-->
</section>

<? 
    include_once('foot.php');
?>       