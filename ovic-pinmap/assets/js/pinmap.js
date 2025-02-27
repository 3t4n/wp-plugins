(function ($) {
    "use strict";

    $.fn.RenderPinmap = function () {
        var $map        = $(this),
            $pin        = $map.find('.ovic-pin'),
            $img_width  = $map.data('width'),
            $img_height = $map.data('height');

        $pin.each(function () {
            var $pin_top  = $(this).data('top'),
                $pin_left = $(this).data('left');

            if ($pin_top.substr && '%' != $pin_top.substr(-1)) {
                $pin_top = (($pin_top / $img_height) * 100) + 'px';
            }

            if ($pin_left.substr && '%' != $pin_left.substr(-1)) {
                $pin_left = (($pin_left / $img_width) * 100) + 'px';
            }

            $(this).css({
                "top" : $pin_top,
                "left": $pin_left,
            })
        });
    }

    $.fn.InitPinmap = function () {
        var pin = $(this).find('.ovic-pin .action-pin');

        pin.on('click', function () {

            var $this = $(this),
                popup = $this.siblings('.ovic-popup');

            if (!popup.length) {
                return;
            }

            var parent = $this.closest('.ovic-pin');

            if (parent.hasClass('actived')) {
                parent.removeClass('actived');

                setTimeout(function () {
                    popup.removeAttr('style');
                }, 300);
                return;
            }

            // Add Actived class
            setTimeout(function () {
                // Remove all pin actived class
                $('.ovic-pinmap .ovic-pin.actived').removeClass('actived');

                // Active pin current
                parent.addClass('actived');
            }, 300);
        });

        var filter_blur = 'blur(2px)',
            filter_gray = 'grayscale(100%)',
            flag        = false;

        pin.hover(function () {
            var $this = $(this);

            flag = true;

            $this.closest('.blur').children('img').css('filter', filter_blur).css('webkitFilter', filter_blur).css('mozFilter', filter_blur).css('oFilter', filter_blur).css('msFilter', filter_blur);

            $this.closest('.gray').children('img').css('filter', filter_gray).css('webkitFilter', filter_gray).css('mozFilter', filter_gray).css('oFilter', filter_gray).css('msFilter', filter_gray);

            $this.closest('.mask').children('.mask').css('opacity', 1);
        }, function () {
            var $this = $(this);

            flag = false;

            $this.closest('.ovic-pinmap').children('img').removeAttr('style');
            $this.closest('.mask').children('.mask').removeAttr('style');
        });
    }

    $.fn.TogglePinmap = function () {
        $(this).each(function () {
            var button    = $(this),
                pinmap    = button.closest('.ovic-pin'),
                content   = pinmap.find('.ovic-popup-tooltip'),
                trigger   = pinmap.data('trigger'),
                placement = pinmap.data('position');

            if ($(window).innerWidth() < 900) {
                placement = 'auto';
            }

            button.OVICpopover({
                trigger  : trigger,
                container: 'body',
                sanitize : false,
                placement: placement,
                content  : function () {
                    return content.html();
                },
                html     : true,
            });
        });
    }

    $(document).resize(
        function () {
            $('.ovic-pinmap').TogglePinmap();
        }
    );

    $(document).ready(
        function () {
            $('.ovic-pinmap').each(
                function () {
                    $(this).RenderPinmap();
                    $(this).InitPinmap();
                }
            );
            $('.ovic-pinmap .action-pin').TogglePinmap();
        }
    );

})(window.jQuery);