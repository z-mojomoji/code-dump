<div id="popup-main-menu" class="forMobile"><div class="ListHead">เลือกหมวด <i class="fa fa-angle-down"></i></div>
    <div class="submenu-list"></div>  
    <button class="btnMainmenu">ปิดหน้าต่างนี้</button>
</div>


<div id="menuHead_wrap">
    <div id="menuHead">
      <div class="menuRow">     
        <div class="swiper-container menuSwiper">
            <div class="swiper-wrapper" id="mobileMenus"> 
                <?   foreach ($menu_advertising as $key => $v):?>
                    <div class="swiper-slide">
                                <div class="menuItem <?= ($key === $pageName) ? 'active' : ''; ?> <?=($i==3)?'mediumBox':''?>" data-id="<?=$i++ ?>" >
                                <a href="<?=$v['href'] ?>" target="_self" class="<?=(!empty($v['nested']))?'mid':''?>">  
                                <p class="textmenu"><?= $v['name'] ?></p>
                                <?=( !empty($v['nested']))?'<i class="icon-more fa fa-chevron-down"></i>':'' ?>
                                </a>
                                <?if(isset($v['nested'])&& !empty($v['nested'])): ?>
                                   <div class="subSwp">
                                     <? foreach ($v['nested'] as $sub => $s) { ?>
                                                <div class="swiper-slide">
                                                  <div class="subSwp-item <?= ($sub === $subpageName) ? 'active' : '' ?>">
                                                  <a href="<?= $s['href'] ?>"  target="<?=$s['target']?>"><?= $s['name'] ?></a>
                                                  </div>
                                                </div>
                                        <?  }?>
                                   </div>
                                <?endif;?>
                              </div>
                    </div>
                     <? endforeach; ?>  
            </div>
        </div>
      </div>
      
      <div class="menuRow" id="submenus">

        <div class="swiper-container submenuSwiper">
          <div class="swiper-wrapper subHere"> </div>
        </div>

       <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
      </div>

    </div>
</div>


<script type="text/javascript">
var startMenu = 0;
var startSubMenu = 0;
var menu = $('.menuSwiper');

   function createSub(item,index){
          var findSub=  item.find('.subSwp').html();
          // console.log(findSub);
          if(!$.trim(findSub)){
            $('#menuHead_wrap').removeClass('height_forSub');
          }
          else{
            $('#menuHead_wrap').addClass('height_forSub');
          }
          $('.subHere', $('#submenus')).html(findSub);
            var mySwiper = new Swiper('.submenuSwiper', {
            initialSlide:index,
            nextButton: '.swiper-button-next',
            slidesPerView: 'auto',
            paginationClickable: true,
            spaceBetween: 10,
            freeMode: true,
            observer:true,
            onInit: function(){
                $('.swiper-button-next',  $('#submenus')).show();
            },
            onReachBeginning: function(){
                $('.swiper-button-next',  $('#submenus')).show();
            },
            onReachEnd: function(){
                $('.swiper-button-next', $('#submenus')).hide();
            },
            

        });
      }
      var popupMenu = {
           backToSub: function(){
             $('#popup-main-menu, #popup-sci, #popup-art').removeClass('Move');
           },
           getCurrent: function() {
                return parseInt($(window).scrollTop());
            },
           createPopup:function(ele){
                $('#popup-main-menu .submenu-list').empty();
                $(ele).each(function(argument,ele) {
                  $('#popup-main-menu .submenu-list').append(ele); 
                });
                $('#popup-main-menu').addClass('Active'); 
                $('.container').addClass('wrapperMenuActive');
                $('#toolbar').hide();
            },
           closePop:function(ele){
                $('.container').removeClass('wrapperMenuActive');
                $('#toolbar').show();
                $('#popup-main-menu').removeClass('Active').removeClass('Move');
                $('#popup-sci,#popup-art').removeClass('Move');

                if(ele.parent().attr('id')=='popup-sci' || ele.parent().attr('id')=='popup-art' ){
                      $('#popup-sci,#popup-art').removeClass('Move').addClass('initClose');
               }
                 
            },
            init: function() {
                var _self = this;
                var currentPosition = 0;
                $(document)
                        .on('click',' #mobileMenus .menuItem', function(e){
                           
                            var chkHasSub = $(this).find('.subSwp').html();
                            currentPosition = _self.getCurrent();
                            if($.trim(chkHasSub)){ 
                              e.preventDefault();
                              var el = $(this).find('.subSwp-item').clone();
                              if($(this).data('id')==1){
                                    $('#popup-sci,#popup-art').removeClass('initClose');
                              }
                               _self.createPopup(el);
                               return false;
                            }
                            else{
                              return true;
                            }
                        
                        })
                        .on('click','.btnMainmenu', function(e){
                          _self.closePop($(this));
                          $(window).scrollTop(currentPosition);
                        })
                        .on('click','.backToSub',function(e){  _self.backToSub();})
                        .on('click','#popup-main-menu a#science', function(ee){
                            ee.preventDefault();
                            $('#popup-main-menu, #popup-sci').addClass('Move');
                        })
                        .on('click','#popup-main-menu a#art' ,function(ee){
                            ee.preventDefault();
                            $('#popup-main-menu, #popup-art').addClass('Move');
                        });
           
          }
        };
      popupMenu.init();

    $(document).ready(function(){

        /*find actived menu, position menu and create sub menus*/
        if($('.menuItem', menu).hasClass('active')){
            var _self = $('.menuItem', menu).filter('.active');
            if(_self.data('id') != 0){
            startMenu = _self.data('id');
            }
            $('.subSwp-item',_self).each( function(index, elem){
              if($(elem, _self).hasClass('active')){
                startSubMenu = index;
              }
            })
            createSub(_self,startSubMenu);
        }
        
        /* Create slider menu*/
        var swiper = new Swiper('.menuSwiper', {
            initialSlide:0,
            slidesPerView: 'auto',//4,
            paginationClickable: true,
            // spaceBetween: 5,
            freeMode: true,
        });

       /* Go to active menu with animation*/
         var mySwiper = menu[0].swiper;
             mySwiper.slideTo(startMenu);
            /* create to show little tail of the prev menu*/
            if(startMenu==1){ 
             var positionXnow = mySwiper.translate;
             mySwiper.setWrapperTranslate(positionXnow); 
            }

         /* Sticky position*/ 
            var stickyMenu = $('#menuHead').offset().top;
            $(window).on("scroll", function(e) {
              var scrollTop = $(window).scrollTop(); 
              if (scrollTop > stickyMenu) {
                $('#menuHead').addClass('sticky');
              } else {
                $('#menuHead').removeClass('sticky');
              }
              
            }).on('touchmove',function(){
                var scrollTop = $(window).scrollTop(); 
              if (scrollTop > stickyMenu) {
                $('#menuHead').addClass('sticky');
              } else {
                $('#menuHead').removeClass('sticky');
              }
            })
         /*End sticky*/
      });
         

</script>