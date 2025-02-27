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