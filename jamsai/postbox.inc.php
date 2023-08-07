<?
	include_once('/webroot/www/main/myLib/login.inc.php');
	include_once('/webroot/www/main/myLib/board.inc.php');

	
	$refer = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$_noTheme =  true;
	$zoneWidth = 662;
	$zoneHeight = 610;
	
	$t_msg_width = 653;
	$t_msg_height = 240;
	
	$t_msg_toolset = 'DD_Board2';
	
	$isLogin = isLogin();
	$isLockPost = ($lockpost =='L' );

?>
<script language="JavaScript" type="text/javascript">
	function stripHTMLme(txt){
		var re= /<\S[^><]*>/g;
		return txt.replace(re, "");
	}
	<!--
	function getLength(){

	// This functions shows that you can interact directly with the editor area
	// DOM. In this way you have the freedom to do anything you want with it.

	// Get the editor instance that we want to interact with.
		//var oEditor = FCKeditorAPI.GetInstance('t_msg') ;
		var oEditor = CKEDITOR.instances['t_msg'] ;
	// Get the Editor Area DOM (Document object).
		//var oDOM = oEditor.EditorDocument ;
		var oDOM = oEditor.document ;
		var iLength ;

	// The are two diffent ways to get the text (without HTML markups).
	// It is browser specific.

	if ( document.all ) // If Internet Explorer.
	{
	iLength = oDOM.body.innerText.length ;
	}
	else // If Gecko.
	{
	var r = oDOM.createRange() ;
	r.selectNodeContents( oDOM.body ) ;
	iLength = r.toString().length ;
	}

	//alert(iLength) ;
	return iLength;
	}
	
	function insertBYEmo(value,mem){
		if(mem==true){
			var oEditor = CKEDITOR.instances['t_msg'] ;
			oEditor.insertHtml('<img src="http://www0.dek-d.com/DDRTE/editor/plugins/dekdee/images/'+value+'.gif"	alt="" />');
		}else{
			document.getElementById('t_msg').value += "["+value+"]";
		}
	}

	
	function submitForm() {
		var err='';
		// var oFCKeditor = FCKeditorAPI.GetInstance('t_msg');
		var msg = CKEDITOR.instances['t_msg'].getData();
		//var msg = stripHTMLme(document.mainForm.t_msg.value);
		var len_msg = msg.length;
		
		if (len_msg < <?=MIN_T_COMMENT?> || len_msg > <?=MAX_T_COMMENT?>) {
			err+='\n   - ข้อความที่โพสจะต้องไม่น้อยกว่า <?=MIN_T_COMMENT?> ตัวอักษรและไม่เกิน <?=number_format(MAX_T_COMMENT)?> ตัวอักษร';
		}
		if (document.mainForm.t_mem[1]!=null  && document.mainForm.t_mem[1].checked==1 && document.mainForm.t_name.value=='') { 
			err+='\n   - กรอกชื่อด้วยนะ';
		} 

		if (err != "") {
			err ="_____________________________\n" +
			"กรอกข้อมูลในช่องต่อไปนี้ไม่ครบ\nหรือข้อมูลผิดพลาดครับ :\n" +
			err + "\n_____________________________" +
			"\nช่วยกรอกอีกครั้งนะครับ";

			alert(err);
			return false;
		} else { 
			jQuery("#submit_targeter").attr('disabled','disabled');
			return true;
		}

	}
	
	//-->
</script>
<style type="text/css">
<!--
	#postbox_outer{ background:#FFF; border:1px solid #CCC; margin:auto; position:relative; z-index:1; width: 678px; height: 707px; }
	#postbox_inner{ background-color:#814402; margin:2px; padding:3px; width:668px; height: 697px; }
	#postbox_rule{ display: block; position:absolute; z-index:1; width: 107px; height: 28px; right: 10px; top: 9px; color: #FFE553; font-size:11px;}
	#postbox_head{ background: url('/images/content/comment_bro.gif') repeat-x; padding-left: 5px; font-size: 18px; font-weight: bold; color: #FFF; height: 36px; line-height:36px; width: 660px;}
	#postbox_area{ background: url('/board/images/bg_my.jpg') no-repeat #ffbe12 ; width: 662px; height: 605px; padding: 3px; position: relative; z-index:1;}
	#postbox_m1{ background: url('/board/images/h1.gif') no-repeat left bottom; height: 25px; }
	#postbox_m2{ background: url('/board/images/h2_02.gif') no-repeat; height: 25px; width: 624px; position: absolute; z-index:2; top: 470px;}
	#postbox_tmsg{ background: #FFF; width: 652px; height: 420px; padding: 5px;	margin-bottom: 10px;}
	#postbox_banner{ position: absolute; z-index:1; width: 624px; height: 150px; top: 357px; left: 22px; background: #fff;}
	#postbox_poster{ position: absolute; z-index:1; height: 110px; width: 662px; top: 495px; background: #fff;}
	#postbox_poster label{ cursor: pointer; font-size: 14px; font-weight: bold; color: #666; }
	.pmiptt{ background: #fff; color: #000; font-size:10px; width: 68px; height: 13px; vertical-align: middle;}
-->

</style>
<form target="_self" action="post.php" method="post" name="mainForm" onSubmit="return submitForm();">
<input type="hidden" name="refer_id" value="<?=$j['story_id']?>" />
<input type="hidden" name='textmode' value="<?=($isLogin)?'member':'guest';?>" />

	<div id="postbox_outer">
		<div id="postbox_inner">
			<a id="postbox_rule" href="กฏการตั้งกระทู้" title="กฏการตั้งกระทู้" alt="กฏการตั้งกระทู้" onclick="return popup('/guidebook/board_rules.php',640,500 );"  class="l-s-whi"><img src="/board/images/ick.gif" width="39" height="28" border="0" align="absmiddle" />กฏการตั้งกระทู้</a>
			<div id="postbox_head">แสดงความคิดเห็น</div>
			<div id="postbox_area">
<div id="postbox_m1"></div>
<div id="postbox_tmsg">
<?
	if( $isLogin ) {
		 include_once ('/webroot/www/main/resource/ckeditor/ckeditor.php');

		$ckeditor = new CKEditor();

		$ckeditor->basePath = 'http://my.dek-d.com/a/resource/ckeditor/';
		$ckeditor->config['width'] = $t_msg_width;
		$ckeditor->config['height'] = $t_msg_height;
		//$ckeditor->config['toolbar'] = 'CommentWriter';
		$ckeditor->editor('t_msg');
	}else {
		echo '<textarea id="t_msg" name="t_msg" rows="10" cols="90" style="font-size: 16px; width: ' . $t_msg_width . 'px; height: ' . $t_msg_height . 'px;"></textarea>';
	} 
		echo '<div id="emoSelect" style="width: 650px;">
					<ul class="emolist" style="width: 1040px;">';
		for($i=1;$i<=10;$i++) echo '<li><img src="http://www0.dek-d.com/DDRTE/editor/plugins/dekdee/images/b-0'.(($i<10)? '0'.$i:$i).'.gif" onclick="insertBYEmo(\'b-0'.(($i<10)? '0'.$i:$i).'\',' . (($isLogin)?'true':'false') . ')" /></li>';
		for($i=1;$i<=10;$i++) echo '<li><img src="http://www0.dek-d.com/DDRTE/editor/plugins/dekdee/images/y-0'.(($i<10)? '0'.$i:$i).'.gif" onclick="insertBYEmo(\'y-0'.(($i<10)? '0'.$i:$i).'\',' . (($isLogin)?'true':'false') . ')" /></li>';
		echo '</ul>
				</div>';
		if( $isLogin && false )  echo '<br /><a href="#" onclick="return drawingpad(\''.$SERVER_NAME.'\');" class="l-m-bla"><img src="http://www0.dek-d.com/board/pic/palette.gif" alt="วาดรูปประกอบ" title="วาดรูปประกอบ"  style="vertical-align: middle;" /> วาดรูปประกอบ</a>';
?>
</div>
<div id="postbox_m2"></div>
<div id="postbox_poster">
	<div style="padding: 20px 0 0 20px; float: left;">
		<label for="t_mem_check" class="pmullbl"><input type="radio" id="t_mem_check" name="t_mem" value="yes" <?=(($isLogin)?' checked':'')?> />โพสแบบ member</label>
		<div style="color: #2969c5; padding:10px 0 0 16px;line-height:10px;text-align:<?=($isLogin?'left':'right')?>;">
			<? if( $isLogin ){ ?>
			<label class="pmlbl" style="width:225px;height:50px; line-height:20px;display:block; overflow: hidden;"><?=$THIS_USER["aliasname"]?> <br />( <a href="http://my.dek-d.com/dek-d/my.id_station/login.php?refer=<?=$refer?>"  class="l-m-ora" target="_self">Login ชื่ออื่น</a> |  <a href="/login/logoutX.php?afURL=<?=$refer?>" class="l-m-ora" target="_self">Logout</a> ) </label>
			<? }else{ ?>
			Login * <input type="text" id="t_username" name="t_username" class="pmiptt" /><br /><br /> Password * <input type="password" id="t_password" name="t_password" class="pmiptt" />
			<? } ?>
		</div>
	</div>
<? if( !$isLockPost ){ ?>
<div style="padding: 20px 0 0 220px;">
	<label for="t_memUser" class="pmullbl"><input type="radio" id="t_memUser" name="t_mem" value="no" <?=((!$isLogin)?' checked':'')?> />โพสแบบบุคคลทั่วไป</label>
	<div style="color: #666; padding:10px 0 0 16px;line-height:10px; font-size: 11px;">
	ชื่อ <input type="text" id="t_name" name="t_name" class="pmiptt" /> Email <input type="text" id="t_email" name="t_email" class="pmiptt" />
	รูปตัวแทน <select style="font-size:13px; width: 110px; height: 20px;" class="pmiptt" id="t_pic" name="t_pic"><option value="n-s" selected>ตุ๊กตาหิมะ</option><option value="boy">เด็กชาย </option><option value="girl">เด็กหญิง </option></select>
	<? if( !$isLogin ){ ?><br /><br />โปรดใส่รหัสตามรูป <img src="/myLib/authimg.php" width="80" height="20" style="vertical-align: middle;" /> <input type="text" id="txtCode" name="txtCode" class="pmiptt" /><? } ?>
	</div>
</div>
<? }?>
</div><!-- End div#postbox_poster -->
			</div><!-- End div#postbox_area -->
			<div style="height: 57px; text-align: center; line-height: 57px;"><input style="width:80px; height:30px;" value="ส่งความเห็น" type="submit" />&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:80px; height:30px;" value="ลบข้อความ" type="reset" onclick="resetMsg();" /></div>
		</div><!-- End div#postbox_inner -->
	</div><!-- End div#postbox_outer -->
</form>