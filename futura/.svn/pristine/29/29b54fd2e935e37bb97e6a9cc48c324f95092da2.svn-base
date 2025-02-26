jQuery(function($){
    $('#futura_related_posts_wrap .close').on('click', function(){
        $('#futura_related_posts_wrap').addClass('hide');
    });

    $('#futura_live_setting .close').on('click', function(){
        $('#futura_live_setting').hide();
    });


    $(window).on('load', function(){
        var futura_area = $('#futura_related_posts_wrap');
        if($('#futura_open_box').length){
            var elem = $('#futura_open_box').offset();
        }else{
            var elem = $('#futura_open_s').offset();
        }
        var window_h = window.innerHeight;
        var offset = elem.top;
        $(window).scroll(function () {
            if ($(this).scrollTop()+window_h > offset) {
                futura_area.stop().animate({'bottom' : '0px'}, 00); 
            } else {
                futura_area.stop().animate({'bottom' : '-600px'}, 0); 
            }
        });    
    });

    if($("#futura_related_post_in_content").length){
        $('#futura_related_after_content_wrap').prependTo($("#futura_related_post_in_content"));
        $("#futura_related_after_content_wrap").css("margin-top", "25px").css("margin-bottom", "25px").css();
    }
   
});