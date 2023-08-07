<!DOCTYPE html>
<html>
<head>
	<title>Dek-D.com : ตารางราคาหน้าต่าง ๆ ของเว็บ Dek-D </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?
        include_once('/webroot/ddfw/utf8/ddutf8.inc.php'); 
        include ('menuLists.php');
        $position_nested = $menu_advertising['position']['nested']; //variable from menuLists.php
        $profile_nested = $menu_advertising['profile']['nested'];
    ?>
	<meta name="keywords" content="โฆษณา, ads, ข่าวโฆษณา, banner, บริษัทโฆษณา, โฆษณาไทย, โฆษณาเว็บ, promote, โปรโมท, โปรโมทเว็บ, เป้าหมาย" />
	<meta name="description" content="สื่อโฆษณา ออนไลน์ สำหรับวัยรุ่น ซึ่งผู้เข้าชมหลักนั้นได้แก่ กลุ่มวัยรุ่น วัยเรียน ตั้งแต่วัย 12-23 ปี  และกลุ่มผู้เข้าชมรอง ได้แก่ กลุ่มผู้ปกครอง ครูอาจารย์ และบุคคลทั่วไป"/>
	<link href="css/style.css?v=1" rel="stylesheet" type="text/css" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	
	<link href="/assets/vendor/fontawesome4/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    
    <!--footer-->
        <link href="http://www0.dek-d.com/assets/homepage/css/2015dekdSocialPopup.css?v=" rel="stylesheet" type="text/css" />
         
            <link href="http://www0.dek-d.com/assets/toolbar/css/toolbar_desktop_2015.css?v=1.2" rel="stylesheet" type="text/css" />
        <style>
       @import url("http://www0.dek-d.com/assets/homepage/css/footer.css");
        
       </style>
        <script type="text/javascript" src="http://www0.dek-d.com/assets/homepage/js/2015dekdSocialPopup.js?v="></script>
        
</head>



<?
    include('/webroot/www/main/application/modules/toolbar/views/index_2015.php');//toolbar desktop?>
    <div id="ads-wrapper">
<?
    include('nav.php');
    $table = $_GET["table"];
   $tablenum = $_GET["num"];
        
?>      


  
   <section class="content content3-1">
       
       <?
           
           if($table == 'abroad'){
               
               include('subpages/table/table-head.php');
               include('subpages/table/abroad-table.php');
           }elseif ($table == 'admission'){
               include('subpages/table/table-head.php');
               include('subpages/table/admission-table.php');
           }elseif ($table == 'board'){
               include('subpages/table/table-head.php');
               include('subpages/table/board-table.php');
           }elseif ($table == 'education'){
               if($tablenum == 1){
                   include('subpages/table/education-show-table.php');
               }else{
                   include('subpages/table/table-head.php');
                   include('subpages/table/education-table.php');
               }
           }elseif ($table == 'fair'){
               include('subpages/table/table-head.php');
               include('subpages/table/fair-table.php');
           }elseif ($table == 'home'){
               include('subpages/table/table-head.php');
               include('subpages/table/home-table.php');
           }elseif ($table == 'mobile'){
               include('subpages/table/table-head.php');
               include('subpages/table/mobile-table.php');
           }elseif ($table == 'nugirl'){
               include('subpages/table/table-head.php');
               include('subpages/table/nugirl-table.php');
           }elseif ($table == 'writer'){
               include('subpages/table/table-head.php');
               include('subpages/table/writer-table.php');
           }elseif ($table == 'compare'){
               //include('subpages/table/table-head.php');
               include('subpages/table/compare-table.php');
           }
       ?>
       
   </section>
   
    
<?
include('foot.php');
?>