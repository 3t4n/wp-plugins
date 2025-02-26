(function($) {
    console.log(grecaptcha);
    if(typeof grecaptcha != "undefined") {
        grecaptcha.ready(function() {
            console.log('called');
            if ($('div.wpcf7').length) {
                console.log('form found');
                console.log($('.grecaptcha-badge'));
                $('.grecaptcha-badge').addClass('show-dependant');
            }
        });
    }
})(jQuery);