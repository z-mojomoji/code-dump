<?
	include_once('/webroot/www/main/myLib/score.inc.php');
	include_once("/webroot/www/main/myLib/board.inc.php");
	include_once("/webroot/www/main/myLib/stdlib.inc.php");
	$commentPerPage =50;
	$pno = array_key_exists('pno', $_GET) ? intval($_GET['pno']) : 1;
	$pno = ( $pno > ceil( $j['posted']/$commentPerPage ) ) ? 1 : $pno ;
	$pageTab = y2010_getPages( $pno, $j['posted'], $commentPerPage, 10, '&id=' . $j['story_id'],'&chapter='.$_GET['chapter'] , '/jamsai/view.php', 'bv');
	$gc = getAllComment( $j['story_id'], $pno );		
?>
<style>

	#boxComment, #cpolicy{ background-color: #fff; border: 1px solid #ccc; width: 680px; margin: 15px auto; padding: 2px;}
	#top{ background-color: #fff; border: 1px solid #B986BC; padding: 2px; }
	#top h1{ background: url('image/comment01.gif') no-repeat; font-size:0; color:transparent; line-height: 0; width: 674px; height: 42px; margin:0; padding:0; }
	.comment{ width: 634px; padding: 20px; font-size: 16px; font-weight: lighter; color: #A26CA5; background-color: #FFEAF2; }
	#top .commitName{ font-size: 22px; color:#000; }
	#top .commitName span{ font-size: 22px; color:#F25D06; }
	#top .comment p{ font-size: 18px; }
	#TopCommentHead{ background:transparent url('/images/board/top_bg.gif') repeat-x scroll 0 0; height:30px; line-height: 30px; margin:15px auto auto; width:672px; padding: 2px; border: 2px solid #000;}
	#TopCommentHead h3{	font-size: 22px; font-weight: bold; color: #FFFFFF; width: 200px; text-align: center; float: left; }
	#TopCommentHead div{ color:#ababab; text-align: center; width: 459px; font-size: 11px; margin-left: 176px; }
	#boardListComment{	background-color:#FFFFFF; padding: 15px 0px 10px; background: url('/images/board/top_ar.gif') no-repeat 35px top;  }	
	#listComment { list-style: none; }
	.listCommentHead{ height: 30px; padding: 2px 2px 0px 20px; position: relative; z-index:1; line-height:30px;}
	.listCommentHead h4{ color:#FFFFFF; display:inline-block; font-size:18px; font-weight:bold;}
	.boardmsg { font-size: 16px; margin: auto auto 40px; overflow-x: auto; padding-top: 20px; position: relative; width: 97%; word-wrap: break-word; z-index: 1; }
	.bd1soCCC{ margin: 20px 0; }
	.policy{ background-color: #FFF193; padding: 15px 30px; font-size:11px; color: #666;}
	.policy h3{	font-weight: bold; padding: 0 0 10px; margin:0; }
	.policy ol{ margin: 0; padding:0;}
	.policy ol li{ list-style-type:decimal; margin-left:20px;}
	.com_box{ font-size: 11px; color:#666; }
	#ownerdetail{ list-style: none; }
	#ownerdetail li a{ font-weight: bold; color: #24a900; }
	#ownerdetail li a:hover{ text-decoration: underline; }
</style>	
		<div id="boxComment">
<? 
	if( $j['posted'] > 0 ){
	if( count($gc[0]) > 0) { 
		$gcg = 0;
		foreach( $gc[0] as $k=>$v ){
			$gcg++;
			if($gcg > 1 ) echo '<br />';
			echo '<div id="top"><h1>Comment �ҡ�������</h1>';
			echo '<div class="comment"><div class="commitName"> #' . ( $gcg ) . ' <span>' . $v['a_name'] . '</span></div><br />' . $v['a_message'] . '</div>';
			echo '</div>';
		}
	}
	if( count($gc[1]) > 0) { ?>	
			<div id="TopCommentHead"><h3>�����Դ�������ش</h3></div>
			<div id="boardListComment"><?=$pageTab?>
<ul id="listComment">
<? foreach($gc[1] as $c){ ?>
<li class="bd1soCCC cTheme<?=$c['theme']?>">
	<div class="listCommentHead"><h4>�����Դ��繷�� <?=$c['a_index']?></h4></div>
		<div class="commentBox"><div class="boardmsg"><?=$c['msg_a']?></div><div class="boardps"><?=$c['msg_b']?></div>
			<div class="commentOwner">
				<img height="70" width="70" style="border:3px solid #fff;" src="<?=$c['toon']?>" alt="<?=convertForInTag( $c['a_name'] )?>" />
				<img width="120" height="50" src="http://www0.dek-d.com/board/pic/rankb/<?=$c['rankl']?>.gif" title="<?=$rankText?>" alt="<?=$c['rankt']?>" />
				<ul id="ownerdetail">
					<li>Name : <b><?=$c['a_name']?></b> <?=$c['myid']?><span>  [ IP : <?=$c['a_ip']?> ] </span></li>
					<li>Email / Msn : <span><?=displayEmail( $c['email'] )?></span></li>
					<li>�ѹ��� : <?=datetransform( $c['a_datetime'], "thf" );?></li>
				</ul>
			</div>
		</div>
	</li>
<? } ?>
</ul><?=$pageTab?>
		</div>
<? 
	} 
}
	if( $j['selected'] == 0 )
	{
		include('postbox.inc.php');
	}
?>
	</div>
	<div id="cpolicy">
		<div class="policy">
			<h3>��͵�ŧ &amp; ���͹䢡����ҹ</h3>
			<ol>
				<li>�óշ���ͤ�������ٻ�Ҿ㹡�з�������¼��ŧ��з���ͧ �Ԣ�Է�����繢ͧ���ŧ��з���µç ���������Ѵ�͡ �ӫ�� ������͹���Ѻ͹حҵ�ҡ���ŧ��ͤ���</li>
				<li>�óշ���ͤ�������ٻ�Ҿ㹡�з����ӡ�äѴ�͡ �ӫ�� �Ҩҡ�ͧ�ؤ������ ���ŧ��з��е�ͧ�ӡ����ҧ�ԧ���ҧ������� ��е�ͧ�Ѻ�Դ�ͺ����ͧ��èѴ��� �Ԣ�Է�������§�������</li>
				<li>��ͤ�������ٻ�Ҿ����ҡ�㹡�з�����ҹ��������� �Դ�ҡ��õ�駡�з����ж١�觢�鹡�дҹ�������ѵ��ѵԨҡ�ؤ�ŷ���� ����硴մͷ�����������ǹ���������� ��Ǩ�ͺ ���;��٨�����稨�ԧ�� ������ ���㴾���繢�ͤ��� �����ٻ�Ҿ㹡�з��������Դ�Ԣ�Է��� �������������� �ô�駼������к����ʹ��Թ��÷�� board(at)dek-d.com ( �ء�ѹ 24 �� ) ���͠<br />
				<span style="color: red;">�Դ��ͷ���ҹ���䫵� Dek-D.com ���� 02-860-1142 ��� 140</span><br />( �-� 09.00-18.00 �ѡ���§ 12.00-13.00 )</li>
			</ol>
		</div>
	</div>