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
<h2><b>��鹵͹��� 1 : ���������ͧ�鹢ͧ����ͧ���</b></h2>

<div class="divstep">
<label>1.1 ������</label><span class="onin"><b style="color:#f05070; font-size:14px;">Jamsai Love Series</b></span>
</div>

<div class="divstep">
<label>1.2 ��������ͧ</label>
<span class="onin">
<input type="text" name="title" id="title" maxlength="60" value="<?=( $hasSession ) ? $j['title']:'' ?>" />
<br /><span class="tede"><a id="title_len">0</a> ����ѡ�� [ ��Ҵ����Թ 60 ����ѡ�� ]</span>
</span>
<script type="text/javascript">
$("#title").keyup(function(){
	var len=$(this).val().length;
	$("#title_len").html(len).css('color',((len<60)?'green':'red'));
});
</script>
</div>

<div class="divstep">
<label class="laflo">1.3 �й�����ͧ����</label>
<span class="onin">
<textarea name="abstract" id="abstract" cols="45" rows="5" style="resize:none;" ><?=( $hasSession ) ? $j['abstract']:'' ?></textarea>
 <br /><span class="tede"><a id="abs_len">0</a> ����ѡ�� [ ��Ҵ����Թ 200 ����ѡ�� ]</span>
</span>
<script type="text/javascript">
$("#abstract").keyup(function(){
	var len=$(this).val().length;
	$("#abs_len").html(len).css('color',((len<60)?'green':'red'));
});
</script>
</div>

<div class="divstep">
<label>1.4 �ٻ�Ҿ</label>
<span class="onin">
<!-- <img src="/jamsai/image/img.gif" class="myp" /> -->
<img src="<?=( ( $hasSession ) ? $j['pic'] : 'image/img.gif')?>" class="myp" />
<input name="thumb" id="thumb" type="file" />
<br /><span class="tede">[ ��Ҵ 70 x 70 pixel, ��Ҵ�������Թ 100 K, ���ʡ�� .jpg ���� .gif ��ҹ�� ]</span>
</span>
</div>

<div class="divstep">
<label style="width:auto">1.5 ����ͧ��� / �ç����ͧ������</label>
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
<br /><span style="color:#FF0000; margin-left:65px;">* ����ͧ��ͨ��� ����������������㨾��͵����ͧ�������´ ��������������ͧ</span>

</div>

<h2><b>��鹵͹��� 2 : �������ҵ͹��� 1</b></h2>

<div class="divstep">
<label>2.1 ���͵͹��� 1</label>
<span class="onin">
<input type="text" name="t_title" id="t_title" maxlength="60" value="<?=( $hasSession ) ? $j['t_title']:'' ?>" />
</span>
</div>

<div class="divstep">
<label style="width:auto">2.2 �����ҵ͹��� 1</label>
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

<div class="btnsubmit"><input name="Submit" type="submit" id="gostep2" value="��鹵͹����" />
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
		
	if( $('#title').val().length < 3 ){ alert('��س��кت�������ͧ'); $('#title').focus(); return false; }
	if( $('#title').val().length > 60 ){ alert('������Ǣͧ��������ͧ��ͧ����Թ 60 ����ѡ��'); $('#title').focus(); return false; }
	if( $('#abstract').val().length < 3 ){ alert('��س��кؤ��й�����ͧ'); $('#abstract').focus(); return false; }
	if( $('#abstract').val().length > 200){ alert('������Ǣͧ���й�����ͧ��ͧ����Թ 200 ����ѡ��'); $('#abstract').focus(); return false; }
	if( synopsis.length < 4){ alert('��س��к�����ͧ���/�ç����ͧ������'); fck_s.Focus(); return false; }
	if( $('#t_title').val().length < 4 ){ alert('��س��кت��͵͹��� 1'); $('#t_title').focus(); return false; }
	if( t_text.length < 4){ alert('��س��к������ҵ͹��� 1');  fck_t.Focus(); return false; }
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