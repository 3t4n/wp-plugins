(function (jQuery) {
  'use strict';

  // Wenn wir im Customizer sind
  if (wp.customize) {
    // Menu initial öffnen
    jQuery(document).ready(function () {
      if (jQuery('#offcanvas_menu').length) {
        jQuery('#offcanvas_menu').addClass('awoc-active');
        jQuery('.awoc-overlay').addClass('awoc-active');
        jQuery('body').addClass('awoc-menu-open');
      }
    });

    // Verhindern, dass das Menu geschlossen wird
    jQuery(document).on('click', '.awoc-close, .awoc-overlay', function (e) {
      if (wp.customize) {
        e.preventDefault();
        e.stopPropagation();
        return false;
      }
    });

    // Live-Updates für die Customizer-Einstellungen
    wp.customize('awoc_offcanvas_background_color_setting', function (value) {
      value.bind(function (newval) {
        jQuery('#offcanvas_menu').css('background-color', newval);
      });
    });

    // ... weitere Customizer-Bindings ...
  }
})(jQuery);


