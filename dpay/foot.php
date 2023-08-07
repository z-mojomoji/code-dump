</div>
<!--container-->
</div>
<!--contentArea-->
<footer>
    <div class="container">
        <div class="column">
            <img src="images/logo-w.png" alt="DeePay" />
            <p>ดีเพย์เป็นบริษัทเพื่อการเติมเงินโดยเฉพาะ ในประเทศไทย
            </p>
            <span class="copyright">
                    Copyright 2016 Deepay.
                    All right reserved.
                </span>
        </div>

        <div class="column">
            <div class="title">ตู้ดีเพย์</div>
            <ul>
                <li><a href="product.php" target="_blank">
                        คุณสมบัติตู้
                    </a></li>
                <li><a href="service.php" target="_blank">
                        สินค้าและบริการ
                    </a></li>
<!--
                <li><a href="howto.php" target="_blank">
                        วิธีการใช้งาน
                    </a></li>
-->
            </ul>
        </div>

        <div class="column">
            <div class="title">ช่องทางธุรกิจ</div>
            <ul>
                <li><a href="partnership_owner.php" target="_blank">
                        เจ้าของตู้แบบซื้อขาด
                    </a></li>
                <li><a href="partnership_franchise.php" target="_blank">
                        เจ้าของตู้แบบแฟรนไซส์
                    </a></li>
                <li><a href="partnership_saledealer.php" target="_blank">
                        ตัวแทนขาย
                    </a></li>
                <li><a href="partnership_dealer.php" target="_blank">
                        ตัวแทนจำหน่าย
                    </a></li>
                <li><a href="partnership_service.php" target="_blank">
                        ตัวแทนติดตั้ง/บริการ
                    </a></li>
                <li><a href="profit.php" target="_blank">
                        รายได้ที่คุณจะได้รับ
                    </a></li>
            </ul>
        </div>
        <div class="column">
            <div class="title">ศูนย์บริการ</div>
            <ul>
                <li><a href="branch.php" target="_blank">
                        กรุงเทพและปริมณฑล
                    </a></li>
            </ul>
        </div>
        <div class="column">
            <div class="title">ติดต่อเรา</div>
            <ul>
                <li><a href="about.php" target="_blank">
                        เกี่ยวกับเรา
                    </a></li>
                <li><a href="career.php" target="_blank">
                        ร่วมงานกับเรา
                    </a></li>
            </ul>
        </div>
        <div class="column">
            <div class="row">
                <h2>
                        Marketing & Sales
                    </h2>
                <h3>ติดต่อฝ่ายขาย</h3>
                <p>093-949-0098
                    <br> ทุกวันจันทร์ - อาทิตย์ เวลา 8.00 - 20.00 น.</p>
            </div>
<!--
            <div class="row">
                <h2>
                        Marketing & Sales
                    </h2>
                <h3>ติดต่อฝ่ายขาย</h3>
                <p>02-1054149 กด 1
                    <br> ทุกวันจันทร์ - อาทิตย์ เวลา 8.00 - 20.00 น.</p>
            </div>
-->
        </div>
    </div>
    <!--container-->
</footer>
<!--footer-->
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
<script>
    $(document).ready(function () {
        $('.bannersContainer').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    });
</script>
</html>
