<style>
.mbitec{ cursor:pointer;}
#mapbitec{ 
    position:fixed; 
    top:50%; 
    margin-top:-298px; 
    left:50%; 
    margin-left:-500px; 
    display:none; 
    z-index:101;}
    
#mclo{
    width: 30px; 
    height: 30px; 
    display:none;
    background: url(images/btn_xclo.png) no-repeat;
	background-position: 0 top; 
    cursor: pointer; 
    position:fixed; 
    top:50%; 
    margin-top:-293px; 
    left:50%; 
    margin-left:465px; 
    z-index:102;}
#mclo:hover{background-position:0 bottom;}
#bbg2{width:100%; height:100%; position:fixed; top:0; left:0; background:rgba(0,0,0,0.8); z-index:100; display:none;}

a#bus-button{
    background-color: #99d01a;
    border-radius: 5px;
    box-shadow: 0 3px 0 #81ae15;
    -webkit-box-shadow: 0 3px 0 #81ae15;
    -moz-box-shadow: 0 3px 0 #81ae15;
    color: #fff;
    display: block;
    font-size: 20px;
    padding: 10px;
    position: relative;
    text-align: center;
    text-shadow: 1px 1px #8bbd17;
    -moz-text-shadow: 1px 1px #8bbd17;
    width: 212px;
    margin: 0 auto;
}
    
a#bus-button:hover{
    top:3px;
    box-shadow: 0 0px 0 #fff;
}
    
    
</style>

<div id="bbg2"></div>
<a id="mclo"></a>
<img src="images/bitec_map.gif" id="mapbitec"/>


<div id="all-map">
    <div id="box-map-left">
    <ul id="map-go">
        <li>
            <!--bts-->
            <div class="box2go">
                <p class="head8">การเดินทางโดยรถไฟฟ้า BTS</p>

                <div class="trans-step">
                <!--step 1-->
                <div class="bts-steps">
                    <span class="step-num">1</span>
                    <img src="images/go1_1.jpg">
                    <p>ลงรถไฟฟ้า BTS สถานีบางนา ทางออกที่ 1</p>
                </div>

                    <!--step 2-->
                <div class="bts-steps">
                    <span class="step-num">2</span>
                    <img src="images/go1_2.jpg">
                    <p>เดินย้อนมาทางฟุตบาท จะผ่านสะพานข้ามคลอง จนถึงประตูทางเข้าไบเทค </p>
                </div>

                    <!--step 3-->
                <div class="bts-steps">
                    <span class="step-num">3</span>
                    <img src="images/go1_3.jpg">
                    <p>จุดนี้จะมีรถรับส่ง Shuttle Bus "ไปงาน Dek-D" หรือจะเดิน
    ทะลุผ่านแต่ละอาคารด้วยทางเลื่อนจนถึง EH106 ก็ได้(20นาที)
    <a style=" color:#99d01a;" class="mbitec">ดูแผนที่ไบเทค</a></p>
                </div>

                </div><!--trans-step-->
            </div><!--box2go-->

        </li><!--bts-->

        <li>
             <!--bus-->

            <div class="box2go">
                <p class="head8">การเดินทางโดยรถเมล์</p>

                <div class="trans-step">
                <!--step 1-->
                <div class="bts-steps">
                    <img src="images/go2_1.jpg">
                    <p class="exits">ทางเข้า-ออกที่ 1 และ 2</p>
                    <p>สามารถเดินทางโดยรถประจำทางสาย 38, 46, 48, 132, 133, 139, 180, ปอ.552, 552A ซึ่งจะจอดรถโดยสารที่ถนนบางนา ตราด กม.1</p>
                </div>

                    <!--step 2-->
                <div class="bts-steps">
                    <img src="images/go2_2.jpg">
                    <p class="exits">ทางเข้า-ออกที่ 3</p>
                    <p>สามารถเดินทางโดยรถประจำทางสาย 2, 23, 25, 45, 115, 116, ปอ.102, 129, 142, 507, 508, 511, 513, 536, 544, 545, 552A ซึ่งจะจอดรถโดยสารที่ถนนสุขุมวิท</p>
                </div>


                </div><!--trans-step-->
            </div><!--box2go-->
        </li><!--bus-->

        <li>
             <!--car-->

            <div class="box2go">
                <p class="head8">การเดินทางโดยรถยนต์</p>

                <div class="trans-step">
                    <p class="cars">ใช้ทางด่วน สามารถขึ้นทางด่วนเฉลิมมหานคร ลงที่ด่านบางนา (ตามป้าย "สมุทรปราการ") ลงจากทางด่วนแล้วชิดซ้ายเข้าไบเทคทางประตู 3</p>

                    <p class="cars">ใช้ถนนบางนา-ตราด เดินทางจากชลบุรีหรือถนนกาญจนาภิเษก ออกทางขนานบริเวณ กม.ที่ 2 จากนั้นเลี้ยวซ้ายเข้าไบเทคทางประตู 1 หรือ 2</p>

                    <p class="cars">ถนนสุขุมวิท เดินทางจากในเมืองตรงผ่านแยกบางนาแล้วเลี้ยวซ้ายเข้าไบเทคทางประตู 3</p>

                <img src="images/go1_3.jpg"/>
                </div><!--trans-step-->
            </div><!--box2go-->
        </li><!--car-->

        <li>
             <!--van-->

            <div class="box2go">
                <p class="head8">การเดินทางโดยรถตู้</p>

                <div class="trans-step">
                        <p class="vans">สามารถเดินทางมายังไบเทคโดยรถตู้ประจำทางได้จาก</p>
                        <div class="listcar">สถานีขนส่งสายใต้</div>
                        <div class="listcar">ยมราช</div>
                        <div class="listcar">สนามหลวง</div>
                        <div class="listcar">พาต้าปิ่นเกล้า</div>
                        <div class="listcar">สถานีขนส่งหมอชิต</div>
                        <div class="listcar">รังสิต</div>
                        <div class="listcar">ดินแดง</div>
                        <div class="listcar">สุทธิสาร</div>
                        <div class="listcar">แยกลาดพร้าว</div>
                        <div class="listcar">สวนจตุจักร</div>
                        <div class="listcar">หลักสี่</div>
                        <div class="listcar">ดอนเมือง</div>
                        <div class="listcar">ฟิวเจอร์พาร์ครังสิต</div>
                        <div class="clear" style="padding: 5px 0px;"></div>
                        <p class="vans">โดยจุดจอดรถตู้จะอยู่ใกล้กับสี่แยกบางนา ซึ่งจะมีจุดจอดรถ Shuttle Bus ของ Dek-D ให้บริการรับส่งเข้างานฟรีตลอดทั้งวัน</p>
                    <a class="mbitec" id="bus-button">ดูเส้นทางเดินรถ คลิก!</a>
                        <!--<a class="mbitec" title="เส้นทางเดินรถ Shuttle Bus" style="margin-top: 10px; display:block;"><img src="images/bus.png"></a>-->
                </div><!--trans-step-->
            </div><!--box2go-->
        </li><!--van-->

    </ul>

</div><!--end of box-map-left-->
    

<script>
$('#bbg2').on('click',function(){
	$('#bbg2').fadeOut();
	$('#mapbitec').fadeOut();
	$('#mclo').fadeOut();
});

// map bitec
$('.mbitec').on('click',function(){
	$('#mapbitec').fadeIn();
	$('#bbg2').fadeIn();
	$('#mclo').fadeIn();
});
$('#mclo').on('click',function(){
	$('#mapbitec').fadeOut();
	$('#bbg2').fadeOut();
	$('#mclo').fadeOut();
});
</script>