<?php
/**
 * Plugin Name: Email Reminders
 * Plugin URI: https://oplugins.com/plugins/email-reminders/
 * Description: Sending friendly email reminders or follow-up emails based on custom rules.
 * Author: wpdevelop, oplugins
 * Author URI: https://oplugins.com
 * Text Domain: email-reminders
 * Domain Path: /languages/
 * Version: 2.0.6
 *
 */

/*  Copyright 2020-2025  oplugins.com  (email: info@oplugins.com),

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// PRIMARY URL CONSTANTS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ( ! defined( 'OPER_VERSION_NUM' ) )		define( 'OPER_VERSION_NUM',	'2.0.6' );

// ..\home\siteurl\www\wp-content\plugins\plugin-name\oper-item.php
if ( ! defined( 'OPER_FILE' ) )               define( 'OPER_FILE', __FILE__ );
// oper-item.php
if ( ! defined( 'OPER_PLUGIN_FILENAME' ) )    define( 'OPER_PLUGIN_FILENAME', basename( __FILE__ ) );
// plugin-name
if ( ! defined( 'OPER_PLUGIN_DIRNAME' ) )     define( 'OPER_PLUGIN_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
// ..\home\siteurl\www\wp-content\plugins\plugin-name
if ( ! defined( 'OPER_PLUGIN_DIR' ) )         define( 'OPER_PLUGIN_DIR', untrailingslashit( plugin_dir_path( OPER_FILE ) ) );
// http: //website.com/wp-content/plugins/plugin-name
if ( ! defined( 'OPER_PLUGIN_URL' ) )         define( 'OPER_PLUGIN_URL', untrailingslashit( plugins_url( '', OPER_FILE ) ) );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// LOAD PLUGIN CORE
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ( ! class_exists( 'OPER' ) ) {
	require_once OPER_PLUGIN_DIR . '/core/core.php';
}

/**
 * Main instance.
 * The main function responsible for returning the one true Instance to functions everywhere.
 *
 * Example: <?php $oper = oper(); ?>
 */
function oper() {

	if ( class_exists( 'OPER' ) ) {
		return OPER::instance();
	} else {
		return false;
	}
}

oper();       // Start



/**
 * 1) Rename all  files in plugin directory starting from oper -> prefix
 *
 * 2) Replace Instruction:
 *        'wpcustomers'
          'email-reminders'       -> 'pluginnamelocale'
		  _oper_          ->  _bk_ (...)       in get_opcm_option ....
		   OPER           ->  PREFIX
		   oper           ->  prefix
 *
 *
 *  If need only 1 menu page, then  open this file: oper\includes\opcm-include.php
 *  Comment this:
 *
 * // require_once( OPCM_PLUGIN_DIR . '/core/admin/page-files-add.php' );  //Get Upload functionality  from  this file for uploading .ICS file
 * ....
 * // require_once( OPCM_PLUGIN_DIR . '/core/admin/exmpl-page-email-download_notification.php' );		// Settings > Emails
 * Comment menu in:  opl-start\core\opcm.php
 *
 *  Rename folder /src/  to  /_src/
 *  Replace /src/ to  /_out/
 */