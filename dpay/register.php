<?php 
    include('head.php');           
?>
    <div class="rightCol right content">
        <!--starts here-->

            <h1>Registration</h1>
            <form class="register" action="thanks.php" method="POST" id="register">
            <input type="hidden" name="page" value="มีผู้สนใจตู้" />
            <input type="hidden" name="message" value="" />
            <fieldset class="row2">
                <legend>Personal Details</legend>
                <p>
                    <label for="firstname">ชื่อ *</label>
                    <input type="text" class="long" id="firstname" name="firstname" minlength="3" required/>
                    <span></span>
                </p>
                <p>
                    <label for="lastname">นามสกุล *</label>
                    <input type="text" class="long" id="lastname" minlength="3" name="lastname" required/>
                    <span></span>
                </p>
                <p>
                    <label for="phone">เบอร์โทรศัพท์ *</label>
                    <input type="text" class="long" maxlength="10" id="phone" name="phone" onkeypress="return isNumber(event)" required/>
                    <span></span>
                </p>
                <p>
                    <label for="email">Email *</label>
                    <input type="email" class="long" name="email" id="email" required/>
                    <span></span>
                </p>
                <p>
                    <label for="address">ที่อยู่ *</label>
                    <input type="text" class="long" id="street" name="address" required/>
                    <span></span>
                </p>
                <p>
                    <label for="province">จังหวัด *</label>
                    <input type="text" class="long" id="city" name="province" required/>
                    <span></span>
                </p>
                <p>
                    <label for="country">ประเทศ *</label>
                    <?php include('country_list.php'); ?>
                    <span></span>
                </p>
<!--
                <p>
                    <label class="optional">Website</label>
                    <input class="long" type="text" value="http://"/>
                </p>
-->
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label for="gender">เพศ *</label>
                    <input type="radio" value="m" name="gender" required/>
                    <label class="gender" for="male">ชาย</label>
                    <input type="radio" value="f" name="gender"/>
                    <label class="gender" for="female">หญิง</label>
                    <span></span>
                </p>
                <p>
                    <label for="bDay">วันเกิด
                    </label>
                    <select class="date" id="bDate" name="bDay">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select id="month" name="bDay">
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
                    <input class="year" type="text" size="4" maxlength="4" minlength="4" id="year" name="bDay" onkeypress="return isNumber(event)"/>e.g 1976
                    <span></span>
                </p>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Conditions
                </legend>
                <p class="agreement">
                    <input type="checkbox" value="" name="agree" id="agree"/>
                    <label for="agree">*  I accept the <a href="#">Terms and Conditions</a></label>
                    <span></span>
                </p>
            </fieldset>
            <div class="right">
            <button class="button" value="Submit" type="submit">Register &raquo;</button>
            </div>
        </form>
        <!--ends here-->
    </div>
    <!--rightCol-->
    <script>
        $(document).ready(function($) {
            $("button.submit").click(function() {
                console.log('click');
            });
          // validate signup form on keyup and submit
            
		$("#register").validate({
            debug: true,
			errorElement: "span",
            errorPlacement: function(error, element) {
				error.appendTo(element.next("span"));
			},
			success: function(label) {
				label.addClass("success");
			},
			rules: {
				firstname: {
                    required: true,
                    minlength: 3
                },
				lastname: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    minlength: 10,
                    number: true
                },
				email: {
					required: true,
					email: true
				},
				address: {
					required: true,
					minlength: 15
				},
                
				province: {
					required: true,
                    minlength: 3
				},
                gender: "required",
				agree: "required"
			},
			messages: {
				firstname: " ",
				lastname: " ",
				email: " ",
                phone: " ",
                address: " ",
                province: " ",
                country: " ",
                gender: " ",
                bDay: " ",
				agree: " "
			},
            submitHandler: function(form) {
                form.submit();
            }
		});
            
        
    });
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
    <style>
        #register span { float: left; display: block; width: 16px; height: 16px; } 
        span.error { background:url("images/unchecked.gif") no-repeat 0px 0px; padding-left: 16px; display: block; } 
        span.success { background:url("images/checked.gif") no-repeat 0px 0px; padding-left: 16px; display: block; }
    </style>
<?php 
    include('foot.php');
?>
