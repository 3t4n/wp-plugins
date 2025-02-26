<?php
/*
Plugin Name: Bravo Search and Replace
Description: The simplest solution for replacing text. Works with texts coming from your plugins, themes, database or wordpress core. Your replacements will be preserved after any update.
Version: 1.0
Author: guelben
Author URI: http://www.guelbetech.com
License: GPL version 2 or later
Requires at least: 4.4.0
Requires PHP: 4.0.2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: bravo-search-replace
Domain Path: /languages/

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
//we define constants
define('BRAVOSP_FILE',__FILE__);
define('BRAVOSP_DIR_URL',plugin_dir_url(__FILE__));

//we laod modules
require_once( plugin_dir_path(__FILE__).'functions.php');
require_once( plugin_dir_path(__FILE__).'activation.php');
require_once( plugin_dir_path(__FILE__).'deactivation.php');
require_once( plugin_dir_path(__FILE__).'admin.php');
require_once( plugin_dir_path(__FILE__).'ajax.php');
require_once( plugin_dir_path(__FILE__).'delete.php');


//we load translations
add_action('after_setup_theme', 'bravo_sp_setup');

function bravo_sp_setup(){

load_plugin_textdomain('bravo-search-replace', false, dirname(plugin_basename( __FILE__ )) . '/languages/' );
}

?>
