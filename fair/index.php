<?
include_once('/webroot/ddfw/utf8/ddutf8.inc.php');
require_once('/webroot/ddfw/system/libraries/Board.php');
require_once('config.php');
require_once('Fair.php');
$Fair = new Fair();
$board = new Board();
$listBoard = $board->listingNew( array( 11 => 26 ) , 0 , 5 );
$interestCount = $Fair->getCountInterest();
?>
<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@webdekd">
        <meta name="twitter:title" content="Dek-D's Admission แอดมิชชั่นติดชัวร์">
        <meta name="twitter:description" content="เตรียมพบกับบูธบริการจากเด็กดีที่จะช่วยน้องๆ แอดมิชชั่นเข้ามหาวิทยาลัยแบบมั่นใจและไม่เหนื่อยมาก พร้อมบูธสินค้าและบริการแอดมิชชั่นต่างๆ อีกเพียบ วันที่ 10 ต.ค.นี้ ที่ไบเทคบางนา งานนี้เข้าฟรีจ้า!">
        <meta name="twitter:creator" content="@webdekd">
        <meta name="twitter:image:src" content="http://www0.dek-d.com/admission/fair/images/fair-og.png">
        <meta name="twitter:domain" content="http://www.dek-d.com/admission/fair/">

        <meta property="og:title" content="<?= htmlspecialchars( 'มาแล้ว แอดมิชชั่นแฟร์ที่เด็ก ม.ปลาย รอคอย!' ) ?>">
        <meta property="og:site_name" content="Dek-D.com > Admission Fair">
        <meta property="og:image" content="http://www0.dek-d.com/admission/fair/images/fair-og.png">
        <meta property="og:description" content="เตรียมพบกับบูธบริการจากเด็กดีที่จะช่วยน้องๆ แอดมิชชั่นเข้ามหาวิทยาลัยแบบมั่นใจและไม่เหนื่อยมาก พร้อมบูธสินค้าและบริการแอดมิชชั่นต่างๆ อีกเพียบ วันที่ 10 ต.ค.นี้ ที่ไบเทคบางนา งานนี้เข้าฟรีจ้า!">

        <title>Dek-D Admission Fair แอดมิชชั่นติดชัวร์</title>

        <link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/assets/vendor/fontawesome4/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://www0.dek-d.com/assets/vendor/animate/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/f1058_style.css?ver=1.4">

        <script type="text/javascript" src="http://www0.dek-d.com/assets/global/js/jquery-latest.min.js"></script>

        <script type="text/javascript" src="js/timeline.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
        <script type="text/javascript" src="js/transport.js"></script>
        <script type="text/javascript" src="js/interest.js"></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54e163516044a66b" async="async"></script> 

        <!--[if IE]>
        <style>
            .onebooth p.forie{
                display: block !important;
                width: 220px;
                text-align: center;
                margin: 0px auto;
                font-size: 13px;
                color: #75920e;
                font-weight: bold !important;
                padding-top: 5px;
            }

           .booth-img img {
                width: 100%;
                padding: 0;
            }
            .booth-img > div.booth-logo {
                display:none;
            }

            .booth-img > div.booth-logo img{
               display:none;
            }

            .booth-img:hover > div.booth-logo {
                display: none;
            }

            .banner-img img {
                width: 100%;
                padding: 0;
            }
            .banner-img > div.banner-big {
                display:none;
            }

            .banner-img:hover > div.banner-big {
                display:none;
            }

            .banner-img > div.banner-big a{
                display:none;
            }

            p.top-text{
                display:none;
            }

            p.desc-text{
                display:none;
            }

            .banner-big a.title-desc{
               display:none;
            }

            .banner-big a p{
               display:none;
            }

            .banner-big a.forbig{
                display:none;
            }

            div.time-box{
                background-color: #FFF;
                border: 2px solid #F1F1F1;
                width: 292px;
                padding: 0px 0px 15px;
                float: left;
                margin: 0px 14px;
                -webkit-transition: -webkit-transform 2s;
                transition: transform 2s ease; 
                position: relative;
            }

            div.time-box:hover{
                top:-2px;
            }
        </style>
        <![endif]-->

    </head>

    <body>
        <div id="fair-wrap">

            <?
            include 'popup.php';
            include 'head.php';
            include 'peopleofinterest.php';
            include 'booth.php';
            include 'sponsor-big.php';
            include 'sponsor-small-ads.php';
            include 'sponsor-small-group.php';
            include 'time.php';
            include 'transport-menu.php';
            include 'transport-steps.php';
            include 'transport-map.php';
            include 'map.php';
            include 'board.php';
            include 'social.php';
            include 'fair-tag.php';
            include 'banner-slider.php';
            include 'foot-banner.php';
            include 'footer.php';
            ?>
        </div><!--fair-wrap-->
        <div id="bgblack"></div>
    </body>


</html>