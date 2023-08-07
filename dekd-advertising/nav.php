
<div id="ads-head">
  <iframe src="/event/statcode.php?page=<?=$statName?>&bgc=transparent" width="18" height="18" 
frameborder="0" scrolling="No" class="true" id="truehitbox"> </iframe>
    <p id="ads-title" class="showm">
        บริการลงโฆษณา
    </p>
    
    <p id="subpage" class="showm">
        <a href="//www.dek-d.com" target="_self">Dek-D</a> >
        <a href="//www.dek-d.com/advertising/" target="_self">Advertising </a> > 
        <a href="<?=$menu_advertising[$pageName]['href']?>" target="_self"><?=$menu_advertising[$pageName]['name'];?></a>
        <?if(isset($subpageName)){ echo ' >'; ?>
            <a href="<?=$menu_advertising[$pageName]['nested'][$subpageName]['href']?>" target="_self" ><?= $menu_advertising[$pageName]['nested'][$subpageName]['name']; ?>
        <? }?>
    </p>
</div>

<div id="ad-navigation">
    <ul id="nav-top" class="clearfix">
        <li <?if($pageName == 'index'){echo 'class="active"';
            }else{ echo'';} ?>><a href="<?= $menu_advertising['index']['href']?>" target="_self"><?=$menu_advertising['index']['name']?></a></li>
        <li <?if($pageName == 'contact'){echo 'class="active"';
            }else{ echo'';} ?>><a href="<?= $menu_advertising['contact']['href']?>" target="_self"><?= $menu_advertising['contact']['name']?></a></li>
        <li <?if($pageName == 'position'){echo 'class="active"';
            }else{ echo'';} ?>>
        <a href="<?= $menu_advertising['position']['href']?>" target="_self"><?= $menu_advertising['position']['name']?> <i class="fa fa-angle-down"></i></a>
            <div class="nav-pop-wrapper navpop0 dropdown-left toolbar-submenu-column-wrapper clearfix">
              <div class="row clearfix">
                   <div class="tb-submenu-column">
                       <p class="navtitle">หน้าสำคัญ</p>
                        <ul>
                            <li><a href="<?= $position_nested['home']['href']?>" target="_self"><?= $position_nested['home']['name']?></a></li>
                        </ul>
                    </div><!--tb-submenu-column-->
                    <div class="tb-submenu-column">
                       <p class="navtitle">ผู้เข้าชมเยอะ</p>
                        <ul>
                            <li><a href="<?= $position_nested['board']['href']?>" target="_self"><?= $position_nested['board']['name']?></a></li>
                            <li><a href="<?= $position_nested['writer']['href']?>" target="_self"><?= $position_nested['writer']['name']?></a></li>
                        </ul>
                    </div><!--tb-submenu-column-->
                    <div class="tb-submenu-column">
                       <p class="navtitle">ความสนใจเฉพาะทาง</p>
                        <ul>
                            <li><a href="<?= $position_nested['admission']['href']?>" target="_self"><?= $position_nested['admission']['name']?></a></li>
                            <li><a href="<?= $position_nested['nugirl']['href']?>" target="_self"><?= $position_nested['nugirl']['name']?></a></li>
                            <li><a href="<?= $position_nested['abroad']['href']?>" target="_self"><?= $position_nested['abroad']['name']?></a></li>
                            <li><a href="<?= $position_nested['education']['href']?>" target="_self"><?= $position_nested['education']['name']?></a></li>
                        </ul>
                    </div><!--tb-submenu-column-->
                </div><!--row1-->
                
                <div class="row clearfix">
                   <div class="tb-submenu-column">
                       <p class="navtitle">Event & Fair</p>
                        <ul>
                            <li><a href="<?= $position_nested['fair']['href']?>" target="_self"><?= $position_nested['fair']['name']?></a></li>
                        </ul>
                    </div><!--tb-submenu-column-->
                    <div class="tb-submenu-column">
                       <p class="navtitle"> 
                       Mobile & Application
                       </p>
                        <ul>
                            <li><a href="<?= $position_nested['mobile']['href']?>" target="_self"><?= $position_nested['mobile']['name']?></a></li>
                        </ul>
                    </div><!--tb-submenu-column-->
                </div><!--row2-->
            </div>
        </li>
        <li <?if($pageName == 'profile'){echo 'class="active"';
            }else{ echo'';} ?>>
        <a href="<?= $menu_advertising['profile']['href']?>" target="_self"><?= $menu_advertising['profile']['name']?><i class="fa fa-angle-down"></i></a>
             <div class="nav-pop-wrapper navpop0 dropdown-left toolbar-submenu-wrapper">
                <ul>
                    <li><a href="<?= $profile_nested['profile']['href']?>" target="_self"><?= $profile_nested['profile']['name']?></a></li>
                    <li><a href="<?= $profile_nested['block']['href']?>" target="_blank"><?= $profile_nested['block']['name']?></a></li>
                    <li><a href="<?= $profile_nested['activities']['href']?>" target="_blank"><?= $profile_nested['activities']['name']?></a></li>
                    <li><a href="<?= $profile_nested['contactus']['href']?>" target="_blank"><?= $profile_nested['contactus']['name']?></a></li>
                </ul>
                
            </div>
        </li>
    </ul>
</div> <!--ad-navigation-->

<?php

if($navpage == 'positionNav'){?>

<div id="nav-page-position">
    <div class="nav-submenu-column">
        <p class="subnavtitle">หน้าสำคัญ</p>
            <ul>
                <li <?if($subpageName == 'home'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-home.php" target="_self">หน้าแรกเว็บ Dek-D</a></li>
            </ul>
    </div>
    
    <div class="nav-submenu-column">
        <p class="subnavtitle">ผู้เข้าชมเยอะ</p>
            <ul>
                <li <?if($subpageName == 'board'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-board.php" target="_self">Board + Lifestyle</a></li>
                <li <?if($subpageName == 'writer'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-writer.php" target="_self">Novel + Writer</a></li>
            </ul>
    </div>
       
   <div class="nav-submenu-column">
        <p class="subnavtitle">ความสนใจเฉพาะทาง</p>
            <ul class="clearfix">
                <li <?if($subpageName == 'admission'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-admission.php" target="_self">Admission</a></li>
                <li <?if($subpageName == 'nugirl'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-nugirl.php" target="_self">NUGIRL</a></li>
                <li <?if($subpageName == 'abroad'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-abroad.php" target="_self">Study Abroad</a></li>
                <li <?if($subpageName == 'education'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-education.php" target="_self">Education</a></li>
            </ul>
    </div>
      
    <div class="nav-submenu-column">
         <p class="subnavtitle">Mobile & Application</p>
            <ul>
                <li <?if($subpageName == 'mobile'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-mobile.php" target="_self">Mobile Site & APP Ad</a></li>
            </ul>
    </div>
       
   <div class="nav-submenu-column">
        <p class="subnavtitle">Event & Fair</p>
            <ul>
                <li <?if($subpageName == 'fair'){echo 'class="active"';
            }else{ echo'';} ?>><a href="ad-fair.php" target="_self">Admission Fair</a></li>
            </ul>
    </div>
</div>

<? }else if($navpage == 'aboutDek'){?>

<div id="nav-page-dekd">
    <div class="nav-submenu-row">
        <ul>
            <li class="active">
                <a href="profile.php" target="_self">
                กว่าจะเป็นเว็บ Dek-D</a>
            </li>
            <li><a href="http://blog.dek-d.com/" target="_blank">Dek-D ทำอะไรอยู่?</a></li>
            <li><a href="http://www.dek-d.com/activities/38551/" target="_blank">เยี่ยมชมออฟฟิตเว็บ Dek-D</a></li>
            <li><a href="http://www.dek-d.com/contactus.php" target="_blank">ติดต่อทีมงานฝ่ายอื่นๆ</a></li>
        </ul>
    </div>
</div>

<? } else{
    echo '';
    }
?>
