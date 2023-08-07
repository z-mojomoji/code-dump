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
<p>ขอบคุณที่ร่วมส่งผลงานค่ะ</p>
</div>
</div>

<?
include('footer.php');
?>