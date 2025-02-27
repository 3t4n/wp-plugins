/**
 * This script will handle the frontend view of the
 * floating menu.
 */
jQuery(document).ready(function ($) {
    /**
     * Show the floating menus whenever the page has loaded
     */
    $('.f12-floating-menu > div').css('visibility', 'visible');
});

/**
 * This script will handle the frontend view of the
 * floating menu.
 */
jQuery(document).ready(function ($) {
    /**
     * Get the max width of the container to ensure the animation
     * is working as expected. (left/right)
     * @param el
     * @returns {number}
     */
    function getMaxWidth(el, excludePadding) {
        var max = 0;
        el.find('li').each(function () {
            var iconWidth = $(this).find('.icon').width();
            var nameWidth = $(this).find('.name').outerWidth();

            var width = iconWidth + nameWidth;

            if (width > max) {
                max = width;
            }
        });
        return max;
    }

    /**
     * Get the max height of the container to ensure the animaiton
     * is working as expected. (top/bottom)
     * @param el
     * @returns {number}
     */
    function getMaxHeight(el) {
        var max = 0;
        el.find('li').each(function () {
            if ($(this).outerHeight() > max) {
                max = $(this).outerHeight();
            }
        });
        return max;
    }

    /**
     * This will set the vertical position of the floating menus. Depending on the
     * Settings in the backend it will be on the left, top, bottom or right side.
     *
     * @param el
     * @param css
     * @returns {*}
     */
    function updateVerticalPosition(el, css, iconSize) {
        /* Center the left and right sidebars to be in the middle of the screen. */
        if (el.hasClass('left') || el.hasClass('right')) {
            css.top = parseInt((window.innerHeight / 2) - (el.height() / 2)) + 'px';
        }
        if (el.hasClass('bottom') || el.hasClass('top')) {
            // Get the max height calculated by the li insite the sidebar
            let maxHeight = getMaxWidth(el, true);

            // Get the outer container height
            let wrapperHeight = el.closest('.f12-floating-menu').height();

            // Get the diff - this is caused by the outer container - not yet sure why it is happening !?
            let diff = (wrapperHeight - maxHeight) / 2;

            // Get the padding of the element
            var padding = (el.find('.icon').outerWidth() - el.find('.icon').width()) / 2;

            // Calculate the bottom/top position depending on the top or bottom sidebar.
            if (el.hasClass('bottom')) {
                css.bottom = iconSize - maxHeight - diff + padding + 'px';
            } else {
                css.top = iconSize - maxHeight - diff + padding + 'px';

                /* If there is a wpadminbar we need to add the offset to the top bar. */
                if ($('#wpadminbar').length) {
                    css.top = parseInt(css.top) + $('#wpadminbar').height();
                }
            }
        }
        return css;
    }

    /**
     * This will set the horizontal position of the floating menus. Depending on the Settings
     * in the backend it will be on the left, top, bottom or right side.
     *
     * @param el
     * @param css
     * @returns {*}
     */
    function updateHorizontalPosition(el, css, iconSize) {
        if (el.hasClass('top') || el.hasClass('bottom')) {
            /* Center the position of the upper and lower sidebars */
            css.left = parseInt((window.innerWidth / 2) - (el.width() / 2)) + 'px';
        }
        if (el.hasClass('left')) {
            let maxWidth = getMaxWidth(el);
            css.left = (iconSize - maxWidth) + 'px';
        }
        if (el.hasClass('right')) {
            let maxWidth = getMaxWidth(el);
            css.right = (iconSize - maxWidth) + 'px';
        }
        return css;
    }

    function updateSize(el, css, iconSize) {
        return css;
        if (el.hasClass('top') || el.hasClass('bottom')) {
            // change the width and height because we are going to rotate the container with css.
            css.height = getMaxHeight(el);
            css.width = getMaxWidth(el);
        } else {
            css.width = el.width();
        }
        return css;
    }

    /**
     * Initialize the floating menu. Set up the position and size.
     */
    function initFloatingMenu() {
        $('.f12-floating-menu.icon').each(function () {
            if (!$(this).attr('data-attachment-size')) {
                throw 'Missing parameter data-attachment-size';
            }

            var attachmentSize = parseInt($(this).attr('data-attachment-size'));

            var css = {};
            css = updateVerticalPosition($(this), css, attachmentSize);
            css = updateHorizontalPosition($(this), css, attachmentSize);
            css = updateSize($(this), css, attachmentSize);

            $(this).css(css);
        });
    }

    // Call the menu initalization.
    initFloatingMenu();

    /**
     * Reset the position of the menus on resize
     */
    $(window).resize(function () {
        initFloatingMenu();
    });

    $(document).resize(function () {
        initFloatingMenu();
    });
});

/**
 * This script will handle the frontend view of the
 * floating menu.
 */
jQuery(document).ready(function ($) {
    /**
     * Get the max width of the container to ensure the animation
     * is working as expected. (left/right)
     * @param el
     * @returns {number}
     */
    function getMaxWidth(el, excludePadding) {
        var max = 0;
        el.find('li').each(function () {
            var iconWidth = $(this).find('.icon').width();
            var nameWidth = $(this).find('.name').outerWidth();

            var width = iconWidth + nameWidth;

            if (width > max) {
                max = width;
            }
        });
        return max;
    }

    /**
     * Get the max height of the container to ensure the animaiton
     * is working as expected. (top/bottom)
     * @param el
     * @returns {number}
     */
    function getMaxHeight(el) {
        var max = 0;
        el.find('li').each(function () {
            if ($(this).outerHeight() > max) {
                max = $(this).outerHeight();
            }
        });
        return max;
    }

    /**
     * This will set the vertical position of the floating menus. Depending on the
     * Settings in the backend it will be on the left, top, bottom or right side.
     *
     * @param el
     * @param css
     * @returns {*}
     */
    function updateVerticalPosition(el, css, iconSize) {
        /* Center the left and right sidebars to be in the middle of the screen. */
        if (el.hasClass('left') || el.hasClass('right')) {
            css.top = parseInt((window.innerHeight / 2) - (el.height() / 2)) + 'px';
        }
        if (el.hasClass('bottom') || el.hasClass('top')) {
            // Get the max height calculated by the li insite the sidebar
            let maxHeight = getMaxWidth(el, true);
            // Get the padding of the element
            var padding = (el.find('.icon').outerWidth() - el.find('.icon').width()) / 2;

            // Get the outer container height
            let wrapperHeight = el.closest('.f12-floating-menu').height();
            // Get the diff - this is caused by the outer container - not yet sure why it is happening !?
            let diff = (el.width() - el.height());

            if (diff < 0) {
                diff *= -1;
            }

            // Calculate the bottom/top position depending on the top or bottom sidebar.
            if (el.hasClass('bottom')) {
                let pos = (el.width() - el.height() + padding - diff) / 2;
                if (pos < 0) {
                    pos = 0;
                }
                css.bottom = pos + "px";

                /*
                 * New
                 */
                css.bottom = (Math.ceil(el.width()) * -1 - 2)+'px';

            } else {
                let pos = 0;
                if (el.width() > el.height()) {
                    pos = (el.width() - el.height()) / 2;
                } else {
                    pos = (el.height() - el.width()) / -2;
                }
                css.top = pos + "px";

                /* If there is a wpadminbar we need to add the offset to the top bar. */
                if ($('#wpadminbar').length) {
                    css.top = parseFloat(css.top) + $('#wpadminbar').height();
                }
            }
        }
        return css;
    }

    /**
     * This will set the horizontal position of the floating menus. Depending on the Settings
     * in the backend it will be on the left, top, bottom or right side.
     *
     * @param el
     * @param css
     * @returns {*}
     */
    function updateHorizontalPosition(el, css, iconSize) {
        if (el.hasClass('top') || el.hasClass('bottom')) {
            /* Center the position of the upper and lower sidebars */
            css.left = parseInt((window.innerWidth / 2) - (el.width() / 2)) + 'px';
        }
        if (el.hasClass('left')) {
            css.left = '0px';
        }
        if (el.hasClass('right')) {
            css.right = '0px';
        }
        return css;
    }

    function updateSize(el, css, iconSize) {
        return css;
        if (el.hasClass('top') || el.hasClass('bottom')) {
            // change the width and height because we are going to rotate the container with css.
            css.height = getMaxHeight(el);
            css.width = getMaxWidth(el);
        } else {
            css.width = el.width();
        }
        return css;
    }

    /**
     * Initialize the floating menu. Set up the position and size.
     */
    function initFloatingMenu() {
        $('.f12-floating-menu.full').each(function () {
            if (!$(this).attr('data-attachment-size')) {
                throw 'Missing parameter data-attachment-size';
            }

            var attachmentSize = parseInt($(this).attr('data-attachment-size'));

            var css = {};
            css = updateVerticalPosition($(this), css, attachmentSize);
            css = updateHorizontalPosition($(this), css, attachmentSize);
            css = updateSize($(this), css, attachmentSize);

            $(this).css(css);
        });
    }

    // Call the menu initalization.
    initFloatingMenu();

    /**
     * Reset the position of the menus on resize
     */
    $(window).resize(function () {
        initFloatingMenu();
    });

    $(document).resize(function () {
        initFloatingMenu();
    });
});

/**
 * This script will handle the frontend view of the
 * floating menu.
 */
jQuery(document).ready(function ($) {
    /**
     * Check if the window is smaller than 799 which is the breakpoint to the mobile view.
     *
     * @returns {boolean}
     */
    function isMobileView(){
        if($(window).width() <= 799){
            return true;
        }
        return false;
    }

    /**
     * Animate the LI elements on the left side by entering with the mouse
     */
    $('.f12-floating-menu.animation-slideout.left li').on('mouseenter', function () {
        if(isMobileView()){
            return;
        }

        let padding = ($(this).find('.icon').outerWidth() - $(this).find('.icon').width());
        let left = (parseInt($(this).closest('.f12-floating-menu').find('.icon').width()) - parseInt($(this).closest('.f12-floating-menu--inner').width())) * -1;
        left -= padding;
        $(this).css('left', left + 'px');

        /*var left = parseInt($(this).closest('.f12-floating-menu').css('left')) * -1;
        $(this).css('left', left + 'px');*/
    });

    $('.f12-floating-menu.animation-slideout.left li').on('mouseleave', function () {
        $(this).css('left', 0);
    });

    /**
     * Animate the LI elements on the top side by entering with the mouse
     */
    $('.f12-floating-menu.animation-slideout.top li').on('mouseenter', function () {
        if(isMobileView()){
            return;
        }

        let padding = ($(this).find('.icon').outerWidth() - $(this).find('.icon').width());
        let left = (parseInt($(this).find('.icon').width()) - parseInt($(this).closest('.f12-floating-menu--inner').width())) * -1;
        left -= padding;
        $(this).css('left', left + 'px');
    });

    $('.f12-floating-menu.animation-slideout.top li').on('mouseleave', function () {
        $(this).css('left', 0);
    });

    /**
     * Animate the LI elements on the right side by entering with the mouse
     */
    $('.f12-floating-menu.animation-slideout.right li').on('mouseenter', function () {
        if(isMobileView()){
            return;
        }

        let padding = ($(this).find('.icon').outerWidth() - $(this).find('.icon').width());
        let left = (parseInt($(this).closest('.f12-floating-menu').find('.icon').width()) - parseInt($(this).closest('.f12-floating-menu--inner').width()));
        left += padding;
        $(this).css('left', left + 'px');

        /*let right = parseInt($(this).closest('.f12-floating-menu').css('right'));
        $(this).css('left', right + 'px');*/
    });

    $('.f12-floating-menu.animation-slideout.right li').on('mouseleave', function () {
        $(this).css('left', 0);
    });

    /**
     * Animate the LI elements on the bottom side by entering with the mouse
     */
    $('.f12-floating-menu.animation-slideout.bottom li').on('mouseenter', function () {
        if(isMobileView()){
            return;
        }

        let padding = ($(this).find('.icon').outerWidth() - $(this).find('.icon').width());
        let left = (parseInt($(this).closest('.f12-floating-menu').find('.icon').width()) - parseInt($(this).closest('.f12-floating-menu--inner').width()));
        left += padding;
        $(this).css('left', left + 'px');
    });

    $('.f12-floating-menu.animation-slideout.bottom li').on('mouseleave', function () {
        $(this).css('left', 0);
    });
});

/**
 * Change the opacity of the sidebar depending on the distance of the mouse
 */
jQuery(document).ready(function ($) {
    /**
     * Reduce the opacity
     */
    $(document).find('.f12-floating-menu.animation-distance').each(function () {
        $(this).css('opacity', '0.3');
    });

    /**
     * Calculate the distance between the mouse and the given element
     * @param elem
     * @param mouseX
     * @param mouseY
     * @returns {number}
     */
    function calculateDistance(elem, mouseX, mouseY) {
        return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left + (elem.width() / 2)), 2) + Math.pow(mouseY - (elem.offset().top + (elem.height() / 2)), 2)));
    }

    /**
     * Depending on the mouse distance we have to update the opacity
     */
    $(document).on('mousemove', function (e) {

        $(document).find('.f12-floating-menu.animation-distance').each(function () {
            let distance = calculateDistance($(this), e.pageX, e.pageY);
            let minDistance = 50;
            let maxDistance = 300;
            let minOpacity = 0.3;
            let maxOpacity = 1;

            if (distance > maxDistance) {
                $(this).css('opacity', minOpacity);
            } else if (distance < minDistance) {
                $(this).css('opacity', maxOpacity);
            } else {
                let diffDistance = maxDistance - minDistance; // 250
                let diffOpacity = maxOpacity - minOpacity; // 0.7
                let step = diffOpacity / diffDistance;

                let opactiy = (((distance - maxDistance) * step) * -1) + minOpacity;

                $(this).css('opacity', opactiy);
            }
        });
    });
});