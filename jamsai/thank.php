<?
$path ='./';
$jpage = 'regis';
include_once('jamsai.inc.php');
checkLogin();
checkRegisterClose();
checkRegisterDuplicate();

checkSave();
jamsaiSubmission();

include('header.php');
?>
<div id="pagewi">
<div id="thk">
<p>�ͺ�س��������觼ŧҹ���</p>
</div>
</div>

<?
include('footer.php');
?>