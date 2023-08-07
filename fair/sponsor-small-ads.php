<style>
    #tab_gr {
        width: 620px;
        height: 30px;
        /*background: url(images/sponsors/barmenu.gif) no-repeat;
        margin-left: 20px;*/
        margin-bottom: 25px;
    }
    
    #tab_gr ul {
        list-style: none;
        padding: 0;
        margin: 0 2px;
        background: url(images/bg_mgr.png) no-repeat;
        background-position: 3px 5px;
        width: 300px;
        float: left;
        height: 30px;
    }
    
    #tab_gr li {
        float: left;
    }
    
    #tab_gr li a {
        width: 130px;
        height: 30px;
        font-family: Tahoma;
        font-size: 14px;
        font-weight: bold;
        line-height: 30px;
        text-align: center;
        display: block;
        cursor: pointer;
        text-decoration: none;
    }
    
    #box-gr1 {
        display: none;
    }
</style> 

<div class="grey-head"></div>

<div id="tab_gr">
    <ul>
        <li><a class="btn-gr" grnum="0">บูธทั้งหมด</a>
        </li>
        <li><a class="btn-gr" grnum="1">แยกตามหมวด</a>
        </li>
    </ul>
    <div class="star-txt">
        <p>พบกับกิจกรรมพิเศษบนเวที Mini Stage</p>
    </div>
    <div class="clear"></div>
</div>




<!--group 1-->

<div id="box-gr0" class="clear">
    
    <!--sponsor main list-->
    <div class="sponsor-small" style="padding-top: 25px;">
        <ul class="sponsor-smalllist">
        
            <? include('sponsors_data.php');
                for ($i=0; $i < count($booth["booth0"]); $i++){
                echo '<li>
                <div class="sss-img">
                    <div class="star"></div>
                    <a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth0"]["shop".$i]["pic"].'"/></a>
                </div>

                <div class="sss-des">
                    <h5 class="alignleft"><a href="'.$booth["booth0"]["shop".$i]["link"].'" target="_blank">'.$booth["booth0"]["shop".$i]["name"].'</a></h5>
                    <p>'.$booth["booth0"]["shop".$i]["desc"].'
                   </p>
                </div>

                <div class="clear"></div>
            </li>';
                }
                for ($n=0; $n < count($booth["booth1"]); $n++){
                    echo'<li>
                <div class="sss-img">
                    <a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank"><img src="images/sponsors/'.$booth["booth1"]["shop".$n]["pic"].'"/></a>
                </div>

                <div class="sss-des">
                    <h5 class="alignleft"><a href="'.$booth["booth1"]["shop".$n]["link"].'" target="_blank">'.$booth["booth1"]["shop".$n]["name"].'</a></h5>
                    <p>'.$booth["booth1"]["shop".$n]["desc"].'
</p>
                </div>

                <div class="clear"></div>
            </li>';
                }
            ?>
            
        </ul><!--sponsor main list end-->
        
    </div>
    
</div>

<!--group 1-->
