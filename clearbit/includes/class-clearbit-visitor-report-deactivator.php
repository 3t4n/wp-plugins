<?php

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-clearbit-visitor-report-base.php';

/**
 * Fired during plugin deactivation.
 */
class Clearbit_Visitor_Report_Deactivator extends Clearbit_Visitor_Report_Base {

  public static function deactivate() {
    parent::event('wvr_wp_deactivated');
  }
}
