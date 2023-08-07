$(document).ready(function(){

    $('#map-menu').on('click','.btn-m',function(){
        var mnum = $(this).attr('mnum');
        var lefmnum = -(mnum*370);
        $('.btn-m').removeClass('btn-macti');
        $('.btn-m'+mnum).addClass('btn-macti');
        $('#map-go').animate({left:lefmnum},{queue: false, duration: 300});
    });
    
});