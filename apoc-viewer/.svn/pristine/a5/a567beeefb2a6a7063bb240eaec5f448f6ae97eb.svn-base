<?php
/**
 * APOC
 *
 * @package       APOC
 * @author        FAMPPY INC
 * @license       gplv2
 * @version       1.3.0
 *
 * @wordpress-plugin
 * Plugin Name:   APOC
 * Plugin URI:    https://www.apoc.day/#/
 * Description:   APOC (A Piece of Content) enables people to create interactive XR content on their own without a single line of coding on a web-based platform and you can share and monetize their content within the platform.
 * Version:       1.3.0
 * Author:        FAMPPY INC
 * Author URI:    https://www.famppy.com/
 * Text Domain:   apoc-viewer
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with APOC. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'APOC_NAME',			'APOC' );

// Plugin version
define( 'APOC_VERSION',		'1.3.0' );

// Plugin Root File
define( 'APOC_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'APOC_PLUGIN_BASE',	plugin_basename( APOC_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'APOC_PLUGIN_DIR',	plugin_dir_path( APOC_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'APOC_PLUGIN_URL',	plugin_dir_url( APOC_PLUGIN_FILE ) );

// Const Post Type
define( 'APOC_POST_TYPE',    'wordpress-apoc' );

/**
 * Load the main class for the core functionality
 */
require_once APOC_PLUGIN_DIR . 'core/class-apoc.php';
require_once APOC_PLUGIN_DIR . 'php/index.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  FAMPPY INC
 * @since   1.0.0
 * @return  object|Apoc
 */
function APOC() {
	return Apoc::instance();
}

APOC();
