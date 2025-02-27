jQuery(document).ready(function() {

    if (jQuery('#toplevel_page_ovation_elements .wp-submenu-wrap li:last-child a').length) {
        jQuery('#toplevel_page_ovation_elements .wp-submenu-wrap li:last-child a').attr('href', 'https://www.ovationthemes.com/products/ovation-elements-pro');
        jQuery('#toplevel_page_ovation_elements .wp-submenu-wrap li:last-child a').attr('target', '_blank');
    }
});