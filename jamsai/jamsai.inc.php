<?php

	require_once("/webroot/ddfw/database/init.engine.php");
	include_once('/webroot/www/main/content/lib.inc.php');
	include_once('/webroot/www/main/myLib/login.inc.php');
	include_once('/webroot/www/main/myLib/vote/lib.inc.php');
	
	define('PROGRAM_ID', 16); 	// for Vote Lib
	
	define('TIMESTAMP',time());
	define('TB_HEADER','jamsai2013_header');
	define('TB_CHAP','jamsai2013_chapter');
	define('TB_COMMENT','jamsai2013_comment');
	define('TB_REG','jamsai2013_regis');
	define('TB_VOTE','jamsai2013_vote');
	
	//เปลี่ยนทุกสัปดาห์จนกว่าจะสิ้นสุดโครงการ *Remember
	$currentChapter=7;  //สิ้นสุดโครงการแล้ว
	
	
	$isGod = ( strpos($_SESSION['dekdee']['priv_class'], 'S') !== false )||$_SESSION['dekdee']['user_id']==3363809;
	
	
	$upload_dir = "/tmp/";
	$image_url = "http://image.dek-d.com/1/jamsai/";
	
	$registerOpen=mktime(0,0,0,7,2,2013);
	$registerClose=mktime(23,59,59,8,23,2013);
	
	
	$chapter_week = array();	
	array_push( $chapter_week, 0 );																	// Chapter ที่ 0
	array_push( $chapter_week, $registerOpen );												// Chapter ที่ 1 เริ่มเมื่อ วันที่เปิดรับสมัคร
	$finalOpen = mktime(0,0,0,9,9,2013);																			
	array_push( $chapter_week, $finalOpen );													// Chapter ที่ 2  ( ประกาศผู้เข้ารอบ )
	
	$secPerDay = 604800;
	for($i = 1 ; $i<7 ; $i++){
		array_push( $chapter_week, $finalOpen + ( $i * $secPerDay) );
	}
	
	$voteOpen= $chapter_week[ $currentChapter ];
	$voteClose=$chapter_week[ $currentChapter + 1 ];
	if ($currentChapter ==7)
		$voteClose-=129600;
	//$openVote = ( TIMESTAMP > $voteOpen && TIMESTAMP < $voteClose ) || $isGod;
	
	
	$sendOpen = $chapter_week[ $currentChapter ];												// ช่วงเวลาการ เปิดให้ส่งตอนต่อไปในแต่ละ สัปดาห์ ( เที่ยงวันจันทร์ )
	
	$sendClose = $chapter_week[ $currentChapter + 1 ] - 172800;
	
	//ลิสกรรมการนักเขียนหน้าใส
	$judgement=array(
		3367944,	//พี่น้อง Writer Columnist Dek-D
		1201344,	//สนพ.แจ่มใส
		648866,	//แสตมป์เบอรี่
		631237		//หนุ่มกรุงโซล
	);
	
	function chkChapter(){
			global $chapter_week;
			foreach( $chapter_week as $chap_no => $mktime ){
				if( TIMESTAMP < $mktime) return $chap_no - 1;
			}
			return 99; // เหมือนผ่านวันสุดท้ายไปแล้ว
	}
	
	function isOpenSend(){
		global $chapter_week,$currentChapter,$sendOpen, $sendClose;
		if ($currentChapter==1|| !isset($chapter_week[ $currentChapter + 1 ]))
			return false;
			
		return ( TIMESTAMP > $sendOpen && TIMESTAMP < $sendClose );
	}
	
	function isOpenVote(){
		global $chapter_week,$currentChapter,$voteOpen, $voteClose,$isGod;
		
		if ($currentChapter==1|| !isset($chapter_week[ $currentChapter + 1 ]))
			return false;
		//echo date("Y-m-d H:i:s",$voteOpen );
		//echo date("Y-m-d H:i:s",TIMESTAMP );
		//echo date("Y-m-d H:i:s",$voteClose );
		 return ( TIMESTAMP > $voteOpen && TIMESTAMP < $voteClose ) ;
	}
	
	function showConfirmErr($title,$msg,$linkto=''){
		global $_menu;
		$_title=$title;
		$_msg = '<span class="f-m-pin" style=" font-size:36px">' . $msg . '</span>';
		if ($linkto!='')
			$_msg .='<br /><input name="backstep1" type="button" id="step1" value="กลับ" onclick="location.href=\''.$linkto.'\';">';
		$pageStat = 'jamsai_y6_regis_err_notfound';
		include('message.php');
		exit;
	}
	
	function showText($title,$msg,$linkto=''){
		$_title=$title;
		$_msg = '<span class="f-m-pin" style=" font-size:24px">' . $msg . '</span>';
		if ($linkto!='')
			$_msg .='<br /><input name="backstep1" type="button" id="step1" value="ปิด" onclick="location.href=\''.$linkto.'\';">';
		else	
			$_msg .='<br /><input name="backstep1" type="button" id="step1" value="ปิด" onclick="window.close();">';
		include('message_popup.php');
	}
	
	function isOpen(){
		global $registerOpen,$registerClose,$isGod;
		return false; //ปิดการลงทะเบียน
	}
	
	function isJudgement(){
		global $isGod,$judgement;
		return $isGod || in_array($_SESSION['dekdee']['user_id'],$judgement);
	}
	
	function showNovel(){
		global $isGod,$openVote,$finalOpen;
		if (isJudgement() || $isGod)
			return;
		if( $finalOpen>TIMESTAMP){
			header('location: index.php');
			exit;
		}
	}
	
	function checkRegisterClose(){
		global $isGod,$registerOpen,$registerClose;
		//if ($isGod)
		//	return;
		//ปิดการรับสมัคร
		header('location: close.php');
		exit;
		/*if( $registerOpen>TIMESTAMP){
			header('location: soon.php');
			exit;
		}
		elseif( $registerClose<TIMESTAMP){
			header('location: close.php');
			exit;
		}*/
	}
	
	function checkLogin(){
		global $_menu;
		if( !isLogin() ){
			$url = 'http://my.dek-d.com/dek-d/my.id_station/login.php?refer=http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			$_msg = '<span class="f-m-pin">กรุณาล๊อคอินก่อนส่งผลงาน<br /><a class="l-m-ora" href ="' . $url . '" target="_self">คลิกที่นี่เพื่อล๊อคอิน</a></span>';
			$pageStat = 'jamsai_y6_regis_err_login';
			include('message.php');
			exit;
		}
	}
	
	function cvStrtoDB($str, $fck = false){
		if( ! $fck ){
			$patt = array("<", ">", "'", "\"");
			$rep = array("&lt;","&gt;","&#039;","");
			$str = trim( $str );
		}
		$str = (get_magic_quotes_gpc()) ? stripslashes( $str ) : $str ;
		$str = str_replace( $patt ,$rep, $str);
		return $str;
	}
	
	function countPV($str){
		$temp = preg_replace('/&#([0-9]+);/e', 'x', $str);
		return strlen($temp);
	}
	
	function uploadJamsai($upfile) {
		global $upload_dir;
		$fSize = 70;
		list($width, $height, $type, $attr) = getimagesize($upfile);
		if($height > $width){ 	$tn_height = $fSize; 	$tn_width = ceil($fSize/$height * $width); }
		else{							$tn_width = $fSize; 	$tn_height = ceil($fSize/$width * $height); }
		if ($type==2) {			$src = ImageCreateFromJpeg($upfile); 	$out['name'] = $_SESSION['dekdee']['user_id'] . ".jpg";}
		else if($type==1) {	$src = ImageCreateFromGif($upfile); 		$out['name'] = $_SESSION['dekdee']['user_id'] . ".gif";}
		else{							showConfirmErr('ขออภัย!','นามสกุลของรูปภาพไม่ตรงกับที่กำหนด','register.php'); }
		$ofile = $upload_dir . $out['name'];
		$dst = ImageCreateTrueColor($tn_width, $tn_height);
		ImageCopyResized($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
		if ($type==2) {			ImageJpeg($dst, $ofile); $out['ext'] = 'jpg'; }
		else if($type==1) {	ImageGif($dst, $ofile); $out['ext'] = 'gif'; }
		else{							showConfirmErr('ขออภัย!','นามสกุลของรูปภาพไม่ตรงกับที่กำหนด','register.php'); }		
		ImageDestroy($src);
		ImageDestroy($dst);
		
		require_once('/webroot/ddfw/ddstorage/init.customevent.php');
		$s3 = new CustomLayer('jamsai/');
		if (!$s3->store('',$out['name'], $ofile)){
			return null;
		}
		@unlink($ofile);
		return $out;
	}
	
	function checkRegisterDuplicate(){
		global $db, $_menu;
		$sql = 'select user_id from ' . TB_HEADER . ' where type="1" and user_id = "' . $_SESSION['dekdee']['user_id'] . '"';
		$res = $db->query($sql, 'content', 'r');
		if( $db->num_rows($res) > 0 ){
			showConfirmErr('ขออภัย!','1 member สามารถส่งได้เพียง 1 ผลงานเท่านั้น','index.php');
			exit;
		}
	}
	
	function checkConfirm(){
		global $image_url;
		return; //ยกเลิกการทำงาน
		$hasSession = array_key_exists('jamsai2013', $_SESSION);
		if( $_SERVER['REQUEST_METHOD'] == 'POST'){
			$f = $_FILES['thumb'];
			if( strlen($f['tmp_name']) > 0 ){
				$uploadJamsai =  uploadJamsai( $f['tmp_name'] );
				if (!$uploadJamsai)
					return;
				$s['logo'] = $uploadJamsai['ext'];
				$s['pic'] = $image_url . $uploadJamsai['name'];
			}else{
				$s['logo'] = ( $hasSession ) ? $_SESSION['jamsai2013']['logo'] : 0 ;
				$s['pic'] =  ( $hasSession ) ? $_SESSION['jamsai2013']['pic'] : 'http://image.dek-d.com/1/jamsai/default.jpg' ;
			}
			$p = $_POST;
			foreach($p as $k=>$v){
				if($k == '' || $k == '') continue;
				$p[$k] = $v;
			}
			if( array_key_exists('title', $p) ) $s['title'] = cvStrtoDB( $p['title'] );
			if( array_key_exists('abstract', $p) ) $s['abstract'] = cvStrtoDB( $p['abstract'] );
			if( array_key_exists('synopsis', $p) ) $s['synopsis'] = cvStrtoDB($p['synopsis'], true);
			if( array_key_exists('t_title', $p) ) $s['t_title'] = cvStrtoDB( $p['t_title'] );
			if( array_key_exists('lstory', $p) ) $s['lstory'] = cvStrtoDB($p['lstory'], true);
			
			if( substr($s['synopsis'], -6) == '<br />' || substr($s['synopsis'], -6) == '&#160;' ) $s['synopsis'] = substr($s['synopsis'], 0, -6);
			if( substr($s['t_text'], -6) == '<br />' || substr($s['t_text'], -6) == '&#160;' ) $s['t_text'] = substr($s['t_text'], 0, -6);
			
			$_SESSION['jamsai2013'] = $s;
			
			if( countPV( $s['title'] ) < 3 ) showConfirmErr('ขออภัย!','กรุณาระบุชื่อเรื่อง','register.php');
			elseif( countPV( $s['title'] ) > 60 ) showConfirmErr('ขออภัย!','ความยาวชื่อเรื่อง<br />เกิน 60 ตัวอักษร','register.php');
			elseif( countPV( $s['abstract'] ) < 3 ) showConfirmErr('ขออภัย!','กรุณาระบุชื่อเรื่อง','register.php');
			elseif( countPV( $s['abstract'] ) > 200 ) showConfirmErr('ขออภัย!','ความยาวของคำแนะนำเรื่อง<br />ต้องไม่เกิน 200 ตัวอักษร','register.php');
			elseif( strlen($s['synopsis']) < 4 ) showConfirmErr('ขออภัย!','กรุณาระบุเรื่องย่อ/โครงเรื่องทั้งหมด','register.php');
			elseif( strlen($s['t_title']) < 4 ) showConfirmErr('ขออภัย!','กรุณาระบุชื่อตอนที่ 1','register.php');
			elseif( strlen($s['lstory']) < 4 ) showConfirmErr('ขออภัย!','กรุณาระบุเนื้อหาตอนที่ 1','register.php');
		}else{
			if( ! $hasSession ) showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง');
		}
	}
	
	function checkSave(){
		return; //ยกเลิกการทำงาน
		if( $_SERVER['REQUEST_METHOD'] != 'POST' ){ showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); }
		else{ $p = $_POST; }
		if( countPV( $p['firstname'] ) < 3 ) showConfirmErr('ขออภัย!','กรุณาระบุชื่อเรื่อง','confirm.php');
		if( countPV( $p['surname'] ) < 3 ) showConfirmErr('ขออภัย!','กรุณาระบุนามสกุล','confirm.php');
		if( countPV( $p['aliasname'] ) < 3 ) showConfirmErr('ขออภัย!','กรุณาระบุนามปากกา','confirm.php');
		if( countPV( $p['telephone'] ) < 9 ) showConfirmErr('ขออภัย!','กรุณาระบุเบอร์โทรฯ','confirm.php');
	}
	
	function jamsaiSubmission(){
		global $db;
		return; //ยกเลิกการทำงาน
		$hasSession = array_key_exists('jamsai2013', $_SESSION);
		if( $_SERVER['REQUEST_METHOD'] != 'POST' ){ showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); }
		else{ $p = $_POST; }
		if( ! $hasSession ){ showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); }
		else{ $j = $_SESSION['jamsai2013'];}
		
		$sql = 'INSERT INTO ' . TB_HEADER . '(story_id, title, writer, abstract, synopsis, type, visitors, posted, vote_all, score_all, vote_week, score_week, logo, selected, user_id, chapter, updated, code) values( null, "' . 
		$db->real_escape_string( $j['title'], 'content', 'w' )  . '", "' . 
		$db->real_escape_string( cvStrtoDB( $p['aliasname'] ), 'content', 'w' ) . '", "' . 
		$db->real_escape_string( $j['abstract'], 'content', 'w' ) . '", "' . 
		$db->real_escape_string( $j['synopsis'], 'content', 'w' ) . '", "1", 0, 0, 0, 0, 0, 0, "' . $j['logo'] . '", 0, "' . $_SESSION['dekdee']['user_id'] . '", 0, now(), null )';
		
		$result = $db->query($sql, 'content', 'w');
		
		$story_id = $db->insert_id('content');
		if( ! $story_id ){
			showConfirmErr('ขออภัย!','เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !!','confirm.php');
			return;
		}
		
		$sql = 'INSERT INTO ' . TB_REG . '(id, story_id, user_id, fname, lname, aliasname, tel) value( null, "' . $story_id . '", "' . $_SESSION['dekdee']['user_id'] . '", "' . 
		$db->real_escape_string( cvStrtoDB( $p['firstname'] ), 'content', 'w' ) . '", "' . 
		$db->real_escape_string( cvStrtoDB( $p['surname'] ), 'content', 'w' ) . '", "' . 
		$db->real_escape_string( cvStrtoDB( $p['aliasname'] ), 'content', 'w' ) . '", "' . 
		$db->real_escape_string( cvStrtoDB( $p['telephone'] ), 'content', 'w' ) . '") ';
		
		if( !$db->query($sql, 'content', 'w') ){
			$db->query('DELETE from ' . TB_HEADER . ' where story_id = "' . $id . '"', 'content', 'w');
			
			showConfirmErr('ขออภัย!','เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !!','confirm.php');
			return;
		}
		
		if (!addChapter($story_id)){	
			$db->query('DELETE from ' . TB_REG . ' where story_id = "' . $id . '"', 'content', 'w');
			$db->query('DELETE from ' . TB_HEADER . ' where story_id = "' . $id . '"', 'content', 'w');		
			
			showConfirmErr('ขออภัย!','เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !!','confirm.php');
		}
		
		unset($_SESSION['jamsai2013']);
	}
	
	function checkCandidate(){
		global $db, $currentChapter;
		$res = $db->query('select story_id from ' . TB_HEADER . ' where user_id="' . $_SESSION['dekdee']['user_id'] . '" and selected=0', 'content', 'r');
		if( $db->num_rows($res) > 0 ){
			$r = $db->fetch_assoc($res);
			$res = $db->fetch_array($db->query('select count(*) from ' . TB_CHAP . ' where id = ' . $r['story_id'] . ' and chapter = ' . $currentChapter, 'content', 'r'));
			
			if($res[0] == 1){
				showConfirmErr('ขออภัย!','คุณได้ทำการส่งเรื่องของ Chapter นี้ไปแล้ว');
			}
			return $r['story_id'];
			
		}else{
			showConfirmErr('ไม่สามารเข้าใช้งานได้','');
			return ;	
		}
	}
	
	function addChapter( $story_id ){
		global $db, $currentChapter;
		$hasSession = array_key_exists('jamsai2013', $_SESSION);
		if( ! $hasSession ){ showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); }
		else{ $j = $_SESSION['jamsai2013'];}
		
		$res = $db->query('INSERT INTO ' .TB_CHAP . '( id, chapter, title, body, updated, visitors, score, vote) values("' . $story_id . '", "' . $currentChapter . '","' . 
		$db->real_escape_string( $j['t_title'], 'content', 'w' ) . '", "' . 
		$db->real_escape_string( $j['t_text'], 'content', 'w') . '", now(), 0,0 ,0)', 'content', 'w');
		
		if($res){
			$db->query('update ' . TB_HEADER . ' set chapter = "' . $currentChapter . '" where story_id = "' . $story_id . '"', 'content', 'w');
			return true;
		}else return false;
	}
	
	function checkSendConfirm(){
		global $currentChapter;
		
		$hasSession = array_key_exists('jamsai2013', $_SESSION);
		if( $_SERVER['REQUEST_METHOD'] == 'POST'){
			$p = $_POST;
			foreach($p as $k=>$v){
				if($k == 'x' || $k == 'y') continue;
				$p[$k] = $v;
			}
			if( array_key_exists('t_title', $p) ) $s['t_title'] = cvStrtoDB( $p['t_title'] );
			if( array_key_exists('t_text', $p) ) $s['t_text'] = cvStrtoDB($p['t_text'], true);
			if( substr($s['t_text'], -6) == '<br />' || substr($s['t_text'], -6) == '&#160;' ) $s['t_text'] = substr($s['t_text'], 0, -6);
			
			$_SESSION['jamsai2013'] = $s;
			
			if( strlen($s['t_title']) < 4 ) showConfirmErr('กรุณาระบุชื่อตอนที่ ' . $currentChapter,'');
			elseif( strlen($s['t_text']) < 4 ) showConfirmErr('กรุณาระบุเนื้อหาตอนที่ ' . $currentChapter,'');
		}else{
			if( ! $hasSession ) showConfirmErr('การเรียกใช้งานไม่ถูกต้อง','');
		}
	}
	
	function checkSendClose(){		
		if( ! isOpenSend() )
			showConfirmErr('ขออภัย','ปิดรับการส่งตอนต่อไป');
	}
	
	function getSumScoreAll(){
		global $db;
		$res = $db->fetch_array($db->query('select SUM(vote_all) as va,SUM(score_all) as sa,	SUM(vote_week) as vw,SUM(score_week) sw from ' . TB_HEADER.' WHERE selected<2', 'content', 'r'));
		return $res ;
	}
	
	function getAllcount(){
		global $db;
		$res = $db->fetch_array($db->query('select count(*) as c from ' . TB_HEADER, 'content', 'r'));
		return ( $res ) ? $res['c'] : 0 ;
	}
	
	function getAllList( $page = 1){
		global $db, $itemPerPage, $image_url;
		$start=($page-1) * $itemPerPage;
		$limit = ' limit ' . $start . ', ' . $itemPerPage;
		$res = $db->query('select * from ' . TB_HEADER . ' order by story_id DESC ' . $limit, 'content', 'r');
		while($r = $db->fetch_assoc($res)){ 
			$r['pic'] = ($r['logo']) ? $image_url  . $r['user_id'].'.'.$r['logo'] : 'http://image.dek-d.com/1/jamsai/default.jpg' ;
			$r['regisdetail'] = getContact($r['user_id']);
			$out[] = $r; 
		}
		return $out;
	}
	
	function getContact($user_id){
		global $db;
		$res = $db->query('select * from ' . TB_REG . ' where user_id = "' . $user_id . '"', 'content', 'r' );
		$r = $db->fetch_assoc($res);
		return $r['fname'] . "\t" . $r['lname'] . "
		" . $r['tel'] . "\t" . $r['email'];
	}
	
	function dateFormat($datetime){
		$th = array ("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		list ($year, $month, $day, $hour, $min, $sec) = preg_split ('/[\s-:]+/', $datetime);
		return $day . ' ' . $th[ intval($month)] . ' ' . (($year + 543) % 100);
	}
	
	function getJudgementComment( $story_id ){
		global $db, $judgement;
		$res = $db->query('select * from ' . TB_COMMENT . ' where story_id = "' . $story_id . '" and user_id in ( '.implode(',',$judgement).' ) order by a_index desc', 'content','r');
		while($r = $db->fetch_assoc($res)){ 
			if( $out[ $r['user_id'] ] == '' ){ $out[$r['user_id']] = $r; }
		}
		return $out;
	}
	
	function getAllComment($story_id, $page = 1){
		global $db, $judgement, $commentPerPage, $RANKING_TXT, $userthumb_url, $userthumb_url2;		
		$out[0] = getJudgementComment( $story_id );
		$start = ( $page - 1 ) * $commentPerPage;
		$limit = ' limit ' . $start . ', ' . $commentPerPage;
		$res = $db->query('select * from ' . TB_COMMENT . ' where story_id = "' . $story_id . '" order by a_index desc ' . $limit , 'content','r');
		while($r = $db->fetch_assoc($res)){
			if( in_array(  $r['user_id'], $judgement)){
				if( $out[0][ $r['user_id'] ]['a_index'] == $r['a_index'] ) continue;
			}
			$isMaster = false;
			$r['theme'] = 'orange';
			$r['myid'] ='';		
			if( $r['user_id'] != 0 ){
				if ( $r['a_pic_alias'] == '.jpg' || $r['a_pic_alias'] == '.gif' || $r['a_pic_alias'] == 'my2' ) {
					if( $r['a_pic_alias'] == 'my2' ) $r['toon'] =  getDisplay( $r['user_id'] );
					else $r['toon'] =  getDisplay( $r['user_id'] , 1 );
					
					if($r['a_sex'] == 'M') $r['theme'] = 'blue';
					else if($r['a_sex'] == 'F') $r['theme'] = 'pink';
				}else{
					if( $r['a_pic_alias'][0] == 's' || $r['a_pic_alias'][0] == 'f' ) $r['toon'] = getDisplay( $r['user_id'] );
					else $r['toon'] = 'http://www0.dek-d.com/board/pic/toon/' . $r['a_pic_alias'] . '.gif';
					
					$isMaster = ($r['a_pic_alias'][0] == 'w' || $r['a_pic_alias'][0] == 's');
					$r['theme'] = ( $isMaster ) ? 'red' : ( ( $r['a_pic_alias'][0] == 'f' ) ? 'red' : 'orange' ) ;
					$r['a_ip'] =  ( $isMaster ) ? '[hidden]' : $r['a_ip'] ;
				}
				$r['myid'] = '<a href="/board/gotoMYid.php?id=' . $r['user_id'] .'" title="เข้าชม My.iD ของ ' . convertForInTag( $r['a_name'] ) . '"> &lt; My.iD &gt; </a>';
			}else{
				$r['toon'] = 'http://www0.dek-d.com/board/pic/toon/' . $r['a_pic_alias'] . '.gif';
			}
			$r['a_message']=stripslashes($r['a_message']);
			$r['rankl'] =  getRankIndex( $r['user_id'], $r['score'], $isMaster );
			$r['rankt'] = $RANKING_TXT[ $r['rankl'] ];
			list($r['msg_a'], $r['msg_b']) = explode("<!--PS-->", $r['a_message']);
			$out[1][] = $r;
		}
		return $out;
	}
	
	function getStory(){
		global $db, $image_url;
		$story_id = array_key_exists('id', $_GET) ? intval($_GET['id']) : false;
		if( ! $story_id ) showConfirmErr('ขออภัย!','ไม่พบนิยายเรื่องนี้');
		
		$res = $db->query('select * from ' . TB_HEADER . ' where story_id ="' . $story_id . '" AND selected <= 1 ', 'content', 'r');
		if( ! $res || $db->num_rows( $res ) == 0 ) showConfirmErr('ขออภัย!','ไม่พบข้อมูล');
		$out = $db->fetch_assoc($res);
		$out['pic'] = ($out['logo']) ? $image_url  . $out['user_id'] . '.'.$out['logo'] : '/jamsai/image/img.gif' ;
		return $out;
	}
	
	function getStoryChapter(){
		global $db;
		$story_id = array_key_exists('id', $_GET) ? intval($_GET['id']) : false;
		if( ! $story_id ) showConfirmErr('ขออภัย!','ไม่พบข้อมูล');
		$chapter = array_key_exists('chapter', $_GET) ? intval($_GET['chapter']) : false;
		
		if( ! $chapter ) return false;
		
		$res = $db->query('select * from ' . TB_CHAP . ' where id ="' . $story_id . '" and chapter ="' . $chapter . '"', 'content', 'r');
		if( ! $res || $db->num_rows($res) == 0 ) showConfirmErr('ขออภัย!','ไม่พบข้อมูล ตอน');
		$out = $db->fetch_assoc($res);
		return $out;
	}
	
	function getAllChapter(){
		global $db;
		$story_id = array_key_exists('id', $_GET) ? intval($_GET['id']) : false;
		if( ! $story_id ) showConfirmErr('ขออภัย!','ไม่พบนิยายเรื่องนี้');
		$res = $db->query('select * from ' . TB_CHAP . ' where id ="' . $story_id . '" order by chapter', 'content', 'r');
		while( $row = $db->fetch_assoc($res)){
			$row['updated'] =  dateFormat( $row['updated'] );
			$out[] = $row;
		}
		return $out;
	}
	
	function chapterAddView($id,$chap){
		global $db;
		
		$id=intval($id);
		$chap=intval($chap);
		
		$db->query('update '.TB_HEADER.' set visitors=visitors+1 where story_id='.$id,'content','w');
		$db->query('update '.TB_CHAP.' set visitors=visitors+1 where id='.$id.' and chapter='.$chap,'content','w');
	}
	
	function jamsaiDoVote($ispopup=false){
		global $currentChapter, $openVote, $db;
		if( !isOpenVote() ){ 
			if ($ispopup)
				showText('ขออภัย!','ยังไม่เปิดรับการโหวต'); 
			else
				showConfirmErr('ขออภัย!','ยังไม่เปิดรับการโหวต'); 
			exit;
		}
		if (array_key_exists('story_id', $_POST)){
			$story_id = intval($_POST['story_id']);
		}
		elseif (array_key_exists('story_id', $_GET)){
			$story_id = intval($_GET['story_id']);
		}
		else
			$story_id = 0;
			
		if( $story_id < 1 ){ 
			if ($ispopup)
				showText('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); 
			else
				showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); 
			exit;
		}
		
		$forto=(strlen( $_SERVER['HTTP_REFERER'] ) > 0) ? $_SERVER['HTTP_REFERER'] : 'view.php?id=' . $story_id ;
		
		$voteRes =  addVote(PROGRAM_ID ,$story_id) ;
		if( $voteRes != 1 ){ 
			
			if( $voteRes == 2 || $voteRes == 3 || $voteRes == 4 || $voteRes == 7 ) {
				//showConfirmErr('ขออภัย!','เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง',$forto ); 
				if ($ispopup)
					showText('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง' ); 
				else
					showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง',$forto ); 
				exit;
			}
			if( $voteRes == 5 ) {
				//showConfirmErr('ขออภัย!','<br />ไม่สามารถใช้งานได้'); 
				if ($ispopup)
					showText('ขออภัย!','ไม่สามารถใช้งานได้' ); 
				else
					showConfirmErr('ขออภัย!','ไม่สามารถใช้งานได้'); 
				exit;
			}
			if( $voteRes == 6 ){
				//showConfirmErr('ขออภัย!','<span style="font-size: 30px;">คุณได้ทำการโหวตไปแล้วใน 1 ชั่วโมงที่ผ่านมา</span><span style="font-size:12px; color:#112211;"> <br /><br /> * ในกรณีที่คุณไม่ได้โหวต อาจเป็นไปได้ว่าผู้ที่ใช้ไอพีนี้ก่อนคุณได้ทำการโหวตไปแล้วครับ</span>',$forto); 
				if ($ispopup)
					showText('ขออภัย!','<span style="font-size: 24px;">คุณได้ทำการโหวตไปแล้ว กรุณาโหวตใหม่ในชั่วโมงถัดไป</span>' ); 
				else
					showConfirmErr('ขออภัย!','<span style="font-size: 30px;">คุณได้ทำการโหวตไปแล้วใน 1 ชั่วโมงที่ผ่านมา</span><span style="font-size:12px; color:#112211;"> <br /> * ในกรณีที่คุณไม่ได้โหวต อาจเป็นไปได้ว่าผู้ที่ใช้ไอพีนี้ก่อนคุณได้ทำการโหวตไปแล้วครับ</span>',$forto); 
				exit;
			}
			return false;
		}
		$res = $db->query('UPDATE ' . TB_HEADER . ' set 
			score_all = score_all+1, 
			vote_all = vote_all+1, 
			score_week = score_week+1, 
			vote_week = vote_week+1 where story_id="' . $story_id . '" and selected = 0', 'content', 'w');
		if( mysql_affected_rows() == 0 ){ 
			if ($ispopup)
				showText('ขออภัย!','ไม่สามารถโหวตให้เรื่องที่ตกรอบไปแล้วได้' ); 
			else
				showConfirmErr('ขออภัย!','ไม่สามารถโหวตให้เรื่องที่ตกรอบไปแล้วได้',$forto); 
			exit;
		} 
		$db->query('UPDATE ' . TB_CHAP . ' set score=score+1, vote=vote+1 where id="' . $story_id . '" and chapter = "' . $currentChapter . '"', 'content', 'w');
		
		if( $_SESSION['dekdee']['user_id'] > 0 ){
			$db->query('INSERT INTO ' . TB_VOTE .' set 
				user_id = "' . $_SESSION['dekdee']['user_id'] . '", 
				username ="' . $_SESSION['dekdee']['username'] . '",
				story_id ="' . $story_id . '",
				chapter ="' . $currentChapter . '",
				vote_date = now()', 'content', 'w');
			setVoteByCookie($story_id,$_SESSION['dekdee']['user_id']);
		}
		else
			setVoteByCookie($story_id);
		return $forto;
	}
	
	function jamsaiAddComment(){
		global $db;
		if( $_SERVER['REQUEST_METHOD'] != 'POST'){ showConfirmErr('ขออภัย!','การเรียกใช้งานไม่ถูกต้อง'); }
		$p = $_POST;
		$fck = ( $p['textmode'] == 'member' );
		foreach($p as $k=>$v){
			if($k == '') continue;
			else if ( $k == 't_msg') $p[$k] = cvStrtoDB( $v, $fck );
			else if ( $k == 't_email') $p[$k] = strtolower( cvStrtoDB( $v ) );
			else
				$p[$k] = cvStrtoDB($v);
		}
		if( substr($p['t_msg'], -6) == '<br />' || substr($p['t_msg'], -6) == '&#160;' ) $p['t_msg'] = substr($p['t_msg'], 0, -6);
		
		if (isJudgement()){
			if( countPV( $p['t_msg'] ) < 6 || countPV( $p['t_msg'] ) > 9000 ){ showConfirmErr('ขออภัย!','ข้อความที่โพสจะต้องไม่น้อยกว่า 6 ตัวอักษรและไม่เกิน 9000 ตัวอักษร'); }
		}
		else{
			if( countPV( $p['t_msg'] ) < 6 || countPV( $p['t_msg'] ) > 3000 ){ showConfirmErr('ขออภัย!','ข้อความที่โพสจะต้องไม่น้อยกว่า 6 ตัวอักษรและไม่เกิน 3000 ตัวอักษร'); }
		}
		if( ! scanBadWords( $p['t_msg'] ) ){ showConfirmErr('ขออภัย!','มีข้อความที่น่าสงสัยว่าจะเป็นโฆษณาหรือกระทู้ลูกโซ่');}
		
		if( $p['t_mem'] == 'yes' ){
			if( ! isLogin() && ! do_login_2008($p['t_username'], $p['t_password'] ) ){ showConfirmErr('ขออภัย!','เข้าระบบไม่ได้; เนื่องจาก username หรือรหัสผ่านผิด'); }
			if( !$fck ){
				$p['t_msg']= htmlspecialchars_decode( formatNonMember($p['t_msg']) ); 
				$p['t_msg']=formatBYEmo($p['t_msg']);
			}
		}else{
			if( ! chkName( $p['t_name'] )){ showConfirmErr('ขออภัย!','ไม่ได้กรอกชื่อ');}
			if( ! chkEmail( $p['t_email'] )){ showConfirmErr('ขออภัย!','อีเมล์ไม่ถูกต้อง ช่องนี้คุณสามารถเว้นไว้ได้ แต่ถ้ากรอกต้องกรอกให้ถูก'); }
			if( ! chkPic( $p['t_pic'] )){ showConfirmErr('ขออภัย!','รูปตัวแทนที่คุณเลือกไม่สามารถใช้งานได้'); }
			if( ! isLogin() ) {
				$verify_result = verificate();
				if( $verify_result !== true ) showConfirmErr('ขออภัย!','พิมพ์ตัวเลขไม่ถูก');
			}
			if($fck){
				$p['t_msg']=formatBYEmo2($p['t_msg']);
				$p['t_msg']=strip_tags($p['t_msg'], "<br><p>");
			}else{
				$p['t_msg']= htmlspecialchars_decode( formatNonMember($p['t_msg']) ); 
			}
			$p['t_msg']=formatBYEmo($p['t_msg']);
		}
		$ans = getAIndex( $p['refer_id'] );
		
		if( isLogin() && $p['t_mem'] == "yes" ){
			$sql = 'INSERT INTO ' . TB_COMMENT . ' set 
				story_id = "' . 		$p['refer_id'] . '",
				a_index = "' . 		$ans . '",
				a_message = "' . 	$db->real_escape_string( $p['t_msg'], 'content', 'w' ) . '",
				a_name = "' . 		$db->real_escape_string( $_SESSION['dekdee']['aliasname'], 'content', 'w'  ) . '",
				a_pic_alias = "' . 	$db->real_escape_string( $_SESSION['dekdee']['aliaspic'], 'content', 'w'  ) . '",
				a_email = "' . 		$db->real_escape_string( $_SESSION['dekdee']['email'], 'content', 'w'  ) . '",
				a_sex = "' . 			$_SESSION['dekdee']['sex'] . '",
				a_ip = "' . 				$_SERVER['REMOTE_ADDR'] . '",
				user_id = "' . 		$_SESSION['dekdee']['user_id'] . '",
				score = "' . 			$_SESSION['dekdee']['score'] . '",
				slogan = "' . 			$db->real_escape_string( $_SESSION['dekdee']['slogan'] , 'content' , 'w' ) . '",
				username = "' . 	$_SESSION['dekdee']['username'] . '",
				a_datetime = now()';			
		}else{
			$sql = 'INSERT INTO ' . TB_COMMENT . ' set 
				story_id = "' . 		$p['refer_id'] . '",
				a_index = "' . 		$ans . '",
				a_message = "' . 	$db->real_escape_string( $p['t_msg'], 'content', 'w'  ) . '",
				a_name = "' . 		$db->real_escape_string( $p['t_name'], 'content', 'w'  ) . '",
				a_pic_alias = "' . 	$db->real_escape_string( $p['t_pic'], 'content', 'w'  ) . '",
				a_email = "' . 		$db->real_escape_string( $p['t_email'], 'content', 'w'  ) . '",
				a_sex = "' . 			( ($p['t_pic']=="boy") ? 'M' : ($p['t_pic']=='girl') ? 'F' : 'U' ) . '",
				a_ip = "' . 				$_SERVER['REMOTE_ADDR'] . '",
				a_datetime = now()';
		}	
		$result = $db->query($sql, 'content', 'w');
		/*
		$err = mysql_error();
		if( strlen($err) > 0){
			echo $err . '<hr />';
			echo $sql . '<hr />';
			echo "<pre>";
			print_r($p);
			echo "</pre>";
		}
		*/
		if($result) $db->query('UPDATE ' . TB_HEADER . ' set posted = posted+1 where story_id ="' . $p['refer_id'] . '"', 'content', 'w');
	}
	
	function getAIndex( $story_id ){
		global $db;
	$out = $db->fetch_assoc( $db->query('select posted+1 as post from ' . TB_HEADER . ' where story_id = ' . $story_id, 'content', 'r' ) );
		return $out['post'] ;
	}
	
	function getPassList(){
		global $db, $currentChapter, $image_url;
		//$c = $db->fetch_assoc( $db->query('select sum(vote_week) as sumvote from ' . TB_HEADER . ' where selected = 0 and type = 1 ', 'content', 'r') );
		$c=getSumScoreAll();
		$totalVote = $c['vw'];
		$res = $db->query('select * from ' . TB_HEADER . ' where type = 1 and selected < 2 order by selected,  code,story_id limit 0, 20', 'content', 'r');
		$maxVote = 0;
		while($r = $db->fetch_assoc($res)){
			$r['pic'] = ( $r['logo'] ) ? $image_url  . $r['user_id']. '.'.$r['logo'] : '/jamsai/image/img.gif' ;
			$r['failed'] = ( $r['selected'] == 1 );
			/*$r['button'] = ( $r['failed'] ) ? '<img class="f" src="img/work-bb02.gif" />' : '<form method="post" action="vote.php"><input type="hidden" name="story_id" value="' . $r['story_id'] . '" /><input type="image" src="img/work-bb01.gif" title="โหวตให้เรื่องนี้" /></form>';
			$r['updetail'] = ( $currentChapter == $r['chapter'] ) ? '<h6>อัพเดทตอนที่ ' . $currentChapter . '/7 แล้ว</h6>' : '<h6 class="a">ยังไม่ได้ส่งเนื้อหาตอนที่ ' . $currentChapter . '/7</h6>';*/
			$r['percent'] = ( $totalVote == 0 ) ? 0 : floor($r['vote_week'] / $totalVote * 100);
			$out[] = $r;
		}
		//$out['multiple'] = ( $maxVote == 0 )? 0 : floor( 72 / $maxVote);
		return $out;
	}
	
	function checkVoteByCookie($storyid,$member=0){
		if (isset($_COOKIE['jsstory_'.$storyid.$member]))
			return true;
			
		return false;
	}
	
	function setVoteByCookie($storyid,$member=0){
		setcookie('jsstory_'.$storyid.$member,true,time()+3600);
	}