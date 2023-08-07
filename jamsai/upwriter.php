<?
$pageStat = 'jamsai_y6_addChapter';
	
	include_once('jamsai.inc.php');
	
	checkLogin();
	if (!$isGod)
	checkSendClose();
	$story_id = checkCandidate();
		
	$hasSession = array_key_exists('jamsai2013', $_SESSION);
	if( $hasSession ) $j = $_SESSION['jamsai2013'];
		
	$namepage = 'addChapter';
	include('header.php');
	include_once ('/webroot/www/main/resource/ckeditor/ckeditor.php');
?>
<div id="pagewi" class="reg">
<div id="regis">
<form name="regis" action="confirmAdd.php" method="post"  enctype="multipart/form-data" onSubmit="return chkSendSubmit();" target="_self">
<h2><b>ส่งเนื้อหาตอนที่ <?=$currentChapter?></b></h2>
<div class="divstep">
<label><b>ชื่อตอน :</b></label>
<span class="onin">
<input type="text" name="t_title" id="t_title" maxlength="255" value="<?=( ( $hasSession ) ? $j['t_title'] : '')?>"  />
</span>
</div>

<div class="divstep">
<label style="width:auto">เนื้อหา</label>
<div style="margin-left:65px;">

<?

	$ckeditor = new CKEditor();
	
	$ckeditor->basePath = '/resource/ckeditor/';
		$ckeditor->config['width'] = '750';
		$ckeditor->config['height'] = '300';
		$ckeditor->config['toolbar'] = 'Writer';
		$ckeditor->editor('t_text' , ( $hasSession ) ? $j['t_text'] : '');
?>
</div>
</div>
<br/><br/>
<div style="text-align:center" class="btnsubmit"><input type="submit" id="next1" value="ขั้นตอนต่อไป" />
</div>
</form>
</div>
</div> 
<? include('footer.php'); ?>

<script>
$('a#how2').live('click',function(){
	$('#bgbla,#boxh2').fadeIn();
	$('#boxh2 ul').animate({"left":"0"},500);
});
$('#bgbla, a.clo, a.yt_e').live('click',function(){
	$('#bgbla,#boxh2').fadeOut();
});
$('a.yt_n').live('click',function(){
	$('#boxh2 ul').animate({"left":"-=640px"},500);
});

$('a.yt_p').live('click',function(){
	$('#boxh2 ul').animate({"left":"+=640px"},500);
});
</script>