(function ( $ ) {
	"use strict";
    // Close all the other parent menus
    $('.wp-has-current-submenu').removeClass('wp-has-current-submenu');

    // Open your specific parent menu
    $('#toplevel_page_faqs_dashboard').removeClass('wp-not-current-submenu').addClass('wp-has-current-submenu wp-menu-open');
    $('#toplevel_page_faqs_dashboard > a').addClass('wp-has-current-submenu wp-menu-open');

}(jQuery));