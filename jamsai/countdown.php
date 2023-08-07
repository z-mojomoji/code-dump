
	<script language="Javascript" type="text/javascript" src="js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="js/misc.js"></script>
	<link rel="Stylesheet" type="text/css" href="style/main.css"></link>



<div id="container">


		<!-- Countdown dashboard start -->
		<div id="countdown_dashboard">
			
            <div id="parttitle">สำหรับผู้เข้ารอบ 5 คน</div>
            <div id="atpart">
            <img src="/jamsai/image/ar_da.png" />
            นับถอยหลัง<br />
            ส่งเนื้อหาตอน <b>7</b> <a href="http://www.dek-d.com/jamsai/upwriter.php" target="_blank">คลิก!</a></div>
            <div id="toon_cou"><img src="/jamsai/image/toon_cou.png" /></div>
			<div class="dash days_dash">
				<span class="dash_title">day</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash">
				<span class="dash_title">hr</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash">
				<span class="dash_title">min</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash">
				<span class="dash_title">sec</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

		</div>
		<!-- Countdown dashboard end -->


		<script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				$('#countdown_dashboard').countDown({
					targetDate: {
						'day': 		19,
						'month': 	10,
						'year': 	2013,
						'hour': 	00,
						'min': 		00,
						'sec': 		0
					}
				});
				
			});
		</script>
	
	</div>

