<?
if( !array_key_exists('chapter', $_GET) ) header( 'location: '.$_SERVER['REQUEST_URI'].'&chapter=1' );
$path ='./';
$jpage = 'view';

include('jamsai.inc.php');
showNovel();
$j=getStory();
$c = getStoryChapter();
$ac = getAllChapter();

$title = $j['title'];
$desc = $j['abstract'];
$isMain = ( ! $c );
$bodyContent = ( $isMain ) ? '' : $c['body'];

$scoreall=getSumScoreAll();

chapterAddView($_GET['id'],$_GET['chapter']);
addCookie();

$j['prev'] = ( $isMain || $c['chapter'] == 1 ) ? '' : '<a target="_self" class="bt1" title="ตอนก่อนหน้า" href="view.php?id=' . $j['story_id'] . '&chapter=' . ($c['chapter'] - 1 ) . '">ตอนก่อนหน้า</a>';
$j['over'] = ( $isMain || $c['chapter'] == 1 ) ? '' : '<a target="_self" class="bt2" title="ไปตอนแรกของเรื่อง" href="view.php?id=' . $j['story_id'] . '&chapter=1">ไปตอนแรกของเรื่อง</a>';
$j['next'] = ( $c['chapter'] == $j['chapter'] ) ? '' : '<a target="_self" class="bt3" title="ตอนถัดไป" href="view.php?id=' . $j['story_id'] . '&chapter=' . ($c['chapter'] + 1 ) . '">ตอนถัดไป</a>';

include('header.php');
?>


<form action="votenow.php" method="post" id="formvote">
	<input type="hidden" name="story_id" value="<?=$_GET['id']?>" />
</form>
<div id="hwriter">
	<div id="btn-vote">
    	<a href="#" onClick="$('#formvote').submit();">VOTE</a>
    	<b><?=( $scoreall['vw'] == 0 ) ? 0 : floor($j['vote_week'] / $scoreall['vw'] * 100);?>%</b>
    </div>
<img src="<?=$j['pic']?>" />
<span class="jtitle"><?=$title?></span>
<span class="jname">ผู้แต่ง : <a style="text-decoration:none; color:#B30660;" target="_blank"  href="/board/gotoMYid.php?id=<?=$j['user_id']?>"><b><?=$j['writer']?></b></a></span>
<span class="jdat">
<?if( $isGod || in_array($_SESSION['dekdee']['user_id'],$judgement)){?>
		<span><a style="text-decoration:none; color:orange;" target="_blank" href="view_regis.php?id=<?=$_GET['id']?>"> ( เรื่องย่อ )</a></span>
	<?}?>
    <span> คำอธิบายเรื่อง : <?=$desc?></span>
</span>
<br />
	<div id="seri">
    	<p>ตอนที่ <?=$c['chapter']?>/7 : <?=$c['title']?></p>
    </div>
</div>

<div id="pagewi">
	<div class="boxbt">
		<?=$j['prev']?>
		<?=$j['over']?>
		<?=$j['next']?>
	</div>
<br />
<?=$bodyContent?>

<div id="allwri" style="margin-top:50px;">
    <h2>
    <span class="wnam"><?=$title?></span>
	<span>ผู้แต่ง : <b><?=$j['writer']?></b></span></h2>
    <table width="100%" border="0" cellspacing="1" cellpadding="5">
  <tr>
    <td width="60" align="center" bgcolor="#ee7488"><span class="fonw">ตอนที่</span></td>
    <td bgcolor="#ee7488"><span class="fonw">ชื่อตอน</span></td>
    <td width="125" align="center" bgcolor="#ee7488"><span class="fonw">วันที่ลง</span></td>
  </tr>
  <?
	$i=1;
	foreach($ac as $r){
		echo '<tr>
					<td align="center"><span class="wnumm">' .$r['chapter']. '</span></td>
					<td><a title="' . $r['title'] . '" href="view.php?id=' . $j['story_id'] . '&chapter=' . $r['chapter'] . '">' . $r['title'] . '</a></td>
					<td align="center">' .$r['updated']. '</td>
				 </tr>';
		$i++;
	}
?>
  
</table>

    </div>
    
<?
include('comment.inc.php');
?>
</div>
<?
include('footer.php');
?>