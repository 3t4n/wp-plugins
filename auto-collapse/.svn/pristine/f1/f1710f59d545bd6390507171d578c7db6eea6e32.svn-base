// WP Admin Sidebar Collapse
jQuery(document).ready(function($) {
    
    $('#adminmenu li.wp-has-submenu, #adminmenu li.wp-has-submenu *').off('**').unbind();
    // Define the functions
    $adminMenuWrap = $('#adminmenuwrap');
    var collapseIt = function($adminMenuWrap) {
        if ( !$(document.body).hasClass('folded')) {
            $("#collapse-button").trigger('click');
            $(document.body).toggleClass('expanded');
        }
    };
    
    var expandIt = function($adminMenuWrap) {
        adminMenuWrap = $('#adminmenuwrap');
        if ( $(document.body).hasClass('folded') ) {
            $("#collapse-button").trigger('click');
            $(document.body).toggleClass('expanded');
        }
    }
    
    // Here's where the action is
    $(window).ready(function($){collapseIt($adminMenuWrap);});
    
    $('#adminmenuwrap, #adminmenuback').hoverIntent({
        over: function() {
            expandIt($adminMenuWrap)
        },
        out: function(){
            collapseIt($adminMenuWrap)
        },
        timeout: 250,
        sensitivity: 1,
        interval: 10
    });
    
    // Open Submenus and Adjust the Location
    $('#adminmenu li.wp-has-submenu').hoverIntent({
        over: function() {
            $(this).addClass('opensub');
            if($('.opensub .wp-submenu').length) {
                var submenu = $('.opensub .wp-submenu');
                var submenu_bottom = submenu.offset().top + submenu.height();
                var scrolled = $(window).scrollTop();
                var submenu_dist = submenu_bottom - scrolled;
                if (submenu_dist > ($(window).height() - 32)) {
                    submenu.css('margin-top', '-' + (submenu.height() - 20) + 'px');
                }
            }
        },
        out: function(){
            if ($('#adminmenu').data('wp-responsive')) {
                // The menu is in responsive mode, bail
                return;
            }
            
            $(this).removeClass('opensub').find('.wp-submenu').css('margin-top', '');
        },
        timeout: 138,
        sensitivity: 5,
        interval: 80
    });
    
});

// Customizer Collapse
jQuery(document).ready(function($) {
    
    $("#customize-controls").mouseenter(function() {
        if ( $('.wp-full-overlay').hasClass('collapsed') ) {
            $(".collapse-sidebar").trigger('click');
        }
    });
    
    $("#customize-preview").mouseover(function() {
        if ( $('.wp-full-overlay').hasClass('expanded') ) {
            $(".collapse-sidebar").trigger('click');
        }
    });
    
});