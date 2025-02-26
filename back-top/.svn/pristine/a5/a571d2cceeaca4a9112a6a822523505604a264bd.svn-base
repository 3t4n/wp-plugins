<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Back Top',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'back-top-settings',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Back Top <small>by Amit Sarker</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'Settings',
  'title'       => 'Settings',
  'icon'        => 'fa fa-wrench',

  // begin: fields
  'fields'      => array(
    array(
      'id'      => 'bt_enable_disable',
      'type'    => 'switcher',
      'title'   => 'Enable or Disable',
      'label'   => 'Show or hide back to top button',
      'default' => true
    ),
    array(
      'id'      => 'bt_text_icon',
      'type'    => 'switcher',
      'title'   => 'Enable Icon or Text',
      'label'   => 'Select Icon / Text',
      'default' => true
    ),

    array(
      'id'      => 'bt_icon',
      'type'    => 'icon',
      'title'   => 'Back to top Icon',
      'desc'    => 'Set icon',
      'default' => 'fa fa-arrow-up',
    ),

    // begin: a field
    array(
      'id'      => 'bt_text_label',
      'type'    => 'text',
      'title'   => 'Button Label',
    ),
    // end: a field

    array(
      'id'      => 'bt_box_color',
      'type'    => 'color_picker',
      'title'   => 'Box Color',
      'default' => '#2e3641',
    ),
    array(
      'id'      => 'bt_box_hover_color',
      'type'    => 'color_picker',
      'title'   => 'Box Hover Color',
      'default' => '#03c7ac',
    ),

  ), // end: fields
);

CSFramework::instance( $settings, $options );
