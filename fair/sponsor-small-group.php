<!--group 2-->

<div id="box-gr1">
    
    <!--University-->
    
    <div class="group-head">
        <p class="head10">มหาวิทยาลัย,คณะ,สถาบันการศึกษา</p>
        <p class="gr-des">ข้อมูลรับตรง-แอดฯกลาง คณะแนะนำ คณะที่กำลังเปิดรับ มาให้ข้อมูลและคำปรึกษาถึงที่!</p>
    </div>
    
    <div class="sponsor-small mb35">
        <ul class="sponsor-smalllist">

                <?
            
            for ($i=0; $i < count($booth["booth0"]); $i++){
                
                $category = $booth["booth0"]["shop".$i]["category"];
                
                if( $category == 'university'){
                    echo '<li>
                    <div class="sss-img">
                        <div class="star"></div>
                        <a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth0"]["shop".$i]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank">'.$booth["booth0"]["shop".$i]["name"].'</a></h5>
                        <p>'.$booth["booth0"]["shop".$i]["desc"].'
                       </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }

            }

            for ($n=0; $n < count($booth["booth1"]); $n++){
                
                 $category2 = $booth["booth1"]["shop".$n]["category"];
                if( $category2 == 'university'){
                    echo'<li>
                    <div class="sss-img">
                        <a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth1"]["shop".$n]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank">'.$booth["booth1"]["shop".$n]["name"].'</a></h5>
                        <p>'.$booth["booth1"]["shop".$n]["desc"].'
    </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }
            }

            ?>
        
        </ul>

        <div class="clear"></div>
    </div>
    <!--end 1 category University-->
    
    <!--Tutor-->
    
    <div class="group-head">
        <p class="head10">ติวเตอร์, แนะแนว, เรียนต่อต่างประเทศ</p>
        <p class="gr-des">ค้นหาติวเตอร์ที่เหมาะกับคุณ สอบถามคอร์ส และโปรโมชั่นต่างๆ ได้อย่างใกล้ชิด</p>
    </div>
    
    <div class="sponsor-small mb35">
        <ul class="sponsor-smalllist">

            <?
            for ($i=0; $i < count($booth["booth0"]); $i++){
                
                $category = $booth["booth0"]["shop".$i]["category"];
                
                if( $category == 'tutorial'){
                    echo '<li>
                    <div class="sss-img">
                        <div class="star"></div>
                        <a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth0"]["shop".$i]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank">'.$booth["booth0"]["shop".$i]["name"].'</a></h5>
                        <p>'.$booth["booth0"]["shop".$i]["desc"].'
                       </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }

            }

            for ($n=0; $n < count($booth["booth1"]); $n++){
                
                 $category2 = $booth["booth1"]["shop".$n]["category"];
                if( $category2 == 'tutorial'){
                    echo'<li>
                    <div class="sss-img">
                        <a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth1"]["shop".$n]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank">'.$booth["booth1"]["shop".$n]["name"].'</a></h5>
                        <p>'.$booth["booth1"]["shop".$n]["desc"].'
    </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }
            }?>

        </ul>

        <div class="clear"></div>
    </div>
    
    <!--end 1 category Tutor-->
    
    <!--Utilities-->
    
    <div class="group-head">
        <p class="head10">ของใช้ อาหารและเครื่องดื่ม</p>
        <p class="gr-des"> ของใช้ดี ของใช้เด็ด น่ารักกุ๊กกิ๊ก อาหารและเครื่องดื่มเพิ่มความสดชื่นสำหรับน้องๆ ม.ปลาย</p>
    </div>
    
    <div class="sponsor-small mb35">
        <ul class="sponsor-smalllist">

            <?
            for ($i=0; $i < count($booth["booth0"]); $i++){
                
                $category = $booth["booth0"]["shop".$i]["category"];
                
                if( $category == 'material'){
                    echo '<li>
                    <div class="sss-img">
                        <div class="star"></div>
                        <a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth0"]["shop".$i]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank">'.$booth["booth0"]["shop".$i]["name"].'</a></h5>
                        <p>'.$booth["booth0"]["shop".$i]["desc"].'
                       </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }

            }

            for ($n=0; $n < count($booth["booth1"]); $n++){
                
                 $category2 = $booth["booth1"]["shop".$n]["category"];
                if( $category2 == 'material'){
                    echo'<li>
                    <div class="sss-img">
                        <a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth1"]["shop".$n]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank">'.$booth["booth1"]["shop".$n]["name"].'</a></h5>
                        <p>'.$booth["booth1"]["shop".$n]["desc"].'
    </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }
            }?>
            

        </ul>

        <div class="clear"></div>
    </div>
    
    <!--end 1 category Material-->
    
    <!--Publisher-->
    
    <div class="group-head">
        <p class="head10">สำนักพิมพ์ หนังสือแอดมิชชั่น</p>
        <p class="gr-des">หนังสือเตรียมสอบ เฉลยข้อสอบแอดมิชชั่น ราคาพิเศษเฉพาะในงาน!</p>
    </div>
    
    <div class="sponsor-small mb35">
        <ul class="sponsor-smalllist">

            
<?
            for ($i=0; $i < count($booth["booth0"]); $i++){
                
                $category = $booth["booth0"]["shop".$i]["category"];
                
                if( $category == 'publisher'){
                    echo '<li>
                    <div class="sss-img">
                        <div class="star"></div>
                        <a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth0"]["shop".$i]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank">'.$booth["booth0"]["shop".$i]["name"].'</a></h5>
                        <p>'.$booth["booth0"]["shop".$i]["desc"].'
                       </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }

            }

            for ($n=0; $n < count($booth["booth1"]); $n++){
                
                 $category2 = $booth["booth1"]["shop".$n]["category"];
                if( $category2 == 'publisher'){
                    echo'<li>
                    <div class="sss-img">
                        <a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth1"]["shop".$n]["pic"].'"/></a>
                    </div>

                    <div class="sss-des">
                        <h5 class="alignleft"><a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank">'.$booth["booth1"]["shop".$n]["name"].'</a></h5>
                        <p>'.$booth["booth1"]["shop".$n]["desc"].'
    </p>
                    </div>

                    <div class="clear"></div>
                </li>';
                }
            }?>

        </ul>

        <div class="clear"></div>
    </div>
    
    <!--end 1 category Pub-->
    
</div>

<!--group 2-->

<div class="clear"></div>
        
    <div class="grey-head"></div>

    <!--dek-d list-->
     <div class="sponsor-small" style="padding-top: 25px;">
        <ul class="sponsor-smalllist">

            <!--Dek-D Book store-->

            <li>
                <div class="sss-img">
                    <a href="http://www.dek-d.com/store/book/" target="_blank"><img src="images/sponsors/book.jpg"/></a>
                </div>

                <div class="sss-des">
                    <h5 class="alignleft orange"><a href="http://www.dek-d.com/store/book/" target="_blank">Dek-D's Book Store</a></h5>
                    <p>หนังสือดีๆของ Dek-D ขนขบวนมาลดราคาพิเศษ ทั้ง Admission ขั้นเทพ, หนังสือสู้ศึกเข้าคณะหมอ, หมอฟัน, เภสัช, วิศวฯ, บัญชี/บริหาร และเรียนต่อญี่ปุ่น</p>
                </div>

                <div class="clear"></div>
            </li>

            <!--Dek-D Book store-->

            <li>
                <div class="sss-img">
                    <a href="http://www.dek-d.com/store/" target="_blank"><img src="images/sponsors/store.jpg"/></a>
                </div>

                <div class="sss-des">
                    <h5 class="alignleft orange"><a href="http://www.dek-d.com/store/" target="_blank">Dek-D's Gift Store</a></h5>
                    <p>ของที่ระลึกน่ารัก ขายดี จาก Dek-D.com นำทีมโดย เข็มกลัดจงติด ถุงผ้าลดโลกร้อน สมุดโน้ต Dek-D และอื่นๆ อีกเพียบ</p>
                </div>

                <div class="clear"></div>
            </li>
         </ul>
    </div>
    <!--dek-d list end-->

    <div class="tobecon">

        <p>ติดตามบูธอัพเดท เร็ว ๆ นี้</p>

        <a href="http://www.dek-d.com/advertising/fair.php" target="_blank" class="center" style="padding-top: 20px;">
            <img src="images/ads1.jpg"/>
        </a>

    </div>

</div><!--right-box-->

<div class="clear"></div>
</div><!--mid-content-->

</div><!--sponsor-wrapper-->



<script>
    var grthis = 0;
    $('#tab_gr').on('mouseover', '.btn-gr', function () {
        var grnum = $(this).attr('grnum');
        var poleft = grnum * 130;
        $('#tab_gr ul').animate({
            backgroundPositionX: poleft
        }, {
            duration: 200,
            queue: false
        });
    }).on('mouseout', '.btn-gr', function () {
        var poleft = grthis * 130;
        $('#tab_gr ul').animate({
            backgroundPositionX: poleft
        }, {
            duration: 200,
            queue: false
        });
    }).on('click', '.btn-gr', function () {
        var grnum = $(this).attr('grnum');
        var poleft = grnum * 130;
        $('#tab_gr ul').animate({
            backgroundPositionX: poleft
        }, {
            duration: 200,
            queue: false
        });

        if (grnum != grthis) {
            if (grnum == 0) {
                $('#box-gr0').slideDown();
                $('#box-gr1').slideUp();
                /*$('.aside').animate({
                    minHeight: 3440
                }, {
                    duration: 200,
                    queue: false
                });*/
            } else if (grnum == 1) {
                $('#box-gr0').slideUp();
                $('#box-gr1').slideDown();
                /*$('.aside').animate({
                    minHeight: 4150
                }, {
                    duration: 200,
                    queue: false
                });*/
            }
        }
        grthis = grnum;
    });
</script>