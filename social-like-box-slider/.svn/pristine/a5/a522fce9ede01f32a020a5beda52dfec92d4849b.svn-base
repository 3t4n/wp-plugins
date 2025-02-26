; 
(function($){
    $(function(){
        $('.slboxs__container').hover(
            function() {
                $(this).css('z-index',2);
                var position = $(this).data('position');
                var options = {};
                options[position] = 0;
                $(this).stop().animate( options, 350);
            },
            function() {
                $(this).css('z-index',1);
                var position = $(this).data('position');
                var options = {};
                options[position] = -300;
                $(this).stop().animate(options, 350);
            });
    });
})(jQuery);