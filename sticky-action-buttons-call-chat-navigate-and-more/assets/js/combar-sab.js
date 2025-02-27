(function($) {

    $(window).on('load', function() {
        if ($('.sab-bottom-gap.js_bottom').length) {
            $('.sab-bottom-gap.js_bottom').appendTo('body');
        }

    });

    $(document).on('click', 'body.sab-preview a:not(#sab-trigger)', function(e) {
        e.preventDefault();
    });

    $(document).on('click', '.sab-act-toTop', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    $(document).on('click', '.sab-act-copy', function() {
        let copy = document.createElement('input'),
            text = window.location.href;
        document.body.appendChild(copy);
        copy.value = text;
        copy.select();
        document.execCommand('copy');
        document.body.removeChild(copy);
    });

    $(document).on('click', '.combar-sab-wrapper #sab-trigger', function(e) {
        e.preventDefault();
        if (!$('.combar-sab-wrapper').hasClass('hover-triggered') == true || $(window).width() < 990) {
            $(this).parent().toggleClass('sab-show');

            let container = $(this).next();
            sabTrigger(container);

            if ($(this).data('hash') == true) {

                if ($('.combar-sab-wrapper').hasClass('sab-show')) {
                    window.location.hash = 'sab-toggle';
                } else {
                    history.replaceState(null, null, ' ');
                }
            }
        }

    });

    jQuery(document).on('keydown', function(e) {

        if (!$('.combar-sab-wrapper').hasClass('hover-triggered') == true && $('.combar-sab-wrapper #sab-trigger').data('esc') == true && e.which == 27) {
            if ($('.combar-sab-wrapper').hasClass('sab-show')) {
                $('.combar-sab-wrapper').removeClass('sab-show');
                sabTrigger();
                if ($('.combar-sab-wrapper #sab-trigger').data('hash') == true) {
                    history.replaceState(null, null, ' ');
                }
            }
        }
    });


    $(document).on('mouseover', '.combar-sab-wrapper.hover-triggered', function() {
        if ($(window).width() > 990) {
            $(this).addClass('sab-show');
            sabTrigger();
        }
    });


    $(document).on('mouseout', '.combar-sab-wrapper.hover-triggered', function() {
        if ($(window).width() > 990) {
            $(this).removeClass('sab-show');
            history.replaceState(null, null, ' ');
            sabTrigger();
        }
    });

    window.onhashchange = function(e) {
        let oldURL = e.oldURL.split('#')[1],
            newURL = e.newURL.split('#')[1];

        // close on back button
        if (oldURL == 'sab-toggle') {
            $('.combar-sab-wrapper').removeClass('sab-show');
            history.replaceState(null, null, ' ');
            sabTrigger();
        }

    }

    function sabTrigger(container) {
        if ($('.combar-sab-wrapper').hasClass('style-toggle_buttons')) {
            let cssArray = [];

            container.find('.sab-btn').each(function() {
                cssArray.push($(this).css('transition-delay'));
            })

            let reversed = cssArray.reverse();
            container.find('.sab-btn').each(function(i) {
                $(this).css('transition-delay', reversed[i]);
            });

        }
    }

})(jQuery);