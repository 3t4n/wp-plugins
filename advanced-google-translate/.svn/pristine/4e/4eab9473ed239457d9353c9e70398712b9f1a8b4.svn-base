// SSB UI jQuery
jQuery(function ($) {

    // Animation Slide
    var ssb_panel = $('#google_translate_element'),
        ssb_panel_w = ssb_panel.width(),
        sbb_display_margin = 50,
        window_width = jQuery(window).width();

    ssb_panel.css('z-index', agt_ui_data.z_index);

    if (agt_ui_data.pos === 'topLeft') {
        if (agt_ui_data.top === 0 || agt_ui_data.top === '0' || !agt_ui_data.top) {
            ssb_panel.css('top', '20px');
        } else {
            ssb_panel.css('top', agt_ui_data.top + 'px');
        }
        ssb_panel.css('left', agt_ui_data.left + 'px');
    }

    if (agt_ui_data.pos === 'topLeftNoScoll') {
        if (agt_ui_data.top === 0 || agt_ui_data.top === '0' || !agt_ui_data.top) {
            ssb_panel.css('top', '20px');
        } else {
            ssb_panel.css('top', agt_ui_data.top + 'px');
        }
        ssb_panel.css('left', agt_ui_data.left + 'px');
        ssb_panel.css('position', 'absolute');
    }

    if (agt_ui_data.pos === 'topRight') {
        if (agt_ui_data.top === 0 || agt_ui_data.top === '0' || !agt_ui_data.top) {
            ssb_panel.css('top', '20px');
        } else {
            ssb_panel.css('top', agt_ui_data.top + 'px');
        }

        if (agt_ui_data.right === 0 || agt_ui_data.right === '0' || !agt_ui_data.right) {
            ssb_panel.css('right', '20px');
        } else {
            ssb_panel.css('right', agt_ui_data.right + 'px');
        }
    }

    if (agt_ui_data.pos === 'topRightNoScoll') {
        if (agt_ui_data.top === 0 || agt_ui_data.top === '0' || !agt_ui_data.top) {
            ssb_panel.css('top', '20px');
        } else {
            ssb_panel.css('top', agt_ui_data.top + 'px');
        }

        if (agt_ui_data.right === 0 || agt_ui_data.right === '0' || !agt_ui_data.right) {
            ssb_panel.css('right', '20px');
        } else {
            ssb_panel.css('right', agt_ui_data.right + 'px');
        }
        ssb_panel.css('position', 'absolute');
    }

    if (agt_ui_data.pos === 'bottomLeft') {
        ssb_panel.css('bottom', agt_ui_data.bottom + 'px');
        ssb_panel.css('left', agt_ui_data.left + 'px');
    }

    if (agt_ui_data.pos === 'bottomLeftNoScoll') {
        ssb_panel.css('bottom', agt_ui_data.bottom + 'px');
        ssb_panel.css('left', agt_ui_data.left + 'px')
        ssb_panel.css('position', 'absolute');
    }

    if (agt_ui_data.pos === 'bottomRight') {
        ssb_panel.css('bottom', agt_ui_data.bottom + 'px');
        ssb_panel.css('right', agt_ui_data.right + 'px');
    }

    if (agt_ui_data.pos === 'bottomRightNoScoll') {
        ssb_panel.css('bottom', agt_ui_data.bottom + 'px');
        ssb_panel.css('right', agt_ui_data.right + 'px');
        ssb_panel.css('position', 'absolute');
    }

    if (ssb_panel.hasClass('ssb-btns-left') && (ssb_panel.hasClass('ssb-anim-slide') || ssb_panel.hasClass('ssb-anim-icons'))) {

        ssb_panel.css('left', '-' + (ssb_panel_w - sbb_display_margin) + 'px');

    } else if (ssb_panel.hasClass('ssb-btns-right') && (ssb_panel.hasClass('ssb-anim-slide') || ssb_panel.hasClass('ssb-anim-icons'))) {

        ssb_panel.css('right', '-' + (ssb_panel_w - sbb_display_margin) + 'px');

    }

    // Slide when hover
    if (window_width >= 768) {
        ssb_panel.hover(function () {

            if (ssb_panel.hasClass('ssb-btns-left') && ssb_panel.hasClass('ssb-anim-slide')) {

                ssb_panel.stop().animate({'left': 0}, 300);

            } else if (ssb_panel.hasClass('ssb-btns-right') && ssb_panel.hasClass('ssb-anim-slide')) {

                ssb_panel.stop().animate({'right': 0}, 300);

            }

        }, function () {

            if (ssb_panel.hasClass('ssb-btns-left') && ssb_panel.hasClass('ssb-anim-slide')) {

                ssb_panel.animate({'left': '-' + (ssb_panel_w - sbb_display_margin) + 'px'}, 300);

            } else if (ssb_panel.hasClass('ssb-btns-right') && ssb_panel.hasClass('ssb-anim-slide')) {

                ssb_panel.animate({'right': '-' + (ssb_panel_w - sbb_display_margin) + 'px'}, 300);

            }

        });

    } else {
        ssb_panel.click(function (e) {

            if (jQuery(this).hasClass('ssb-open')) {
                jQuery(this).removeClass('ssb-open');
                if (ssb_panel.hasClass('ssb-btns-left') && ssb_panel.hasClass('ssb-anim-slide')) {

                    ssb_panel.animate({'left': '-' + (ssb_panel_w - sbb_display_margin) + 'px'}, 300);

                } else if (ssb_panel.hasClass('ssb-btns-right') && ssb_panel.hasClass('ssb-anim-slide')) {

                    ssb_panel.animate({'right': '-' + (ssb_panel_w - sbb_display_margin) + 'px'}, 300);

                }
            } else {
                e.preventDefault();
                jQuery(this).addClass('ssb-open');

                if (ssb_panel.hasClass('ssb-btns-left') && ssb_panel.hasClass('ssb-anim-slide')) {

                    ssb_panel.stop().animate({'left': 0}, 300);

                } else if (ssb_panel.hasClass('ssb-btns-right') && ssb_panel.hasClass('ssb-anim-slide')) {

                    ssb_panel.stop().animate({'right': 0}, 300);

                }
            }

        });
    }


});