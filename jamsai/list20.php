<?php
include_once('jamsai.inc.php');
addCookie();
$data=getPassList();
?>

<form action="votenow.php" method="post" id="formvote" target="_blank">
	<input type="hidden" name="story_id" id="story_id" value="" />
</form>
<div id="jslist20">
<?
foreach ($data as $row){
	$css_upstatus='noup';
	$text_upstatus='ยังไม่ได้ส่งเนื้อหาตอนที่ '.$currentChapter.'/7';
	if ($row['chapter']==$currentChapter){
		$css_upstatus='yesup';
		$text_upstatus='ส่งเนื้อหาตอนที่ '.$currentChapter.'/7';
	}
	
	$isvoted=checkVoteByCookie($row['story_id'],intval($_SESSION['dekdee']['user_id']));
	
?>

<div class="liststory <?=($row['failed']?'failed':'')?>">
	<div class="jstory">
    <img src="<?=$row['pic'];?>" />
    <p class="upstory <?=$css_upstatus;?>"><?=$text_upstatus;?></p>
    <p>
<b onClick="window.open('view.php?id=<?=$row['story_id'];?>&chapter=<?=$row['chapter'];?>');" style="cursor: pointer;"><?=$row['code'];?> : <?=$row['title'];?></b>
<span>โดย <?=$row['writer'];?></span>
    </p>
    <p>
    <?=$row['abstract'];?>
    </p>
    </div>
    <div class="jvote">
    <div class="jper"><img src="/jamsai/image/barj.gif" style="width:<?=$row['percent'];?>%" /></div><b><?=$row['percent'];?>%</b>
    <a class="btn-jvote <?=$row['failed']||$isvoted?'jvoted':'';?>" data-storyid="<?=$row['story_id'];?>" onClick="VoteNow">VOTE</a>
    </div>
    <div class="clear"></div>
</div>

<? } ?>

</div>
<script type="text/javascript">
(function(){	
	$(document).delegate('.btn-jvote','click',function(){
		if (!$(this).hasClass('jvoted'))
			$(this).addClass('jvoted');
			
		var storyid=$(this).attr('data-storyid');
		/*$('#story_id').val(storyid);
		$('#formvote').submit();*/
		window.open('votenow_pop.php?story_id='+storyid,'','width=400,height=250');
	});
})();
</script>