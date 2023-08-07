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
			echo '<div id="top"><h1>Comment จากกรรมการ</h1>';
			echo '<div class="comment"><div class="commitName"> #' . ( $gcg ) . ' <span>' . $v['a_name'] . '</span></div><br />' . $v['a_message'] . '</div>';
			echo '</div>';
		}
	}
	if( count($gc[1]) > 0) { ?>	
			<div id="TopCommentHead"><h3>ความคิดเห็นล่าสุด</h3></div>
			<div id="boardListComment"><?=$pageTab?>
<ul id="listComment">
<? foreach($gc[1] as $c){ ?>
<li class="bd1soCCC cTheme<?=$c['theme']?>">
	<div class="listCommentHead"><h4>ความคิดเห็นที่ <?=$c['a_index']?></h4></div>
		<div class="commentBox"><div class="boardmsg"><?=$c['msg_a']?></div><div class="boardps"><?=$c['msg_b']?></div>
			<div class="commentOwner">
				<img height="70" width="70" style="border:3px solid #fff;" src="<?=$c['toon']?>" alt="<?=convertForInTag( $c['a_name'] )?>" />
				<img width="120" height="50" src="http://www0.dek-d.com/board/pic/rankb/<?=$c['rankl']?>.gif" title="<?=$rankText?>" alt="<?=$c['rankt']?>" />
				<ul id="ownerdetail">
					<li>Name : <b><?=$c['a_name']?></b> <?=$c['myid']?><span>  [ IP : <?=$c['a_ip']?> ] </span></li>
					<li>Email / Msn : <span><?=displayEmail( $c['email'] )?></span></li>
					<li>วันที่ : <?=datetransform( $c['a_datetime'], "thf" );?></li>
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
			<h3>ข้อตกลง &amp; เงื่อนไขการใช้งาน</h3>
			<ol>
				<li>กรณีที่ข้อความและรูปภาพในกระทู้นี้แต่งโดยผู้ลงกระทู้เอง ลิขสิทธิ์จะเป็นของผู้ลงกระทู้โดยตรง ห้ามมิให้คัดลอก ทำซ้ำ เผยแพร่ก่อนได้รับอนุญาตจากผู้ลงข้อความ</li>
				<li>กรณีที่ข้อความและรูปภาพในกระทู้นี้ทำการคัดลอก ทำซ้ำ มาจากของบุคคลอื่นๆ ผู้ลงกระทู้จะต้องทำการอ้างอิงอย่างเหมาะสม และต้องรับผิดชอบเรื่องการจัดการ ลิขสิทธิ์แต่เพียงผู้เดียว</li>
				<li>ข้อความและรูปภาพที่ปรากฏในกระทู้ที่ท่านเห็นอยู่นี้ เกิดจากการตั้งกระทู้และถูกส่งขึ้นกระดานข่าวโดยอัตโนมัติจากบุคคลทั่วไป ซึ่งเด็กดีดอทคอมมิได้มีส่วนร่วมรู้เห็น ตรวจสอบ หรือพิสูจน์ข้อเท็จจริงใดๆ ทั้งสิ้น ผู้ใดพบเห็นข้อความ หรือรูปภาพในกระทู้ที่ละเมิดลิขสิทธิ์ หรือไม่เหมาะสม โปรดแจ้งผู้ดูแลระบบเพื่อดำเนินการที่ board(at)dek-d.com ( ทุกวัน 24 ชม ) หรือ <br />
				<span style="color: red;">ติดต่อทีมงานเว็บไซต์ Dek-D.com ได้ที่ 02-860-1142 ต่อ 140</span><br />( จ-ศ 09.00-18.00 พักเที่ยง 12.00-13.00 )</li>
			</ol>
		</div>
	</div>