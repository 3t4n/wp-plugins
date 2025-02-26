<?php
/*
Plugin Name: Author Periodic Report 
lugin URI: http://www.gadgety.co.il/
Description: This plugin reports to the admin on posts amount of author in specified period of time.
Author: Shlomi Turjeman
Version: 1.0
Author URI: http://www.gadgety.co.il/
*/

define( 'PERIODIC_REPORT_VERSION' , '1.0' );
define( 'PERIODIC_REPORT_ROOT' , dirname(__FILE__) );
define( 'PERIODIC_REPORT_URL' , plugins_url(plugin_basename(dirname(__FILE__)).'/') );
define( 'PERIODIC_REPORT_PAGE', 'index.php?page=author-periodic-report');

include_once(PERIODIC_REPORT_ROOT . '/php/report.php');

add_action('admin_menu', 'author_periodic_report_menu');

function author_periodic_report_menu() {
	$periodic_report = new PeriodicReport();
	add_submenu_page('users.php', 'Author Periodic Report ', 'Periodic Report', 'add_users', 'author-periodic-report', array($periodic_report, 'view'));
}
?>
