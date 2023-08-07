<?
include_once '/webroot/ddfw/system/libraries/Board.php';
include_once '/webroot/ddfw/system/helpers/date.php';
include_once '/webroot/ddfw/system/helpers/converter.php';
$board=new Board(true);

$listlast=$board->getBoardLatestListNew(6,15,30);

function ago( $datetime , $unit ) {
        $ms = array(
            'minute' => 60 ,
            'hour' => 60 * 60 ,
            'day' => 24 * 60 * 60 ,
            'week' => 7 * 24 * 60 * 60
        );
        if ( $datetime == '0000-00-00 00:00:00' ) {
            return 0;
        }
        $diff = time() - strtotime( $datetime );
        $datetime = $diff / $ms[$unit];
        return ceil( $datetime );
    }
	
 function getTimeFadeHour( $datetime ) {
        if ( $datetime == '0000-00-00 00:00:00' )
            return 5;
        $output = 5;
        $timeFadeHours = array(
            1 => 1 ,
            2 => 3 ,
            3 => 6 ,
            4 => 9 ,
            5 => 10 ,
        );
        $hoursAgo = ago( $datetime , 'hour' );
        if ( $hoursAgo <= $timeFadeHours[1] ) {
            $output = 1;
        } elseif ( $hoursAgo <= $timeFadeHours[2] ) {
            $output = 2;
        } elseif ( $hoursAgo <= $timeFadeHours[3] ) {
            $output = 3;
        } elseif ( $hoursAgo <= $timeFadeHours[4] ) {
            $output = 4;
        }


        return $output;
    }
?>
<div style="clear:both;"></div>
<p style="padding-top: 10px;"></p>
                    <div id="last_left_area">
                        <div id="last_allboard" data-qtype="-1">
                            <h2 style="font-family: Supermarket;font-size: 23px;font-weight: normal;color: #000000;height: 50px;margin-bottom: 15px;border-bottom: dashed 1px #d7d7d7;"><span style="color: #f58220;">Board</span>&nbsp;นักเขียนหน้าใส</h2>
                            <div id="last_topic" class=""> 
                                <ul id="list_last_topic" class="list_last_topic " style="padding-left: 0;list-style: none;">
					<?
					foreach ($listlast as $row){
						$color = $color!=''?'':'bgf9f9f9';
						$name=convertForTagHTML($row['name']);
					?>
					<li class="topic text  type0 <?=$color?>" data-q_id="3011901" style="line-height: 20px;">
                        <div class="wrap_title" style="   float: left;   width: 520px;">                           
                            <a class="list_2title" target="_blank" href="/board/view/<?=$row['q_id']?>/" title="กระทู้ : <?=$row['title']?>"><span><?=$row['title']?></span><i class="timefade<?=getTimeFadeHour( $row['datetime_update'] )?>"><div class="time_edited"><?=(strtotime( $row['datetime_update'] )) ? date_trans( $row['datetime_update'] , 'th' , '%d %M %y  %h:%i น.' ) : '-'?></div></i></a>                 
                        </div>
							<? if ($row['user_id'] > 0): ?>
								<a class="list_3owner" target="_blank" href="http://www.dek-d.com/board/gotoMYid.php?id=<?= $row['user_id'] ?>" title="<?=$name ?>">                             
									<span><i></i>   <?=$name ?></span>
								</a>
							<? else: ?>
								<span class="list_3owner">                               
									<span><i></i>  <?=$name ?></span>
								</span>
							<? endif; ?>
							<span class="list_4vcm"><i class="listvi" title="<?=$row['views']?> ผู้เข้าชม"></i><span class="listvs"><?=$row['views']?></span><i class="listcmi" title="<?=$row['posts_all']?> ความคิดเห็น"></i><span class="listcms"><?=$row['posts_all']?></span></span>
                    </li>					
                                    
					<?
					}
					?>
                                </ul>                                             
                                <div class="empty_block"></div>
                            </div>    
                            <a id="end_of_list" name="end_of_list"></a>
                        </div>
                    </div><!-- end last_left_area -->     
				<div class="top_setbottom" style="text-align: right;">      
					<a href="/board/post/6/15" target="_blank" class="btn-thin-lightgrey left_btn" title="ตั้งกระทู้ใหม่ ">
						<i class="btn_createnew"> </i><span>ตั้งกระทู้ใหม่ บอร์ดนี้</span>
					</a>
					<a href="/board/jsl6/" target="_blank" class="btn-thin-lightgrey right_btn" title="อ่านบอร์ดต่อ">
						<i class="btn_readmore"> </i><span>อ่านบอร์ดนี้ต่อ</span>
					</a>
				</div>
                        <br class="clear" />