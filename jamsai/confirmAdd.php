<?
	$pageStat = 'jamsai_y6_confirmAdd';
	$_menu = 6;
	include_once('jamsai.inc.php');

	checkLogin();
	if (!$isGod)
	checkSendClose();
	$story_id = checkCandidate();
	
	checkSendConfirm();
	
	
	$namepage='confirmAdd';
	$j = $_SESSION['jamsai2013'];
	include('header.php');
?>
<div id="pagewi">
<form action="update.php" method="post" onSubmit="return chkConfirm();" target="_self" >

<div style="background:#FF0000; padding:15px; margin-top:20px; color:#FFFFFF; text-align:center; font-size:18px" class="warn"><b>��Ǩ�ͺ�����ŷ������ա����</b></div>

<div id="regis">
<h2><b>�������ҵ͹��� <?=$currentChapter?></b></h2>
<div class="divstep">
	<label>���͵͹</label>
	<span class="onin">
	<?=$j['t_title']?>
	</span>
</div>

<div class="divstep">
<label style="width:auto">������</label>
<div class="showcont"><?=$j['t_text']?></div>
</div>
<div style="text-align:center">
<span style="color:#FF0000; font-size:18px">��سҵ�Ǩ�ͺ���ա�͹��<br />
�����������������ö����� ��</span>
<table border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td><a href="upwriter.php" target="_self" style="text-decoration:none;"><input type="button" id="next2" value="���" /></a></td>
    <td><input type="submit" id="next3" value="��ҹ" /></td>
  </tr>
</table>
</div>
</div>
</form>

</div> 
<? include('footer.php'); ?>
