<?
$path ='./';
$jpage = 'regis';

include_once('jamsai.inc.php');

checkLogin();
checkRegisterClose();
checkRegisterDuplicate();	
checkConfirm();

$j = $_SESSION['jamsai2013'];

include('header.php');
?>
<div id="pagewi">
<form name="regis" action="thank.php" method="post" onsubmit="return chkSubmit()" target="_self">
<div id="regisname">
<h2 style="margin-bottom:3px"><b>��͡������������� �����Է���㹡���Ѻ�ҧ��Ţͧ��ҹ</b></h2>
<span style="color:#FF0000; font-size:11px; display:block; margin-bottom:20px">��سҡ�͡��������ǹ������ú �Ӥѭ�ҡ!</span>
<label>���ͨ�ԧ :</label><span><input type="text" id="firstname" name="firstname" maxlength="60" value="" /></span>
<label>���ʡ�� :</label><span><input type="text" id="surname" name="surname" maxlength="60" value="" /></span>
<label>����ҡ�� :</label><span><input type="text" id="aliasname" name="aliasname" maxlength="60" value="" /></span>
<label>������� :</label><span><input type="text" id="telephone" name="telephone" maxlength="60" value="" /></span>
</div>

<div class="warn">
��Ǩ�ͺ�����ŷ������ա����
</div>

<div id="regis">
<h2><b>��鹵͹��� 1 : ���������ͧ�鹢ͧ����ͧ���</b></h2>

<div class="divstep">
<label>1.1 ������</label><span class="onin"><b style="color:#f05070; font-size:14px;">Jamsai Love Series</b></span>
</div>

<div class="divstep">
<label>1.2 ��������ͧ</label>
<span class="onin">
<?=$j['title']?>
</span>
</div>

<div class="divstep">
<label class="laflo">1.3 �й�����ͧ����</label>
<span class="onin">
<?=$j['abstract']?>
</span>
</div>

<div class="divstep">
<label class="laflo">1.4 �ٻ�Ҿ</label>
<span class="onin">
<img src="<?=$j['pic']?>" class="myp" />
</span>
</div>

<div class="divstep">
<label style="width:auto">1.5 ����ͧ��� / �ç����ͧ������</label>
<div class="showcont">
<?=$j['synopsis']?>
</div>
</div>

<h2><b>��鹵͹��� 2 : �������ҵ͹��� 1</b></h2>

<div class="divstep">
<label>2.1 ���͵͹��� 1</label>
<span class="onin">
<?=$j['t_title']?>
</span>
</div>

<div class="divstep">
<label style="width:auto">2.2 �����ҵ͹��� 1</label>
<div class="showcont">
<?=$j['lstory']?>
</div>
</div>

<div class="warn" style="font-size:30px;">
��سҵ�Ǩ�ͺ���ա�͹��<br />
�����������������ö�����
</div>

<div class="btnsubmit">
<input name="backstep1" type="button" id="step1" value="��Ѻ����" onClick="location.href='register.php';" />
<input name="Submit" type="submit" id="sendcont" value="�觼ŧҹ" />
</div>
</form>
</div>
</div>

<script  type="text/javascript">
function chkSubmit(){
	if( $('#firstname').val().length < 3 ){ 
		alert('��س��кت��ͨ�ԧ'); $('#firstname').focus(); 
		return false; 
	}
	
	if( $('#surname').val().length < 3 ){ 
		alert('��س��кع��ʡ��'); $('#surname').focus(); 
		return false; 
	}
	
	if( $('#aliasname').val().length < 3 ){ 
		alert('��س��кع���ҡ��'); $('#aliasname').focus(); 
		return false; 
	}
	
	if( $('#telephone').val().length < 9 ){ 
		alert('��س��к��������'); $('#telephone').focus(); 
		return false; 
	}
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