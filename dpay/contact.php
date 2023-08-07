<?php
    include('head.php');
?>
    <div class="rightCol right content">
        <!--starts here-->

            <h1>Contact us <span>ติดต่อเรา</span></h1>
            <form class="contact" action="thanks.php" method="POST" id="contact">
            <input type="hidden" name="page" value="มีผู้ต้องการติดต่อ" />
            <input type="hidden" name="address" value="" />
            <input type="hidden" name="gender" value="" />
            <input type="hidden" name="province" value="" />
            <input type="hidden" name="country" value="" />
            <fieldset class="row2 noneF">
                <legend></legend>
                <p>
                    <label for="firstname">ชื่อ *</label>
                    <input type="text" class="longer" id="firstname" name="firstname" minlength="3" required/>
                    <span></span>
                </p>
                <p>
                    <label for="lastname">นามสกุล *</label>
                    <input type="text" class="longer" id="lastname" minlength="3" name="lastname" required/>
                    <span></span>
                </p>
                <p>
                    <label for="phone">เบอร์โทรศัพท์ *</label>
                    <input type="text" class="longer" maxlength="10" id="phone" name="phone" onkeypress="return isNumber(event)" required/>
                    <span></span>
                </p>
                <p>
                    <label for="email">Email *</label>
                    <input type="email" class="longer" name="email" id="email" required/>
                    <span></span>
                </p>
                <p>
                    <label for="message">ข้อความ *</label>
                    <textarea name="message" id="message" cols="48" rows="10"></textarea>
                </p>
                <button class="button right" value="Submit" type="submit">ส่งข้อความ &raquo;</button>
                </fieldset>

        </form>
        <!--ends here-->
    </div>
    <!--rightCol-->
<?php
    include('foot.php');
?>
