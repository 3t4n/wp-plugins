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