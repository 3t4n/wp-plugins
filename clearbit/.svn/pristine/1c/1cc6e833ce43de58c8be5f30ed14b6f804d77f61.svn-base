<?php

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-clearbit-visitor-report-base.php';

/**
 * Fired during plugin activation.
 */
class Clearbit_Visitor_Report_Activator extends Clearbit_Visitor_Report_Base {

  public static function activate() {
    parent::event('wvr_wp_activated');
    add_option( 'wvr-plugin-just-activated', 'true');
  }
}
