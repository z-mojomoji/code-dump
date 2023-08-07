<? /* <script>
  $(document).ready(function(){
  $('#register a.register-btn').on('click',function(){
  $('#popup-box').fadeIn();
  $('#bgblack').fadeIn();
  });

  //close pop up
  $('#clopop, #bgblack').on('click',function(){
  $('#popup-box').fadeOut();
  $('#bgblack').fadeOut();
  });
  });


  </script> */ ?>
<script type="text/javascript">
    $(document).ready(function() {
        popupInterest.init();
    });

</script>
<div id="popup-interest">
    <div id="popup-box">
        <a id="clopop" class="btn-pop-close"></a>
        <div class="overlay-loading">
            <div class="loader">
                <span class="loader-icon fa fa-spin fa-spinner"></span>
                <p class="loader-txt">กำลังโหลด...</p>
            </div>
        </div>
        <!--content pop up-->
        <!--green starts-->

        <div id="form-regis">
            <div id="form-head">
                <img src="images/bombom2.png" id="bombom2">
                <p class="form-head">ใครสนใจอยากมาร่วมงานบ้าง?</p>
            </div>
            <form id="form-interest">

                <div class="row">
                    <label class="ip-lb">ชื่อ - นามสกุล<span class="star">*</span></label>
                    <input class="ip-pop ip-01" name="name" type="text">
                </div>

                <div class="row">
                    <label class="ip-lb">เพศ</label>

                    <input id="radio1" type="radio" name="gender" value="male" checked="checked"><label for="radio1" class="cb-lb">ชาย</label>
                    <input id="radio2" type="radio" name="gender" value="female"><label for="radio2" class="cb-lb">หญิง</label>
                </div>

                <div class="row" id="select1">
                    <label class="ip-lb">อายุ<span class="star">*</span></label>
                    <? /* <select class="dp-sty"  onchange="changeMe(this)">
                      <option selected disabled>เลือกอายุ</option>
                      <option>ต่ำ 15</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>18 ขึินไป</option>
                      </select> */ ?>
                    <input class="ip-pop ip-01" name="age" type="text" maxlength="2">
                </div>

                <div class="row">
                    <label class="ip-lb">เบอร์โทรศัพท์</label>
                    <input class="ip-pop ip-01" name="phone" type="text" maxlength="10">
                </div>

                <div class="row">
                    <label class="ip-lb">อีเมล์<span class="star">*</span></label>
                    <input class="ip-pop ip-01" name="email" type="text">
                </div>

                <div class="row" id="select2">
                    <label class="ip-lb">จังหวัด<span class="star">*</span></label>
                    <select class="dp-sty dp-01" name="province">
                        <option selected disabled value="">เลือกจังหวัด</option>
                        <? foreach ($config['province'] as $key => $item): ?>
                            <option value="<?= $key ?>"><?= $item ?></option>
                        <? endforeach; ?>                   
                    </select>
                </div>

                <div class="row clearfix">
                    <label class="ip-lb left">อาชีพ<span class="star">*</span></label>

                    <div class="col1">
                        <input id="job1" type="radio" name="job" value="1" checked="checked"><label for="job1" class="cb-lb cb-lb02">นักเรียน/นักศึกษา</label>
                        <input id="job2" type="radio" name="job" value="2" ><label for="job2" class="cb-lb cb-lb02">ครูแนะแนว</label>
                        <input id="job3" type="radio" name="job" value="3" ><label for="job3" class="cb-lb cb-lb02">ผู้ปกครอง</label>
                        <input id="job4" type="radio" name="job" value="-1" ><label for="job4" class="cb-lb cb-lb02">อื่นๆ</label>
                    </div>
                    <div class="col2">
                        <select class="dp-sty dp-02" name="edu_level">
                            <option selected disabled value="">เลือกระดับชั้น</option>
                            <? foreach ($config['education_level'] as $key => $item): ?>
                                <option value="<?= $key ?>"><?= $item ?></option>
                            <? endforeach; ?> 
                        </select>

                        <input class="ip-pop ip-02 ip-bottom disabled" name="job_other" type="text" placeholder="โปรดระบุ">
                    </div>
                </div>

                <div class="row">
                    <label class="ip-lb">เคยมาร่วมงาน
                        ครั้งก่อนหรือไม่?<span class="green-form">(3 พฤษภาคม 2558)</span></label>

                    <input id="yes" type="radio" name="is_ever_before" value="1" checked="checked"><label for="yes" class="cb-lb">เคย</label>
                    <input id="no" type="radio" name="is_ever_before" value="0"><label for="no" class="cb-lb">ไม่เคย</label>
                </div>

                <div class="form-outer">
                    <div class="form-inner">
                        <p class="form-title">สนใจเข้าชมงานใดในครั้งนี้ ?</p>
                    </div>
                    <div id="title-des">
                        <p>สามารถเลือกได้มากกว่า 1 ข้อ</p>
                    </div>
                </div>

                <div class="box1">
                    <img src="images/rib-small.png" id="rib-small">
                    <img src="images/film.png" id="film">
                    <div class="row">
                        <input id="fair" type="checkbox" name="is_fair" value="1"><label for="fair" class="cb-lb2"><span class="dek-fair">Dek-D’s Admission Fair</span></label>
                        <div class="event-des"><p><strong>10 ตุลาคม 2558</strong> ณ ฮอลล์ 106 ไบเทค บางนา</p></div>
                    </div>
                </div>

                <div class="box2">
                    <img src="images/rib-big.png" id="rib-big">
                    <img src="images/ploy.png" id="ploy">
                    <div class="row borbt">
                        <input id="ontage1" type="checkbox" name="is_on_stage_cm" value="1"><label for="ontage1" class="cb-lb2"><span class="dek-onstage">Dek-D’s Admission On Stage</span></label>
                        <div class="event-des"><p><strong>3 ตุลาคม 2558</strong> ณ เชียงใหม่ ฮอลล์<br>
                                ศูนย์การค้าเซ็นทรัลพลาซ่าเชียงใหม่ แอร์พอร์ต</p></div>
                        <div class="arrow">
                            <p>สามารถซื้อบัตรเข้าชมงานได้ที่ <a href="http://www.dek-d.com/admission/onstage/" target="_blank">www.dek-d.com/admission/onstage/</a></p>
                        </div>
                    </div>

                    <div class="row bort">
                        <input id="ontage2" type="checkbox" name="is_on_stage_bk" value="1"><label for="ontage2" class="cb-lb2"><span class="dek-onstage">Dek-D’s Admission On Stage</span></label>
                        <div class="event-des"><p><strong>10 ตุลาคม 2558</strong> ณ ฮอลล์ 106 ไบเทค บางนา</p></div>
                        <div class="arrow">
                            <p>สามารถซื้อบัตรเข้าชมงานได้ที่ <a href="http://www.dek-d.com/admission/onstage/" target="_blank">www.dek-d.com/admission/onstage/</a></p>
                        </div>
                    </div>
                </div>

                <div class="box3">
                    <div class="row">
                        <input id="subscribe" type="checkbox" name="is_message" value="1"><label for="subscribe" class="cb-lb3">สนใจรับข้อมูลข่าวสารความเคลื่อนไหว จากบูธกิจกรรมต่างๆ<br>
                            ภายในงาน Dek-D’s Admission Fair  ผ่านอีเมล์</label>

                    </div>
                </div>

                <input class="form-submit" type="submit" value="ตกลง">

            </form>
        </div>
        <!--green ends-->
    </div>
</div>
