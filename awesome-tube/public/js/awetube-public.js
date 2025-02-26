(function($) {
    'use strict';

    $(document).ready(function() {
        if ($(".inner-content-video")[0]) {
            var heightContent = $(".inner-content-video")[0].clientHeight;
            if (heightContent >= 95) {
                $('.inner-content-video').after('<div class="show-more-desc"><button type="button" class="show-more-btn">Show More</button></div>');

                $('.single-video-wrap .show-more-btn').click(function() {
                    $(this).text() === 'Show More' ? $(this).text('Show Less') : $(this).text('Show More');
                    $('.single-video-wrap .inner-content-video').toggleClass('open');
                });
            }
        }
    });

})(jQuery);