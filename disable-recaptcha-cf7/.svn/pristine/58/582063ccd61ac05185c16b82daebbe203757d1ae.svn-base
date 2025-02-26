(function($){
    $(document).ready(function() {
        $('.fh-dr-tabs li a').click(function() {
            var target = $(this).attr('data-target');
            if(typeof target != "undefined") {
                if($('.'+target).length && !$('.'+target).is(':visible')) {
                    $('.fh-dr-tabs li a').removeClass('active');
                    $(this).addClass('active');
                    $('.dr-tab-contents').hide();
                    $('.'+target).fadeIn();
                }
            }
            return false;
        });

        if($('.fh_multi_selection').length) {
            $('.fh_multi_selection').multi();
        }

        $('.fh_single input[type="radio"]').change(function() {
            var parent = $('.dr-tab-contents:visible');
            if($(this).val() == 'hide_custom') {
                parent.find('.remove-selected-dp').slideUp();
                parent.find('.hide-selected-dp').slideDown();
            }
            else if($(this).val() == 'remove_custom') {
                parent.find('.hide-selected-dp').slideUp();
                parent.find('.remove-selected-dp').slideDown();
            }
            else {
                parent.find('.hide-selected-dp').slideUp();
                parent.find('.remove-selected-dp').slideUp();
            }
        });
    });
})(jQuery);