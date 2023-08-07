<? //header('Content-Type: text/html; charset=utf-8');
include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
require_once '/webroot/www/main/myLib/login.inc.php';
include '/webroot/www/main/myLib/vote/lib.inc.php'; 
include_once("/webroot/ddfw/system/libraries/Mobile_Detect.php");
include_once '/webroot/ddfw/system/third_party/facebook/src/facebook.php';
$navpage="positionNav";
$subpageName="board";
$statName="ad_position_board";
$pageName="position";
$title="Dek-D.com : ตำแหน่งโฆษณา Advertising Board + Lifestyle";

addCookie();
$mobileDetect = new Mobile_Detect();
$isResponsive = ( $mobileDetect->isMobile() && !$mobileDetect->isTablet() );
include_once('head.php')
?>


<section class="content content3" page="board">
   <!--content starts-->
     
         
  <div class="u-line">
        <h2 class="p3 pin">ตำแหน่งโฆษณา Board + Lifestyle</h2>
    </div>
    <div class="con-wrap2 clearfix" id="admission-section">
        <a href="http://www.dek-d.com/board/" target="_blank" title="Dek-D's Board" alt="Dek-D's Board"><img src="images/board/ad-board01.jpg" class="shadow left img98 center"></a>
        
        <div class="box2-2 right line1 mg0 w100">
            <div class="box1 line2 leftm mg0 pb0m">
               <p class="h5">หน้านี้คืออะไร</p>
                <img src="images/pageinfo.jpg">
                <p class="pb10 pt2d">
                เว็บบอร์ดแห่งเดียวที่เต็มไปด้วย วัยรุ่น<br class="showd">
                มัธยมฯ-มหาวิทยาลัย มากที่สุดเพื่อการ<br class="showd">
                แลกเปลี่ยนความเห็นติดตามข่าวสาร<br class="showd">
                อินเทรนด์ถามตอบข้อสงสัย</p>
            </div>
            
            <div class="box1 line2 leftm pb0m">
               <p class="h5">เหมาะกับสินค้าอะไร ?</p>
                <img src="images/branding.jpg">
                <p class="pb10 pt2d">
                เหมาะสำหรับสินค้าและบริการทุกชนิดที่<br class="showd">
                ต้องการความคุ้มค่าเพราะเพจวิวสูงและ<br class="showd">
                ครอบคลุมผู้ใช้ Dek-D กว่า 100% ตลอด<br class="showd">
                ช่วงอายุผู้เข้าชม ทุกเพศ และทุกความสนใจ </p>
            </div>
            
            <hr class="mb20">
            <p class="h5">สถิติผู้เข้าชมหน้านี้</p>
            <div class="picsidebox line1 leftm mg0">
                <img src="images/pageview.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block">
                <span class="num-big">25 ล้าน</span><br>
                <span class="scale">Pageviews/เดือน</span><br>
                <span class="small">สถิติอ้างอิงจากเดือน</span>
                    <span class="small small-grey">ก.ค. - ก.ย. 58</span></p>
            </div>
            
            <div class="picsidebox line1 leftm">
                <img src="images/uip.jpg" class="inline-block">
                <p class="desc pb10 pt2 inline-block" id="picsidebox2">
                <span class="num-big">2.5 ล้าน</span><br>
                <span class="scale">UIP/เดือน</span></p>
            </div>
            
            <a class="clear compare" target="_blank">เปรียบเทียบสถิติกับหมวดอื่น คลิ๊กที่นี้</a>
            
             <hr class="mb20">
            <p class="h5">แสดงผลที่ 4 กลุ่มหน้านี้</p>
            <div class="iconbox line1 leftm mg0 pb8">
                <i class="bubble-ic pen"></i>
                <p>หน้าแสดงรายชื่อกระทู้<br>
                   <span class="small-grey small">แสดงผลในหมวดหลัก</span><span class="red small">*</span>
                </p>
                   <ul class="bubble-bul-list clearfix board">
                      <li>บอร์ดมีสาระ</li>
                    <li>บอร์ดบันเทิง</li>
                      <li>บอร์ดมีรูปเด็ด</li>
                      <li>บอร์ดปัญหาวัยรุ่น</li>
                      <li>บอร์ดการ์ตูน/เกม/กีฬา</li>
                       
                   </ul>
            </div>
            
            
            <div class="iconbox line2 rightm mg0">
                <i class="bubble-ic note"></i>
                <p>หน้าอ่านกระทู้ <br>
                    <span class="small-grey small">
                        แสดงผลในหมวดเดียวกับหน้าแสดงกระทู้ 
                    </span>
                </p>
            </div>
            
            <div class="iconbox line1 leftm pb8 clear">
                <i class="bubble-ic speech"></i>
                <p>หน้าแสดงรายชื่อบทความ<br>
                หมวดดังนี้
                </p>
                    <ul class="bubble-bul-list clearfix lifestyle">
                      <li>บันเทิง</li>
                       <li>อัปเดต/รีวิว</li>
                      <li>คนน่ารัก</li>
                       
                   </ul>
            </div>
            
            <div class="iconbox line2 rightm">
                <i class="bubble-ic book v-top"></i>
                <p>หน้าอ่านบทความหมวด<br>
                   ไลฟ์สไตล์<br>
                    <span class="small-grey small" style="display:block;">แสดงผลในหมวดเดียวกับหน้า<br>
                    แสดงรายชื่อบทความ</span>
                </p>
            </div>
            
            <div class="clear"></div>
            
            <p class="small small-grey clear inline leftm">
                <span class="red">&nbsp;&nbsp;*</span>
                <strong>หมวดหลักที่ยกเว้น</strong>
            </p>
            <ul class="list-note clearfix inline-note">
                <li>NUGIRL</li>
                <li>รับตรง/แอดมิชชั่น</li>
                <li>รร.+ติวเตอร์</li>
                <li>เรียนต่อนอก</li>
                <li> นิยาย-นักเขียน</li>
            </ul>
            <br class="showd">
            <i class="clear">
            
        </div><!--content txt box-->
    
    </div><!--admission-section-->
    
    <hr>
    
    <div class="u-line fa fa-angle-right fBtn" section="position">
        <h2 class="p3 star">แผนผังตำแหน่งโฆษณา</h2>
    </div>
    
    <? 
        if(!$isResponsive){
            include('subpages/board/position.php');
        }
    ?>  
    
    
    <div class="u-line fa fa-angle-right clearfix">
          <a id="tableBtn" href="#" target="_blank"></a>
        <h2 class="p3 graph left">ตารางเปรียบเทียบค่าใช้จ่าย</h2>
        <span class="effected">Effective : 1 Jan 2016</span>
    </div>
    
    
     <? 
        if(!$isResponsive){
            include('subpages/table/board-table.php');
        }
    
    include_once ('stepandrules.php');?>
       
</section>
<? 
    include_once('foot.php');
?>       