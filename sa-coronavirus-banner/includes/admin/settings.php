<?php
/**
 * Create a settings page for different banner options.
 *
 */

namespace SA\Covid19\SettingsPage;

include_once 'sa-covid-19-options.php';

/**
 * Create top level menu item
 */
function options() {

  // add top level menu page
  add_menu_page(
    'SA Coronoa Banner',      // page title
    'SA COVID-19',            // menu title
    'manage_options',         // capability
    'sa-covid-19',            // menu slug
    'options_page_content',   // page content
    plugin_dir_url( __FILE__ ) . ( '../../assets/images/sa-flag.png' ),
    2                         // position
  );

}

/**
 * Create settings
 */
function settings() {

  register_setting(
    'banner',         // Group
    'banner_options',  // Option name
    array(
      'type' => 'string',
      'sanitize_callback' => 'validate_options'
    )
  );
  banner_position();
  banner_style();
  banner_colours();
}

/**
 * banner position settings
 */
function banner_position() {

  add_settings_section(
    'rbd_section', // id
    '',            // title
    '',            // callback
    'banner'       // page
  );

  add_settings_field(
    'banner_position',       // slug-name
    'Banner Position',       // title
    'banner_position_field', // callback
    'banner',                // page
    'rbd_section'            // section
  );

}

/**
 * banner style settings
 */
function banner_style() {

  add_settings_section(
    'banner_elements', // id
    '',                // title
    '',                // callback
    'banner'           // page
  );

  add_settings_field(
    'banner_elements',        // slug-name
    'Banner Elements',        // title
    'banner_elements_fields', // callback
    'banner',                 // page
    'rbd_section'             // section
  );

}

/**
 * banner colour settings
 */
function banner_colours() {

  add_settings_section (
    'banner_colours', // id
    '',               // title
    '',               // callback
    'banner'          // page
  );

  add_settings_field(
    'banner_colours',         // slug-name
    'Banner Colours',         // title
    'banner_colour_fields',   // callback
    'banner',                 // page
    'rbd_section'             // section
  );

}
