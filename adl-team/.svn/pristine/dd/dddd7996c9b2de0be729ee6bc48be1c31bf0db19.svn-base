jQuery(function ($) {
    "use strict";

    /*global jQuery $*/
    //Slider
    $(document).ready(function(){
        $('.adl-skill').on('click', function () {
            var dId = $(this).find('a').data('featherlight'),
                $skillbar = $(dId+' .skillbar');

            $skillbar.each(function () {
                var $skillPercent = $(this).attr('data-percent');
                $(this).find('.count-bar').animate({
                    width: $skillPercent
                },3000).find('.count').html('<span>' + $skillPercent + '</span>');
            });

            // $skillbar.;
        });

        jQuery('.skillbar').each(function() {
            jQuery(this).appear(function() {
                jQuery(this).find('.count-bar').animate({
                    width:jQuery(this).attr('data-percent')
                },3000);
                var percent = jQuery(this).attr('data-percent');
                jQuery(this).find('.count').html('<span>' + percent + '</span>');
            });
        });
    });

}(jQuery));