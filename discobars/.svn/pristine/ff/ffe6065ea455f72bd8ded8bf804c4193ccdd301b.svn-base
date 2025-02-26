<?php
/**
 * Plugin Name: DiscoBars - Discount Bars and Cart Saver
 * Description: Display your most attractive deals in real time and increase conversions
 * Author: Discobars
 * Version: 1.0.0
 */

// Add multilingual support
//load_plugin_textdomain( 'discobars', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Add settings page and register settings with WordPress
add_action('admin_menu', 'discobars_setup');

function discobars_setup() {
  // add_menu_page( 'Discobars Plugin Page', 'Discobars', 'manage_options', 'options-discobars', 'discobars_settings' );
  add_submenu_page('options-general.php', __( 'DiscoBars Widget', 'discobars'), __( 'DiscoBars widget', 'discobars'), 'manage_options', 'options-discobars', 'discobars_settings' );

  register_setting( 'discobars', 'discobars-code' );
}

// Display settings page
function discobars_settings() {
  echo "<div style='margin-top:25px;margin-bottom:25px;'><img src='" . plugin_dir_url( __FILE__ ) . "/discobars_logo.png' style='max-width:500px;'></div>";
  echo "<h1 style=''>" . __( 'Discount Bars Widget Setup', 'discobars' ) . "</h1>";
  if (get_option('discobars-code')) {
    echo "<p>" . __( 'Seems like everything is OK!<br>
Check your <a href="', 'discobars') . home_url() . __('">website</a> to see if the DiscoBars widget is present.<br>
Log in to your <a href="https://discobars.io/?utm_source=WP&utm_campaign=WP" target="_blank">Discobars dashboard</a> to setup your best deals and manage preferences.<br>', 'discobars');
  } else {
    echo "<p>" . __( 'Signup for a free DiscoBars account at <a href="https://discobars.io/?utm_source=WP&utm_campaign=WP" target="_blank">discobars.io</a>, then copy and paste the widget code<br> from Settings → Tracking code section into the form below:
', 'discobars' ) . "</p>";
  }

  echo "<form action=\"options.php\" method=\"POST\">";

    // Show success message when code is saved
    // if (isset($_GET['settings-updated'])) {
    //   echo "<p><strong style=\"color: green;\">Settings updated successfully.</strong><br><br>";
    // }

    settings_fields( 'discobars' );
    do_settings_sections( 'discobars' );
    echo "<textarea cols=\"80\" rows=\"14\" name=\"discobars-code\">" . esc_attr( get_option('discobars-code') ) . "</textarea>";
    submit_button();
  echo "</form>";
}


// add_action('update_option_discobars', 'discobars_options_saved');
// function discobars_options_saved() {
//   echo "saved!";
// }

// Add the code to footer
add_action('wp_footer', 'add_discobars_code');
function add_discobars_code() {
  echo get_option( 'discobars-code' );
}
