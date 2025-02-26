<?php
/**
 * Plugin Name:        Archive NBP
 * Description:        NBP exchange rates archive.
 * Author:             Ihar Dounar
 * Author URI:         https://wpdv.eu
 * Developer:		   Ihar Dounar
 * Developer URI:	   https://www.linkedin.com/in/ihar-dounar/
 * Requires at least:  6.2
 * Requires PHP:       7.4
 * Text Domain:        archive-nbp
 * Domain Path:        /languages
 * Version:            1.1
 * License:            GPL-2.0-or-later
 *
 * @package         archive-nbp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*************************************************************************
* Constants
************************************************************************/
define( 'ANBP_DIR_PATH', __DIR__ );
define( 'ANBP_FILE_PATH', __FILE__ );
define( 'ANBP_NAME', 'archive-nbp' );

/*************************************************************************
 * Requires - core
 ************************************************************************/
require_once ANBP_DIR_PATH . '/inc/archive-nbp-class.php';