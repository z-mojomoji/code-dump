<?
	include_once('jamsai.inc.php');
	if(!isJudgement()){
		header("location: index.php");
		die;
	}
	
	$j = getStory();
	$title = $j['title'];
	$desc = $j['abstract'];
	
	$c = getStoryChapter();
	$ac = getAllChapter();
	$isMain = ( ! $c );
	$bodyContent = ( $isMain ) ? $j['synopsis'] : $c['body'];
	
	$j['prev'] = ( $isMain || $c['chapter'] == 1) ? '' : '<a target="_self" class="prev" title="�͹��͹˹��" href="view.php?id=' . $j['story_id'] . '&chapter=' . ($c['chapter'] - 1 ) . '">�͹��͹˹��</a>';
	$j['over'] = ( $isMain ) ? '' : '<a target="_self" class="over" title="��Ѻ仵͹�á�ͧ����ͧ" href="view.php?id=' . $j['story_id'] . '">��Ѻ仵͹�á�ͧ����ͧ</a>';
	$j['next'] = ( $c['chapter'] == $j['chapter'] ) ? '' : '<a target="_self" class="next" title="�͹�Ѵ�" href="view.php?id=' . $j['story_id'] . '&chapter=' . ($c['chapter'] + 1 ) . '">�͹�Ѵ�</a>';
	include('header.php');
?>

<div class="wrapper">

<!--<table border="0" cellspacing="0" cellpadding="0" id="hwrrr">
  <tr>
    <div id="mid">
    <span class="picc"><img src="<?=$j['pic']?>" /></span>
    <span class="wnam"><?=$title?></span>
    <span><?=(( $isMain ) ? '��������ͧ���' : '�͹��� ' . $c['chapter'] . ' : <b>' . $c['title'] . '</b>')?></span><br />
	<span>����� : <a style="text-decoration:none; color:#B30660;" target="_blank"  href="/board/gotoMYid.php?id=<?=$j['user_id']?>"><b><?=$j['writer']?></b></a></span>
    </div>
    <div id="dttt">
    ��͸Ժ������ͧ : <?=$desc?>
    </div>
      
      </td>
    <td valign="top" class="wh22">
    <div id="showvdo">
    	<h2></h2>
        
    </div>
    </td>
    </tr>
</table>-->
<div id="hwriter">
<img src="<?=$j['pic']?>" />
<span class="jtitle"><?=$title?></span>
<span class="jname">����� : <a style="text-decoration:none; color:#B30660;" target="_blank"  href="/board/gotoMYid.php?id=<?=$j['user_id']?>"><b><?=$j['writer']?></b></span>
<span class="jdat">
    <span> ��͸Ժ������ͧ : <?=$desc?></span>
</span>
<p></p>
</div>
	<div id="mwriter">
	<div align="center"><?=$j['prev'] . $j['over'] . $j['next']?></div><br/>
    <?=$bodyContent?>
	</div>
    <div id="allwri">
		<h2>
		<span class="wnam"><?=$title?></span>
		<span>����� : <b><?=$j['writer']?></b></span>
		</h2>
		<table width="100%" border="0" cellspacing="1" cellpadding="5">
	  <tr>
		<td width="60" align="center" bgcolor="#ee7488"><span class="fonw">�͹���</span></td>
		<td bgcolor="#ee7488"><span class="fonw">���͵͹</span></td>
		<td width="125" align="center" bgcolor="#ee7488"><span class="fonw">�ѹ���ŧ</span></td>
	  </tr>
	  <?
		foreach($ac as $r){
			echo '<tr>
						<td align="center"><span class="wnumm">' .$r['chapter']. '</span></td>
						<td><a title="' . $r['title'] . '" href="view.php?id=' . $j['story_id'] . '&chapter=' . $r['chapter'] . '">' . $r['title'] . '</a></td>
						<td align="center">' .$r['updated']. '</td>
					 </tr>';
		}
	?>
	  
	</table>

	</div>
</div>
<?php
include('footer.php');
