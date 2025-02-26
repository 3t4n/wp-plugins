(function($) {
    $(document).ready(function() {

        $('body').on('click', '.affiliate-codecanyon-widget-type', function(){
            var type = $(this).val();
            var wrap = $(this).closest('.widget-content');
            var user = wrap.find('.affiliate-codecanyon-widget-user');
            var cat = wrap.find('.affiliate-codecanyon-widget-cat');
            var order = wrap.find('.affiliate-codecanyon-widget-order');
            if(type == 'popular'){
                user.fadeOut(300);
                cat.fadeOut(300);
                order.fadeOut(300);
            } else if (type == 'latest'){
                user.fadeOut(300);
                cat.fadeIn(300);
                order.fadeOut(300);
            } else {
                //user
                user.fadeIn(300);
                cat.fadeIn(300);
                order.fadeIn(300);
            }
        });

    });

})(jQuery);