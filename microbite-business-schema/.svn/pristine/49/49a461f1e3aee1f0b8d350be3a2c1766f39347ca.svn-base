<?php
/**
 * Plugin Name: Microbite Business Schema
 * Plugin URI: https://www.microbite.com.au/microbite-business-schema/
 * Description: Enhance your site with local business schema. Select from 150+ buisiness categories.
 * Author: Peter Katsoulotos
 * Author URI: https://www.microbite.com.au
 * Version: 1.0.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: microbite-business-schema
 * Domain Path: /languages
 *
 * Microbite Business Schema is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Microbite Business Schema is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Microbite Business Schema. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Microbite Business Schema
 * @category Core
 * @version 1.0.2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include necessary files
require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php' );



add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'mbbsc_add_plugin_page_settings_link');

function mbbsc_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'admin.php?page=mbbsc-instuctions' ) .
		'">' . __('Instructions', 'mbbsc') . '</a>';
	return $links;
}

