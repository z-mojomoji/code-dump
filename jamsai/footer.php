	<div id="footer">
<div id="clink">
<a href="http://www.dek-d.com/" target="_blank">หน้าแรกเด็กดี</a> | <a href="http://www.jamsai.com/" target="_blank">แจ่มใสดอทคอม</a> | <a href="http://www.dek-d.com/board/writer/" target="_blank">บอร์ดนักเขียน</a> | <a href="http://www.dek-d.com/writer" target="_blank">คอลัมน์นักเขียน</a> | <a href="http://www.dek-d.com/writer/tip/" target="_blank">เคล็ดลับนักเขียน</a><br/>
www.dek-d.com  &copy; 1999 - 2013 ; All rights reserved by Dek-D Interactive Co.,Ltd. 

</div>

        <div id="mlogo"><img src="/jamsai/image/logo2.png" /></div>
        <div class="clear"></div>
        <iframe src="/event/statcode.php?page=<?=$pageStat?>&bgc=transparent" style="width:18px;height:18px;z-index:1;top:5px;right:5px;border:none; margin-top:5px;" scrolling="No"></iframe>
    </div>

</div>
<? /* ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1726177-1']);
  _gaq.push(['_setDomainName', 'dek-d.com']);
  _gaq.push(['_setPageGroup', 1, 'Jamsai']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<? */ ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1726177-1', 'auto');
  ga('require', 'displayfeatures');
  ga('set', 'contentGroup1', 'Jamsai');
  <? if (! empty ($_SESSION['dekdee']['user_id'])): ?>
  ga('set', '&uid', <?=$_SESSION['dekdee']['user_id']?>);
  <? endif; ?>
  ga('send', 'pageview');

</script>

</body>
</html>