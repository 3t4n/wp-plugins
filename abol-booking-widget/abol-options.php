<?php

/*
Plugin Name: ABOL Booking Widget
Description: Seating availability & "Book Now" sidebar widget - Part of the ABOL Wordpress Integration Tools Suite
Version: 1.5
Author: Amateur Box Office
Author URI: http://www.amateurboxoffice.co.uk
*/

add_action('admin_init', 'abolSeatingWidget__SettingsInit');
add_action('admin_menu', 'abolSeatingWidget__addMenuPage');
add_shortcode('abol_widget', 'abolSeatingWidget__renderAbolWidget');
add_action('widgets_init', 'abolSeatingWidget__Init');

/**
 * Initialise the plugin, Register a sidebar widget
 *
 * @return void
 */
function abolSeatingWidget__Init()
{
    require 'utilities/AbolWidget.php';

    register_widget('abol_sidebar_widget');
}

/**
 * Initialisation for the ABOL Settings Page
 *
 * @return void
 */
function abolSeatingWidget__SettingsInit()
{
    require 'utilities/SettingsBuilder.php';

    $builder = new SettingsBuilder();
    $builder->constructInputs();
}


/**
 * Render the custom Options page for the widget
 *
 * @return void
 */
function abolSeatingWidget__renderOptionsPage()
{
    wp_enqueue_script('upload-image.js', plugins_url('js/upload-image.js', __FILE__), null, null);
    wp_enqueue_style('abol_admin.css', plugins_url('css/abol_admin.css', __FILE__), null, null);
    wp_enqueue_media();

    echo "<h1>Configure ABOL Widget</h1>";
    echo "<form action='options.php' method='post'>";

    settings_errors();

    settings_fields('AbolWidgetConfiguration');
    do_settings_sections('AbolWidgetConfiguration');
    submit_button();

    echo "</form>";
}

/**
 * Add a new Admin sidebar entry for the plugin
 *
 * @return void
 */
function abolSeatingWidget__addMenuPage()
{
    add_menu_page(
        'ABOL Widget', # Page title - Displayed in the title tags
        'ABOL Widget', # Menu title - Displayed in the menu
        'manage_options', # Capability/Minimum Permissions - permissions the user needs to see this item
        'abol_widget', # Menu slug - Used to refer back to this menu,
        'abolSeatingWidget__renderOptionsPage', # Callback - To be run when this is called
        'dashicons-tickets', # Icon - Allows a WP Dashicon to be used in the sidebar
        '2'
    );
}

/**
 * Aggregate data from the user-configured options,
 * Populate a settings repository object and render the widget
 *
 * @return void
 */
function abolSeatingWidget__renderAbolWidget()
{
    require_once 'utilities/ApiUtility.php';
    require_once 'settings/SettingRepository.php';

    $settings = new SettingRepository();

    $settings->setGroupShortName(get_option('group-shortname')['abol_section_group_short-name-input']);
    $settings->setBookingImageEnabled((isset(get_option('show-booking-image')['abol_section_show-booking-image-input'])) ? true : false);
    $settings->setBookingImagePath(get_option('booking-image')['abol_section_booking-image-input']);
    $settings->setDisplayWithoutEvents((isset(get_option('no-open-events')['abol_section_no-open-events-input'])) ? false : true);
    $settings->setAlwaysHidden((isset(get_option('always-hide')['abol_section_always-hide-widget-input'])) ? true : false);
    $settings->setDisplayBookingLink((isset(get_option('booking-page-link')['abol_section_display-booking-page-link-input'])) ? true : false);
    $settings->setDisplayShowName(isset(get_option('display-show-name')['abol_section_display-show-name-input']) ? true : false);
    $settings->setDisplayPerformances((isset(get_option('display-performances')['abol_section_display-performances-input'])) ? true : false);
    $settings->setUserCSS((isset(get_option('styles')['abol_section_styles-input'])) ? get_option('styles')['abol_section_styles-input'] : null);

    try {
        $apiUtil = new ApiUtility('http://amateurboxoffice.co.uk/api/query/event/' . $settings->getGroupShortName());

        $apiData = $apiUtil->get();
        $event = $apiData['event'];
        $settings->setBookingPageId($apiData['booking_page']);
    } catch(Exception $e) {
        $performances = [];
    }

    require 'abol-widget.php';
}

/**
 * Accessor method for the seating API client
 *
 * @param $availability
 * @return void
 */
function abolSeatingWidget__getAvailabilityClass($availability)
{
    require_once 'utilities/SeatingAvailability.php';
    return abolSeatingWidget__getAvailability($availability);
}
