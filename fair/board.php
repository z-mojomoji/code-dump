<div id="media-wrapper">
    <div class="mid-content">
        <div class="inside-head">
            <h6>ช่องทางการติดตามข่าวสาร</h6>
        </div>
        <!--green head-->

        <div id="os-board">

            <div class="grey-head">
                <div class="inside-head2">
                    <p class="head13" style="width: 555px;">บอร์ด Dek-D's Admission On Stage และ Dek-D's Admission Fair</p>
                    <div class="clear"></div>
                </div>
            </div><!--grey-head-->
            <ul id="os-board-list">
                <? if ( count( $listBoard ) > 0 ): ?>
                    <? foreach ($listBoard as $item): ?>
                        <li>
                            <i></i>
                            <a target="_blank" class="os-title" href="/board/view/<?= $item['q_id'] ?>/" title="<?= $item['title_attr'] ?>"><?= $item['title_html'] ?></a>
                            <? if ( $item['user_id'] > 0 ): ?>
                                <a target="_blank" class="os-owner" href="http://my.dek-d.com/<?= $item['username'] ?>/" title="ไป My.ID ของ <?= $item['username'] ?>"><?= $item['name'] ?></a>
                            <? else: ?>
                                <span class="os-owner"><?= $item['name'] ?></span>
                            <? endif; ?>                          
                            <span class="os-view"><i></i><?= number_format( $item['views'] ) ?></span>
                            <span class="os-comment"><i></i><?= number_format( $item['posts_all'] ) ?></span>
                        </li>
                    <? endforeach; ?>
                <? else: ?>
                    <li>ยังไม่มีกระทู้</li>
                <? endif; ?>
            </ul>
            <div id="link-b-more">
                <a class="b-btn-1" target="_blank" href="/board/admission/onstage-fair/">กระทู้ล่าสุดของบอร์ด<img src="images/iibtn2.gif" /></a>
                <a class="b-btn-2" target="_blank" href="/board/post/11/26/"><img src="images/iibtn1.gif" />ตั้งกระทู้ใหม่บอร์ดนี้</a>
            </div>

        </div>


