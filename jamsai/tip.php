<?
	require_once("/webroot/ddfw/database/init.engine.php");
	include_once("/webroot/www/main/content/lib.inc.php");
	
	$sql ='SELECT con_url, con_title, description, con_id, thumbmode, thumburl, main_category, sub_category FROM content2007 WHERE main_category = 2 AND sub_category = 4 ORDER BY con_id DESC LIMIT 6';
	$result = $mcs->query($sql, 86400, MemcacheConnector::MC_KEY_SQL , 'content');
?>
<div id="box-tip">
        <h2>เคล็ดลับนักเขียน</h2>
<ul id="wtrick">

<? foreach( $result as $r )
	{
		$url = makeURL( $r['con_url'], $r['main_category'], $r['con_id'],1);
		$thumb = getThumb( '' , $r['thumbmode'] , $r['thumburl'] , $r['main_category'] , $r['sub_category'] );
		echo '<li>
					<div class="cc01"><a href="'.$url.'
					" target="_blank"><img src="'.$thumb.'" border="0" /></a></div>
					<div class="cc02">
					<span><a href="'.$url.'
					" target="_blank" class="l-m-ora">'.$r['con_title'].'</a></span>
					<span><font class="f-s-grd">'.$r['description'].'</font></span>
					</div>
				</li>';
	}
?>

</ul>
<a id="tipmor" href="http://www.dek-d.com/writer/tip/" target="_blank">เคล็ดลับเด็ด <b>มีอีกเพียบ!</b></a>
</div>