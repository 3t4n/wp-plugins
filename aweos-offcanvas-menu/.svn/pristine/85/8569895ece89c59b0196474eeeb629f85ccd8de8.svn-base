jQuery(document).ready(function ($) {
    var $container = jQuery('#offcanvas_container');
    var $background = jQuery('.offcanvas-menu-background');

    function checkVisibility() {
        var maxWidth = $container.data('max');
        var alwaysActive = $container.data('always-active') === true;

        // Check if the offcanvas menu should be visible based on the window width and always active setting
        if (alwaysActive || window.innerWidth <= maxWidth) {
            $container.addClass('is-available');
        } else {
            $container.removeClass('is-available');
            jQuery('body').removeClass('offcanvas-open');
        }
    }

    // Toggle menu on mobile menu bar click
    jQuery('.mobile_menu_bar').on('click', function (e) {
        e.preventDefault();
        jQuery('body').toggleClass('offcanvas-open');
    });

    toggleSubMenu();

    // Close buttons for the offcanvas menu
    jQuery('.close-sidebar-inner, .offcanvas-menu-background').on('click', function () {
        jQuery('body').removeClass('offcanvas-open');
    });

    // Resize handler to check visibility on window resize
    jQuery(window).on('resize', function () {
        checkVisibility();
    });

    // Initial visibility check
    checkVisibility();
});

// jQuery is assumed to be loaded
jQuery(document).ready(function () {
    // When a menu item with a submenu is clicked
    jQuery('#offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault(); // Prevent the default link behavior

        // Remove the 'sub-active' class from all submenus
        jQuery('#offcanvas_container #offcanvas_menu_inner .sub-menu').removeClass('sub-active');

        // Add the 'sub-active' class to the current submenu
        jQuery(this).next('.sub-menu').toggleClass('sub-active');
    });

    // Toggle visibility of the current menu item
    jQuery('#offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault(); // Prevent the default link behavior

        // Remove the 'sub-active' class from all submenus
        jQuery('#offcanvas_container #offcanvas_menu_inner .sub-menu').removeClass('sub-active');

        // Add the 'visible' class to the current menu item
        jQuery(this).parent().toggleClass('visible');
    });
});

jQuery(document).ready(function () {
    jQuery('#offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault(); // Prevent the default link behavior
        jQuery(this).parent().toggleClass('visible'); // Toggle visibility
    });
});

function toggleSubMenu() {
    let currentlyOpenSubMenu = null; // Variable zum Speichern des aktuell geöffneten Submenus

    jQuery('#offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children > a').on('click touchend', function (e) {
        e.preventDefault(); // Verhindere das Standard-Link-Verhalten

        var $currentSubMenu = jQuery(this).next('.sub-menu');
        var $parentLi = jQuery(this).parent('li');

        // Wenn kein Submenu geöffnet ist oder das aktuelle Submenu nicht offen ist
        if (currentlyOpenSubMenu === null || currentlyOpenSubMenu !== $currentSubMenu[0]) {
            // Schließe das aktuell geöffnete Submenu, falls vorhanden
            if (currentlyOpenSubMenu) {
                jQuery(currentlyOpenSubMenu).slideUp().removeClass('sub-active');
                jQuery(currentlyOpenSubMenu).parent('li').removeClass('visible'); // Entferne die Klasse 'visible'
            }

            // Öffne das neue Submenu und speichere es als aktuell geöffnet
            $currentSubMenu.slideDown().addClass('sub-active');
            $parentLi.addClass('visible'); // Füge die Klasse 'visible' hinzu
            currentlyOpenSubMenu = $currentSubMenu[0]; // Speichere das aktuelle Submenu
        } else {
            // Wenn das aktuelle Submenu bereits offen ist, schließe es
            $currentSubMenu.slideUp().removeClass('sub-active');
            $parentLi.removeClass('visible'); // Entferne die Klasse 'visible'
            currentlyOpenSubMenu = null; // Setze die Variable zurück
        }
    });
}
