<?
$path ='./';
$jpage = 'regis';

include_once('jamsai.inc.php');

checkRegisterClose();
checkLogin();
checkRegisterDuplicate();	

$hasSession = array_key_exists('jamsai2013', $_SESSION);
if( $hasSession ) $j = $_SESSION['jamsai2013'];

//include_once('/webroot/www/main/DDRTE/fckeditor.php');
include_once ('/webroot/www/main/resource/ckeditor/ckeditor.php');
include('header.php');
?>
<div id="pagewi">
<form name="regis" action="confirm.php" method="post"  enctype="multipart/form-data" onSubmit="return chkSubmit();" target="_self">
<div id="regis">
<h2><b>ขั้นตอนที่ 1 : ข้อมูลเบื่องต้นของเรื่องนี้</b></h2>

<div class="divstep">
<label>1.1 ประเภท</label><span class="onin"><b style="color:#f05070; font-size:14px;">Jamsai Love Series</b></span>
</div>

<div class="divstep">
<label>1.2 ชื่อเรื่อง</label>
<span class="onin">
<input type="text" name="title" id="title" maxlength="60" value="<?=( $hasSession ) ? $j['title']:'' ?>" />
<br /><span class="tede"><a id="title_len">0</a> ตัวอักษร [ ขนาดไม่เกิน 60 ตัวอักษร ]</span>
</span>
<script type="text/javascript">
$("#title").keyup(function(){
	var len=$(this).val().length;
	$("#title_len").html(len).css('color',((len<60)?'green':'red'));
});
</script>
</div>

<div class="divstep">
<label class="laflo">1.3 แนะนำเรื่องสั้นๆ</label>
<span class="onin">
<textarea name="abstract" id="abstract" cols="45" rows="5" style="resize:none;" ><?=( $hasSession ) ? $j['abstract']:'' ?></textarea>
 <br /><span class="tede"><a id="abs_len">0</a> ตัวอักษร [ ขนาดไม่เกิน 200 ตัวอักษร ]</span>
</span>
<script type="text/javascript">
$("#abstract").keyup(function(){
	var len=$(this).val().length;
	$("#abs_len").html(len).css('color',((len<60)?'green':'red'));
});
</script>
</div>

<div class="divstep">
<label>1.4 รูปภาพ</label>
<span class="onin">
<!-- <img src="/jamsai/image/img.gif" class="myp" /> -->
<img src="<?=( ( $hasSession ) ? $j['pic'] : 'image/img.gif')?>" class="myp" />
<input name="thumb" id="thumb" type="file" />
<br /><span class="tede">[ ขนาด 70 x 70 pixel, ขนาดไฟล์ไม่เกิน 100 K, นามสกุล .jpg หรือ .gif เท่านั้น ]</span>
</span>
</div>

<div class="divstep">
<label style="width:auto">1.5 เรื่องย่อ / โครงเรื่องทั้งหมด</label>
<div style="margin-left:65px;">
<?
	/*$oFCKeditor = new FCKeditor('synopsis');
	$oFCKeditor -> BasePath = '/DDRTE/';
	$oFCKeditor -> ToolbarSet = 'DD_Board';
	$oFCKeditor -> Value = ( $hasSession ) ? $j['synopsis'] : '';
	$oFCKeditor -> Height = 300;
	$oFCKeditor -> Width = 750;
	$oFCKeditor -> Create();*/
	$ckeditor = new CKEditor();
	
	$ckeditor->basePath = '/resource/ckeditor/';
		$ckeditor->config['width'] = '750';
		$ckeditor->config['height'] = '300';
		$ckeditor->config['toolbar'] = 'Writer';
		$ckeditor->editor('synopsis' , ( $hasSession ) ? $j['synopsis'] : '');
?>
</div>
<br /><span style="color:#FF0000; margin-left:65px;">* เรื่องย่อจนจบ เพื่อให้กรรมการเข้าใจพล๊อตเรื่องโดยละเอียด มิใช่แค่เกริ่นเรื่อง</span>

</div>

<h2><b>ขั้นตอนที่ 2 : ส่งเนื้อหาตอนที่ 1</b></h2>

<div class="divstep">
<label>2.1 ชื่อตอนที่ 1</label>
<span class="onin">
<input type="text" name="t_title" id="t_title" maxlength="60" value="<?=( $hasSession ) ? $j['t_title']:'' ?>" />
</span>
</div>

<div class="divstep">
<label style="width:auto">2.2 เนื้อหาตอนที่ 1</label>
<div style="margin-left:65px;">
<?
		/*$oFCKeditor = new FCKeditor('lstory');
		$oFCKeditor -> BasePath = '/DDRTE/';
		$oFCKeditor -> ToolbarSet = 'DD_Board';
		$oFCKeditor -> Value = ( $hasSession ) ? $j['lstory'] : '';
		$oFCKeditor -> Height = 300;
		$oFCKeditor -> Width = 750;
		$oFCKeditor -> Create();*/
		$ckeditor = new CKEditor();
				
		$ckeditor->basePath = '/resource/ckeditor/';
		$ckeditor->config['width'] = '750';
		$ckeditor->config['height'] = '300';
		$ckeditor->config['toolbar'] = 'Writer';
		$ckeditor->editor('lstory' , ( $hasSession ) ? $j['lstory'] : '');
?>
</div>
</div>

<div class="btnsubmit"><input name="Submit" type="submit" id="gostep2" value="ขั้นตอนต่อไป" />
</div>

</div>
</form>
</div>
<script  type="text/javascript">
function chkSubmit(){
	var fck_s = CKEDITOR.instances['synopsis'];
		var fck_t =CKEDITOR.instances['lstory'];
		var synopsis = fck_s.GetData();
		var s_test = synopsis.substring( synopsis.length - 6);
		if( s_test =='&#160;' || s_test == '<br />' ) synopsis = synopsis.substring(0, synopsis.length - 6);
		var t_text = fck_t.GetData();
		var t_test = t_text.substring( t_text.length - 6);
		if( t_test =='&#160;' || t_test == '<br />' ) t_text = t_text.substring(0, t_text.length - 6);
		
	if( $('#title').val().length < 3 ){ alert('กรุณาระบุชื่อเรื่อง'); $('#title').focus(); return false; }
	if( $('#title').val().length > 60 ){ alert('ความยาวของชื่อเรื่องต้องไม่เกิน 60 ตัวอักษร'); $('#title').focus(); return false; }
	if( $('#abstract').val().length < 3 ){ alert('กรุณาระบุคำแนะนำเรื่อง'); $('#abstract').focus(); return false; }
	if( $('#abstract').val().length > 200){ alert('ความยาวของคำแนะนำเรื่องต้องไม่เกิน 200 ตัวอักษร'); $('#abstract').focus(); return false; }
	if( synopsis.length < 4){ alert('กรุณาระบุเรื่องย่อ/โครงเรื่องทั้งหมด'); fck_s.Focus(); return false; }
	if( $('#t_title').val().length < 4 ){ alert('กรุณาระบุชื่อตอนที่ 1'); $('#t_title').focus(); return false; }
	if( t_text.length < 4){ alert('กรุณาระบุเนื้อหาตอนที่ 1');  fck_t.Focus(); return false; }
	return true;
}

(function(){
	$("#title").keyup();
	$("#abstract").keyup();
	
})();
</script>
<?
include('footer.php');
?>